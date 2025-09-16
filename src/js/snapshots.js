// src/js/snapshots.js
import Swiper from 'swiper';
import { Navigation, EffectCoverflow, Mousewheel } from 'swiper/modules';

class Snapshots {
  // DOM Elements
  modal = null;
  closeBtn = null;
  prevBtn = null;
  nextBtn = null;
  pausePlayBtn = null;
  modalTitle = null;
  progressBarsContainer = null;
  modalSwiperContainer = null;

  // Properties
  snapshotsData = [];
  currentIndex = 0;
  storyTimer = null;
  STORY_DURATION = 6500; // 6.5 seconds
  isPaused = false;
  startTime = 0;
  remainingTime = 0;
  modalSwiper = null;
  mainCarouselSwiper = null;
  viewedSnapshotsKey = 'viewedSnapshots';
  viewedSnapshots = [];

  /**
   * Decodes HTML entities from a string.
   * @param {string} text The text to decode.
   * @returns {string} The decoded text.
   */
  decodeHtmlEntities(text) {
    if (typeof text !== 'string') return text;
    const textArea = document.createElement('textarea');
    textArea.innerHTML = text;
    return textArea.value;
  }

  constructor() {
    const section = document.getElementById('snapshots');
    if (!section) return;

    const dataScript = document.getElementById('snapshots-data');
    if (dataScript) {
      try {
        this.snapshotsData = JSON.parse(dataScript.textContent);
      } catch (e) {
        console.error('Error parsing snapshots data:', e);
        return;
      }
    } else {
      return;
    }

    if (this.snapshotsData.length === 0) return;

    this.modal = document.getElementById('snapshots-modal');
    if (this.modal) {
      document.body.appendChild(this.modal);
    }

    this.closeBtn = document.getElementById('snapshots-close');
    this.prevBtn = document.getElementById('snapshots-prev');
    this.nextBtn = document.getElementById('snapshots-next');
    this.pausePlayBtn = document.getElementById('snapshots-toggle-pause');
    this.modalTitle = this.modal.querySelector('.snapshots-modal__title');
    this.progressBarsContainer = this.modal.querySelector('.snapshots-modal__progress-bars');
    this.modalSwiperContainer = this.modal.querySelector('.swiper-modal-body');

    this._loadViewedSnapshots();
    this.initCarousel();
    this._addEventListeners();
    this._updateCarouselViewedState();
  }

  _loadViewedSnapshots() {
    try {
      const stored = localStorage.getItem(this.viewedSnapshotsKey);
      if (stored) {
        this.viewedSnapshots = JSON.parse(stored);
      }
    } catch (e) {
      console.error('Error loading viewed snapshots from localStorage:', e);
      this.viewedSnapshots = [];
    }
  }

  _updateCarouselViewedState() {
    if (!this.mainCarouselSwiper) return;
    this.mainCarouselSwiper.slides.forEach((slide) => {
      const snapshotId = slide.dataset.snapshotId;
      if (snapshotId && this.viewedSnapshots.includes(snapshotId)) {
        slide.classList.add('is-viewed');
      }
    });
  }

  _markAsViewed(snapshotId) {
    if (!this.viewedSnapshots.includes(snapshotId)) {
      this.viewedSnapshots.push(snapshotId);
      try {
        localStorage.setItem(this.viewedSnapshotsKey, JSON.stringify(this.viewedSnapshots));
      } catch (e) {
        console.error('Error saving viewed snapshots to localStorage:', e);
      }
    }
    // Also add the class to the slide element for immediate feedback
    const slide = this.mainCarouselSwiper.slides.find(s => s.dataset.snapshotId === snapshotId);
    if (slide && !slide.classList.contains('is-viewed')) {
      slide.classList.add('is-viewed');
    }
  }

  initCarousel() {
    this.mainCarouselSwiper = new Swiper('#snapshots .snapshots-carousel', {
      modules: [Navigation, Mousewheel],
      slidesPerView: 'auto',
      spaceBetween: 15,
      grabCursor: true,
      mousewheel: true,
      freeMode: true,
      navigation: {
        nextEl: '#snapshots .swiper-button-next',
        prevEl: '#snapshots .swiper-button-prev',
      },
    });
  }

  initModalSwiper() {
    this.modalSwiper = new Swiper(this.modalSwiperContainer, {
      modules: [Navigation, EffectCoverflow],
      initialSlide: this.currentIndex,
      effect: 'coverflow',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      allowTouchMove: true, // Enable touch move for swipe navigation
      on: {
        slideChange: (swiper) => {
          this.currentIndex = swiper.activeIndex;

          // Mark the new slide as viewed as the user navigates within the modal
          const snapshotId = this.snapshotsData[this.currentIndex]?.id.toString();
          if (snapshotId) {
            this._markAsViewed(snapshotId);
          }

          this.updateModalContent(this.currentIndex);
          this.startStoryTimer();
        },
        init: () => {
            // Initial content update and timer start
            this.updateModalContent(this.currentIndex);
            this.startStoryTimer();
        }
      }
    });
  }

  _addEventListeners() {
    // Open modal from carousel
    if (this.mainCarouselSwiper) {
      this.mainCarouselSwiper.on('click', (swiper) => {
        if (swiper.clickedSlide) {
          const index = swiper.clickedIndex;
          if (index !== -1) {
            this.openModal(index);
          }
        }
      });
    }

    // Handle content expand/collapse on click/tap.
    this.modal.addEventListener('click', (e) => {
      const contentWrapper = e.target.closest('.snapshot-content-wrapper');
      if (contentWrapper) {
        contentWrapper.classList.toggle('is-expanded');
      }
    });

    // Desktop controls
    this.closeBtn.addEventListener('click', () => this.closeModal());
    this.prevBtn.addEventListener('click', this.showPrevStory.bind(this));
    this.nextBtn.addEventListener('click', this.showNextStory.bind(this));
    this.pausePlayBtn.addEventListener('click', this.togglePause.bind(this));

    // Keyboard control
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.modal.classList.contains('is-active')) {
        this.closeModal();
      }
    });

    // Close modal on background click (desktop)
    this.modal.addEventListener('click', (e) => {
      if (e.target === this.modal) {
        this.closeModal();
      }
    });

    
  }

  openModal(index) {
    if (!this.modal) return;
    this.currentIndex = index;

    const snapshotId = this.snapshotsData[index]?.id.toString();
    if (snapshotId) {
      this._markAsViewed(snapshotId);
    }

    this.buildProgressBars();
    this.initModalSwiper(); // Initialize modal Swiper when opening
    this.modalSwiper.slideTo(index, 0); // Go to the selected slide instantly
    this.modalSwiper.update(); // Update Swiper after slide change and modal visibility
    this.modal.classList.add('is-active');
    document.body.style.overflow = 'hidden';
  }

  closeModal() {
    if (!this.modal) return;
    this.modal.classList.remove('is-active');
    document.body.style.overflow = '';
    this.clearStoryTimer();
    if (this.modalSwiper) {
      this.modalSwiper.destroy(true, true); // Destroy modal Swiper on close
      this.modalSwiper = null;
    }
    this.modalTitle.textContent = '';
  }

  updateModalContent(index) {
    const snapshot = this.snapshotsData[index];
    if (!snapshot) {
      this.closeModal();
      return;
    }

    const decodedTitle = this.decodeHtmlEntities(snapshot.title);
    this.modalTitle.textContent = decodedTitle;
    this.updateNavButtons();
    this.updateProgressBars(index);
  }

  startStoryTimer() {
    this.clearStoryTimer();
    this.isPaused = false;
    this.updatePausePlayButton();
    this.startTime = Date.now();
    this.remainingTime = this.STORY_DURATION;
    this.storyTimer = setTimeout(() => this.showNextStory(false), this.remainingTime);
  }

  showNextStory(isUserAction = false) {
    if (this.modalSwiper && this.modalSwiper.activeIndex < this.snapshotsData.length - 1) {
      this.modalSwiper.slideNext();
    } else if (!isUserAction) {
      this.closeModal();
    }
  }

  showPrevStory() {
    if (this.modalSwiper && this.modalSwiper.activeIndex > 0) {
      this.modalSwiper.slidePrev();
    }
  }

  buildProgressBars() {
    this.progressBarsContainer.innerHTML = '';
    this.snapshotsData.forEach(() => {
      const bar = document.createElement('div');
      bar.className = 'progress-bar';
      bar.innerHTML = '<div class="progress-bar__inner"></div>';
      this.progressBarsContainer.appendChild(bar);
    });
  }

  updateProgressBars(activeIndex, resume = false) {
    const bars = this.progressBarsContainer.querySelectorAll('.progress-bar__inner');
    bars.forEach((bar, index) => {
      if (!resume) {
        bar.style.transition = 'none';
        bar.style.width = '0%';
      }

      if (index < activeIndex) {
        bar.style.width = '100%';
      } else if (index === activeIndex) {
        void bar.offsetWidth; // Trigger reflow
        const duration = resume ? this.remainingTime : this.STORY_DURATION;
        bar.style.transition = `width ${duration}ms linear`;
        bar.style.width = '100%';
      }
    });
  }

  updateNavButtons() {
    if (this.modalSwiper) {
      this.prevBtn.style.visibility = this.modalSwiper.isBeginning ? 'hidden' : 'visible';
      this.nextBtn.style.visibility = this.modalSwiper.isEnd ? 'hidden' : 'visible';
    }
  }

  clearStoryTimer() {
    if (this.storyTimer) {
      clearTimeout(this.storyTimer);
    }
  }

  togglePause() {
    this.isPaused = !this.isPaused;
    if (this.isPaused) {
      this.pauseStory();
    } else {
      this.resumeStory();
    }
  }

  pauseStory() {
    this.clearStoryTimer();
    const elapsedTime = Date.now() - this.startTime;
    this.remainingTime = this.STORY_DURATION - elapsedTime;

    const activeBar = this.progressBarsContainer.querySelector(`.progress-bar:nth-child(${this.currentIndex + 1}) .progress-bar__inner`);
    if (activeBar) {
      const computedWidth = window.getComputedStyle(activeBar).width;
      activeBar.style.transition = 'none';
      activeBar.style.width = computedWidth;
    }
    this.updatePausePlayButton();
  }

  resumeStory() {
    this.startTime = Date.now();
    this.storyTimer = setTimeout(() => this.showNextStory(false), this.remainingTime);
    this.updateProgressBars(this.currentIndex, true);
    this.updatePausePlayButton();
  }

  updatePausePlayButton() {
    const icon = this.isPaused ? 'play_circle' : 'pause_circle';
    this.pausePlayBtn.querySelector('.material-symbols-rounded').textContent = icon;
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new Snapshots();
});

export default Snapshots;