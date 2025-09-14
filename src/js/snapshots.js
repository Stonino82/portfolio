// src/js/snapshots.js
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

const Snapshots = {
  // DOM Elements
  modal: null,
  closeBtn: null,
  prevBtn: null,
  nextBtn: null,
  modalTitle: null,
  modalBody: null,
  progressBarsContainer: null,

  // Properties
  snapshotsData: [],
  currentIndex: 0,
  storyTimer: null,
  STORY_DURATION: 500000, // 5 seconds

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
    document.querySelectorAll('.snapshot-item').forEach((item, index) => {
      item.addEventListener('click', () => this.openModal(index));
    });

    this.closeBtn.addEventListener('click', () => this.closeModal());
    this.prevBtn.addEventListener('click', () => this.showPrevStory());
    this.nextBtn.addEventListener('click', () => this.showNextStory(true));

    this.modal.addEventListener('click', (e) => {
      if (e.target === this.modal) this.closeModal();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.modal.classList.contains('is-active')) {
        this.closeModal();
      }
    });
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

    const snapshot = this.snapshotsData[index];
    if (!snapshot) {
      this.closeModal();
      return;
    }

    this.currentIndex = index;
    this.modalTitle.textContent = snapshot.title;

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
        <img src="${snapshot.image_url}" alt="${snapshot.title}">
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

    this.storyTimer = setTimeout(() => this.showNextStory(false), this.STORY_DURATION);
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

  updateProgressBars(activeIndex) {
    const bars = this.progressBarsContainer.querySelectorAll('.progress-bar__inner');
    bars.forEach((bar, index) => {
      bar.style.transition = 'none';
      bar.style.width = '0%';

      if (index < activeIndex) {
        bar.style.width = '100%';
      } else if (index === activeIndex) {
        void bar.offsetWidth;
        bar.style.transition = `width ${this.STORY_DURATION}ms linear`;
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
  }
};

document.addEventListener('DOMContentLoaded', () => {
  Snapshots.init();
});

export default Snapshots;