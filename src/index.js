// Import main stylesheet for Vite to process
import './styles/style.scss';

// Import animation and navigation modules
import initGsapAnimations from './js/gsap.js';
import initLogoScrollAnimation from './js/logo-scroll-animation.js';
import initHeaderScroll from './js/header-scroll.js';
import './js/theme-switch.js';
import './js/carousel.js';


// Import Swiper configuration
import initTestimonialSwiper, { initHeroSwiper } from './js/swiper-config.js';
import './js/accordion.js';

/**
 * Run all initialization logic after the DOM is fully loaded.
 * This ensures all elements are available before scripts try to access them.
 */
document.addEventListener('DOMContentLoaded', () => {
  initGsapAnimations();
  initLogoScrollAnimation();
  initHeaderScroll();

  // Only initialize Swiper if the .swiper element exists on the page
  if (document.querySelector('.testimonials-swiper')) {
    initTestimonialSwiper();
  }

    // Initialize Hero Swiper if the .hero-swiper element exists on the page
  if (document.querySelector('.hero-swiper')) {
    initHeroSwiper();
  }
});