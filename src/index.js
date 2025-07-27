// Import main stylesheet for Vite to process
import './styles/style.scss';

// Import animation and navigation modules
import initGsapAnimations from './js/gsap.js';
import initLogoScrollAnimation from './js/logo-scroll-animation.js';


/**
 * Run all initialization logic after the DOM is fully loaded.
 * This ensures all elements are available before scripts try to access them.
 */
document.addEventListener('DOMContentLoaded', () => {
  initGsapAnimations();
  initLogoScrollAnimation();
});