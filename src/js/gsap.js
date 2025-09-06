// --- GSAP Animation Setup ---
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const initGsapAnimations = () => {
  // --- Animation Constants ---
  // Define duration and ease in one place for a consistent feel across the site.
  const ANIM_DURATION = 0.4;
  const ANIM_EASE = "power1.out";
  const FADE_IN_DISTANCE = 30; // The distance elements travel during their fade-in animation.
  const STAGGER_TIME = 0.3;    // The delay between each item in a staggered animation.
  const SEQUENCE_OFFSET = 0.3; // The time offset for sequencing animations in a timeline.
  const INITIAL_DELAY = 0.3;   // The initial delay before the main page load animation starts.

  // --- Page Loader Animation ---
  const loader = document.getElementById('page-loader');
  if (loader) {
    gsap.to(loader, {
      autoAlpha: 0,
      duration: 0.5, // A quick but smooth fade-out
      delay: 0.1,    // A tiny delay to ensure everything is rendered
      // Remove the loader from the layout entirely once it's hidden.
      onComplete: () => {
        loader.style.display = 'none';
      }
    });
  }

  // --- Initial State Setup ---
  // Hide all cards (project-card on homepage, project-tile on archives) to prevent a flash of unstyled content.
  const cards = gsap.utils.toArray('.project-card, .project-tile');
  gsap.set(cards, { autoAlpha: 0, y: FADE_IN_DISTANCE });

  // --- Reusable Animation Configurations ---
  // These presets make the timeline code cleaner and more consistent.
  const fromFadeUp = { y: -FADE_IN_DISTANCE, autoAlpha: 0, duration: ANIM_DURATION, ease: ANIM_EASE };
  const fromFadeLeft = { x: -FADE_IN_DISTANCE, autoAlpha: 0, duration: ANIM_DURATION, ease: ANIM_EASE };
  const fromFadeInPlace = { autoAlpha: 0, duration: ANIM_DURATION, ease: ANIM_EASE };

  // --- Scroll-Triggered Card Animation ---
  // This configuration is used to animate cards into view as the user scrolls.
  const articlesBatchConfig = {
    start: "top 92%", // Trigger the animation when the top of an element is 92% down the viewport.
    onEnter: batch => {
      gsap.to(batch, {
        autoAlpha: 1,
        y: 0,
        stagger: STAGGER_TIME,
        duration: ANIM_DURATION,
        ease: ANIM_EASE,
        overwrite: true,
        // This gives full control back to the CSS stylesheet after the animation.
        clearProps: "all"
      });
    },
    onLeaveBack: batch => {
      // When scrolling back up, instantly hide the elements again.
      gsap.set(batch, { autoAlpha: 0, y: FADE_IN_DISTANCE, overwrite: true });
    }
  };

  // --- Responsive Animations with matchMedia ---
  // This is GSAP's modern approach to creating responsive animations.
  let mm = gsap.matchMedia();

  // --- Mobile Animations (<= 991px) ---
  mm.add("(max-width: 991px)", () => {
    // This commented-out block is kept for future reference.
    // It adds a class to the header on scroll, which could be used for a "sticky" or "scrolled" state.
    // 1. El header se muestra al hacer scroll.
    // ScrollTrigger.create({
    //   start: 100,
    //   end: "max",
    //   toggleClass: { targets: ".site-header", className: "header-down" },
    // });

    // Create a timeline for the initial page load sequence on mobile.
    const mobileTimeline = gsap.timeline({ delay: INITIAL_DELAY });
    mobileTimeline
      // Add 'page-ready' to the body to reveal the page content, preventing FOUC.
      .call(() => document.body.classList.add('page-ready'))
      .from(".site-header", fromFadeUp, "<") // The "<" starts this animation at the same time as the previous one.
      .from(".presentation__central", fromFadeInPlace, `<${SEQUENCE_OFFSET}`);

    // 3. En móvil, la animación de los artículos se activa inmediatamente con el scroll.
    ScrollTrigger.batch(cards, articlesBatchConfig);
  });

  // --- Desktop Animations (>= 992px) ---
  mm.add("(min-width: 992px)", () => {
    // On desktop, the first card is part of the initial animation sequence.
    const firstCard = cards.length > 0 ? cards[0] : null;
    const remainingCards = cards.length > 1 ? cards.slice(1) : [];

    // Create a timeline for the initial page load sequence on desktop.
    const desktopTimeline = gsap.timeline({
      delay: INITIAL_DELAY,
      // The onComplete callback ensures the scroll-triggered animations for the
      // other cards only start after the main intro animation has finished.
      onComplete: () => {
        if (remainingCards.length > 0) {
          ScrollTrigger.batch(remainingCards, articlesBatchConfig);
        }
      }
    });

    desktopTimeline
      .call(() => document.body.classList.add('page-ready'))
      .from(".site-header", fromFadeUp, "<")
      .from(".presentation__central", fromFadeLeft, `<${SEQUENCE_OFFSET}`);

    // Animate the first card as the final step of the intro sequence.
    if (firstCard) {
      desktopTimeline.to(firstCard, {
        autoAlpha: 1,
        y: 0,
        duration: ANIM_DURATION,
        ease: ANIM_EASE,
        clearProps: "all" // Ensure the first card also behaves correctly.
      }, `<${SEQUENCE_OFFSET}`);
    }
  });

  // --- Main Navigation Menu Animation ---
  // This replaces the CSS-based transition for a more controllable GSAP timeline.
  const menuToggle = document.querySelector('.btn-menu-toggle');
  const siteHeader = document.querySelector('.site-header');
  const siteNav = document.querySelector('.site-navigation');
  const menuOverlay = document.getElementById('menu-overlay');

  if (menuToggle && siteHeader && siteNav && menuOverlay) {
    // Create a timeline for the menu animation, paused by default.
    const menuTimeline = gsap.timeline({
      paused: true,
      onReverseComplete: () => {
        // Ensure the toggled class is removed when the animation is fully reversed.
        // This keeps the state consistent and handles accessibility attributes.
        siteHeader.classList.remove('toggled');
        menuToggle.setAttribute('aria-expanded', 'false');
        // Clean up event listeners when the menu is closed.
        document.removeEventListener('click', handleOutsideClick);
        document.removeEventListener('keydown', handleEscapeKey);
      }
    });


    // Define the animation sequence.
    menuTimeline
      .to(menuOverlay, { autoAlpha: 1, duration: ANIM_DURATION, ease: ANIM_EASE })
      .fromTo(siteNav, 
        { x: -FADE_IN_DISTANCE, autoAlpha: 0 }, 
        { x: 0, autoAlpha: 1, duration: ANIM_DURATION, ease: ANIM_EASE }, 
        "<" // Start at the same time as the overlay animation
      );

    // --- Accessibility & UX Functions ---
    // Function to handle clicks outside the menu.
    const handleOutsideClick = (e) => {
      if (!siteNav.contains(e.target) && !menuToggle.contains(e.target)) {
        menuTimeline.reverse();
      }
    };

    // Function to handle the Escape key.
    const handleEscapeKey = (e) => {
      if (e.key === 'Escape') {
        menuTimeline.reverse();
      }
    };

    // Add click event listener to the toggle button.
    menuToggle.addEventListener('click', (e) => {
      e.preventDefault();
      
      // Toggle the class to keep a state indicator and play/reverse the timeline.
      const isOpening = !siteHeader.classList.contains('toggled');
      siteHeader.classList.toggle('toggled', isOpening);
      menuToggle.setAttribute('aria-expanded', isOpening);

      if (isOpening) {
        menuTimeline.play();
        // Use a timeout to add listeners after the current event loop.
        setTimeout(() => {
          document.addEventListener('click', handleOutsideClick);
          document.addEventListener('keydown', handleEscapeKey);
        }, 0);
      } else {
        menuTimeline.reverse();
      }
    });
  }
};

// --- Continuous Carousel Animation ---
const coursesWrapper = document.querySelector('.courses-wrapper');
if (coursesWrapper) {
  const originalCourses = gsap.utils.toArray('.courses-wrapper .course');
  let originalWidth = 0;

  // Calculate the width of the original set of courses
  originalCourses.forEach(course => {
    originalWidth += course.offsetWidth + parseFloat(getComputedStyle(course).marginRight || 0);
  });

  // Only proceed if we have valid dimensions
  if (coursesWrapper.offsetWidth > 0 && originalWidth > 0) {
    // Fixed cloning: clone the original set a few times to ensure enough content
    const fixedCloningIterations = 5; // Adjust this number if needed

    for (let i = 0; i < fixedCloningIterations; i++) {
      originalCourses.forEach(course => {
        const clone = course.cloneNode(true);
        coursesWrapper.appendChild(clone);
      });
    }

    // Recalculate total width after cloning (though not strictly needed for animation, good for debugging) and log it
    const allCourses = gsap.utils.toArray('.courses-wrapper .course');
    let totalClonedWidth = 0;
    allCourses.forEach(course => {
      totalClonedWidth += course.offsetWidth + parseFloat(getComputedStyle(course).marginRight || 0);
    });
    
    // Now, animate the coursesWrapper
    gsap.to(coursesWrapper, {
      x: -originalWidth, // Animate by the width of the original set
      ease: "none",
      duration: 35, // Adjust duration for desired speed
      repeat: -1,
      modifiers: {
        x: gsap.utils.unitize(x => parseFloat(x) % originalWidth) // Seamless looping based on original width
      }
    });
  }
}

export default initGsapAnimations;