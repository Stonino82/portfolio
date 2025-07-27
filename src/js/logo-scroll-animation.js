import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// It's crucial to register the plugin with GSAP.
gsap.registerPlugin(ScrollTrigger);

/**
 * Handles the logo image swap on scroll, with a fade effect, direction detection, and a timeout.
 */
const initLogoScrollAnimation = () => {
  const logoImage = document.querySelector('.logo-image');

  // Proceed only if the logo and the necessary data attributes exist.
  if (!logoImage || !logoImage.dataset.origSrc || !logoImage.dataset.altSrc) {
    return;
  }

  const origSrc = logoImage.dataset.origSrc;
  const altSrc = logoImage.dataset.altSrc;

  // Ensure the logo starts with the default image, regardless of browser refresh state.
  logoImage.setAttribute('src', origSrc);

  // A variable to hold our timeout.
  let scrollTimeout;
  let isAnimating = false; // Flag to prevent animation overlaps.

  /**
   * Fades the logo out, changes the source, and fades it back in.
   * @param {string} newSrc The new image source URL.
   */
  const changeLogo = (newSrc) => {
    // Don't start a new animation if the image is already the correct one or if an animation is running.
    if (logoImage.getAttribute('src') === newSrc || isAnimating) {
      return;
    }

    isAnimating = true;

    // A timeline for the coin-flip animation.
    gsap.timeline({
      onComplete: () => {
        isAnimating = false;
      },
    })
      // 1. Rotate the logo -90 degrees on its Y-axis (vertical) to become invisible (edge-on).
      .to(logoImage, { rotationY: -90, duration: 0.25, ease: 'power2.in' })
      // 2. At the halfway point, change the image source and flip the rotation to the other side.
      .call(() => logoImage.setAttribute('src', newSrc))
      .set(logoImage, { rotationY: 90 })
      // 3. Continue rotating from 90 to 0 degrees to reveal the "other side".
      .to(logoImage, { rotationY: 0, duration: 0.25, ease: 'power2.out' });
  };

  // We will only activate the scroll listener after the first *user-initiated* scroll.
  // This prevents the animation from firing automatically on a page refresh where
  // the browser restores the previous scroll position.
  const activateScrollTrigger = () => {
    // Create a ScrollTrigger to monitor scroll updates.
    ScrollTrigger.create({
      // We can set a minimal start point to avoid triggering on page load if there's no scroll.
      start: 1,
      end: "max",
      // onUpdate is called every time the scroll position changes.
      onUpdate: (self) => {
        // Clear any existing timeout every time the user scrolls.
        clearTimeout(scrollTimeout);

        if (self.direction === 1) {
          // --- SCROLLING DOWN ---
          changeLogo(altSrc);

          // Set a new timeout. If the user stops scrolling for 2 seconds,
          // the logo will revert back to the original.
          scrollTimeout = setTimeout(() => changeLogo(origSrc), 1000);

        } else if (self.direction === -1) {
          // --- SCROLLING UP ---
          changeLogo(origSrc);
        }
      },
    });
  };

  // Add event listeners that will call activateScrollTrigger only once upon the first user scroll.
  window.addEventListener('wheel', activateScrollTrigger, { once: true });
  window.addEventListener('touchmove', activateScrollTrigger, { once: true });
};

export default initLogoScrollAnimation;
