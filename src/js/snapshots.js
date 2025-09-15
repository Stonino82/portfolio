// src/js/snapshots.js
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

const Snapshots = {
  // DOM Elements
  modal: null,
  closeBtn: null,
  prevBtn: null,
  nextBtn: null,
  pausePlayBtn: null,
  modalTitle: null,
  modalBody: null,
  progressBarsContainer: null,

  // Properties
  snapshotsData: [],
  currentIndex: 0,
  storyTimer: null,
  STORY_DURATION: 6500, // 6.5 seconds
  touchStartX: 0,
  touchEndX: 0,
  touchStartTarget: null,
  minSwipeX: 50, // Minimum distance for a swipe
  isPaused: false,
  startTime: 0,
  remainingTime: 0,

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
  },

  init() {
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

    this.modal = document.getElementById('snapshot-modal');
    if (this.modal) {
      document.body.appendChild(this.modal);
    }

    this.closeBtn = document.getElementById('snapshot-modal-close');
    this.prevBtn = document.getElementById('snapshot-modal-prev');
    this.nextBtn = document.getElementById('snapshot-modal-next');
    this.pausePlayBtn = document.getElementById('snapshot-modal-toggle-pause');
    this.modalTitle = this.modal.querySelector('.snapshot-modal__title');
    this.modalBody = this.modal.querySelector('.snapshot-modal__body');
    this.progressBarsContainer = this.modal.querySelector('.snapshot-modal__progress-bars');

    this.initCarousel();
    this.addEventListeners();
  },

  initCarousel() {
    new Swiper('.snapshots-carousel', {
      modules: [Navigation],
      slidesPerView: 'auto',
      spaceBetween: 15,
      navigation: {
        nextEl: '#snapshots .swiper-button-next',
        prevEl: '#snapshots .swiper-button-prev',
      },
    });
  },

  addEventListeners() {
    // Open modal from carousel
    document.querySelectorAll('.snapshot-item').forEach((item, index) => {
      item.addEventListener('click', () => this.openModal(index));
    });

    // Desktop controls
    this.closeBtn.addEventListener('click', () => this.closeModal());
    this.prevBtn.addEventListener('click', () => this.showPrevStory());
    this.nextBtn.addEventListener('click', () => this.showNextStory(true));
    this.pausePlayBtn.addEventListener('click', () => this.togglePause());

    // Keyboard control
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.modal.classList.contains('is-active')) {
        this.closeModal();
      }
    });

    // Touch controls for mobile (tap and swipe)
    this.modal.addEventListener('touchstart', (e) => this.handleTouchStart(e), false);
    this.modal.addEventListener('touchmove', (e) => this.handleTouchMove(e), false);
    this.modal.addEventListener('touchend', () => this.handleTouchEnd(), false);
  },

  handleTouchStart(e) {
    this.touchStartX = e.touches[0].clientX;
    this.touchEndX = e.touches[0].clientX; // Reset end position on new touch
    this.touchStartTarget = e.target;
  },

  handleTouchMove(e) {
    this.touchEndX = e.touches[0].clientX;
  },

  handleTouchEnd() {
    const diffX = this.touchStartX - this.touchEndX;

    // Check if it was a swipe
    if (Math.abs(diffX) > this.minSwipeX) {
      if (diffX > 0) {
        // Swiped left
        this.showNextStory(true);
      } else {
        // Swiped right
        this.showPrevStory();
      }
    } else {
      // It was a tap, not a swipe. Handle tap actions.
      const contentWrapper = this.touchStartTarget.closest('.snapshot-content-wrapper');
      if (contentWrapper) {
        contentWrapper.classList.toggle('is-expanded');
      } else if (this.touchStartTarget === this.modal) {
        // Only close if the tap was directly on the modal background
        this.closeModal();
      }
    }

    // Reset touch positions
    this.touchStartX = 0;
    this.touchEndX = 0;
    this.touchStartTarget = null;
  },

  openModal(index) {
    if (!this.modal) return;
    this.currentIndex = index;
    this.buildProgressBars();
    this.showStory(this.currentIndex);
    this.modal.classList.add('is-active');
    document.body.style.overflow = 'hidden';
  },

  closeModal() {
    if (!this.modal) return;
    this.modal.classList.remove('is-active');
    document.body.style.overflow = '';
    this.clearStoryTimer();
    this.modalBody.innerHTML = '';
    this.modalTitle.textContent = '';
  },

  showStory(index) {
    this.clearStoryTimer();
    this.isPaused = false;
    this.updatePausePlayButton();

    const snapshot = this.snapshotsData[index];
    if (!snapshot) {
      this.closeModal();
      return;
    }

    const decodedTitle = this.decodeHtmlEntities(snapshot.title);

    this.currentIndex = index;
    this.modalTitle.textContent = decodedTitle;

    let mediaElement;
    if (snapshot.video_url) {
      mediaElement = `
        <video autoplay loop muted preload="metadata" class="wp-post-image">
            <source src="${snapshot.video_url}">
            Your browser does not support the video tag.
        </video>
      `;
    } else {
      mediaElement = `
        <img src="${snapshot.image_url}" alt="${decodedTitle}">
      `;
    }

    this.modalBody.innerHTML = `
      ${mediaElement}
      <div class="snapshot-content-wrapper">
        ${snapshot.content}
      </div>
    `;

    this.updateNavButtons();
    this.updateProgressBars(index);

    this.startTime = Date.now();
    this.remainingTime = this.STORY_DURATION;
    this.storyTimer = setTimeout(() => this.showNextStory(false), this.remainingTime);
  },

  showNextStory(isUserAction = false) {
    if (this.currentIndex < this.snapshotsData.length - 1) {
      this.currentIndex++;
      this.showStory(this.currentIndex);
    } else if (!isUserAction) {
      this.closeModal();
    }
  },

  showPrevStory() {
    if (this.currentIndex > 0) {
      this.currentIndex--;
      this.showStory(this.currentIndex);
    }
  },

  buildProgressBars() {
    this.progressBarsContainer.innerHTML = '';
    this.snapshotsData.forEach(() => {
      const bar = document.createElement('div');
      bar.className = 'progress-bar';
      bar.innerHTML = '<div class="progress-bar__inner"></div>';
      this.progressBarsContainer.appendChild(bar);
    });
  },

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
  },

  updateNavButtons() {
    this.prevBtn.style.visibility = this.currentIndex === 0 ? 'hidden' : 'visible';
    this.nextBtn.style.visibility = this.currentIndex === this.snapshotsData.length - 1 ? 'hidden' : 'visible';
  },

  clearStoryTimer() {
    if (this.storyTimer) {
      clearTimeout(this.storyTimer);
    }
  },

  togglePause() {
    this.isPaused = !this.isPaused;
    if (this.isPaused) {
      this.pauseStory();
    } else {
      this.resumeStory();
    }
  },

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
  },

  resumeStory() {
    this.startTime = Date.now();
    this.storyTimer = setTimeout(() => this.showNextStory(false), this.remainingTime);
    this.updateProgressBars(this.currentIndex, true);
    this.updatePausePlayButton();
  },

  updatePausePlayButton() {
    const icon = this.isPaused ? 'play_circle' : 'pause_circle';
    this.pausePlayBtn.querySelector('.material-symbols-rounded').textContent = icon;
  }
};

document.addEventListener('DOMContentLoaded', () => {
  Snapshots.init();
});

export default Snapshots;
