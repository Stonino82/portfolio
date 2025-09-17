// --- GSAP Animation Setup ---
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const initGsapAnimations = () => {
  // --- Animation Constants ---
  // Define duration and ease in one place for a consistent feel across the site.
  const ANIM_DURATION = 0.4;
  const ANIM_EASE = "power1.out";
  const FADE_IN_DISTANCE = 50; // The distance elements travel during their fade-in animation.
  const STAGGER_TIME = 0.3;    // The delay between each item in a staggered animation.
  const SEQUENCE_OFFSET = 0.3; // The time offset for sequencing animations in a timeline.
  const INITIAL_DELAY = 0.3;   // The initial delay before the main page load animation starts.
  const SCROLL_TRIGGER_START = "top 92%"; // The point at which scroll-triggered animations start.

  // --- Reusable Animation Configurations ---
  // These presets make the timeline code cleaner and more consistent.
  const fromFadeUp = { y: -FADE_IN_DISTANCE, autoAlpha: 0, duration: ANIM_DURATION, ease: ANIM_EASE };
  const fromFadeLeft = { x: -FADE_IN_DISTANCE, autoAlpha: 0, duration: ANIM_DURATION, ease: ANIM_EASE };
  const fromFadeInPlace = { autoAlpha: 0, duration: ANIM_DURATION, ease: ANIM_EASE };

  const initHeaderAnimations = () => {
    // --- Main Navigation Menu Animation ---
    const menuToggle = document.querySelector('.btn-menu-toggle');
    const siteHeader = document.querySelector('.site-header');
    const siteNav = document.querySelector('.site-navigation');
    const menuOverlay = document.getElementById('menu-overlay');

    if (menuToggle && siteHeader && siteNav && menuOverlay) {
      const menuTimeline = gsap.timeline({
        paused: true,
        onReverseComplete: () => {
          siteHeader.classList.remove('toggled');
          menuToggle.setAttribute('aria-expanded', 'false');
          document.removeEventListener('click', handleOutsideClick);
          document.removeEventListener('keydown', handleEscapeKey);
        }
      });

      menuTimeline
        .to(menuOverlay, { autoAlpha: 1, duration: ANIM_DURATION, ease: ANIM_EASE })
        .fromTo(siteNav, 
          { x: -FADE_IN_DISTANCE, autoAlpha: 0 }, 
          { x: 0, autoAlpha: 1, duration: ANIM_DURATION, ease: ANIM_EASE }, 
          "<"
        );

      const handleOutsideClick = (e) => {
        if (!siteNav.contains(e.target) && !menuToggle.contains(e.target)) {
          menuTimeline.reverse();
        }
      };

      const handleEscapeKey = (e) => {
        if (e.key === 'Escape') {
          menuTimeline.reverse();
        }
      };

      menuToggle.addEventListener('click', (e) => {
        e.preventDefault();
        const isOpening = !siteHeader.classList.contains('toggled');
        siteHeader.classList.toggle('toggled', isOpening);
        menuToggle.setAttribute('aria-expanded', isOpening);

        if (isOpening) {
          menuTimeline.play();
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

  const initLoaderAnimation = () => {
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
  };

  const initScrollAnimations = () => {
    // --- GLOBAL INTRO TIMELINE ---
    const introTimeline = gsap.timeline({ delay: INITIAL_DELAY });
    introTimeline
      .call(() => document.body.classList.add('page-ready'))
      .from(".site-header", fromFadeUp, "<");

    // Add page-specific intro elements to the global timeline
    const heroColumns = gsap.utils.toArray('.hero .column');
    const presentationCentral = document.querySelector('.presentation__central');

    if (heroColumns.length > 0) {
      introTimeline.from(heroColumns, { ...fromFadeInPlace, stagger: STAGGER_TIME }, `<${SEQUENCE_OFFSET}`);
    } else if (presentationCentral) {
      let mm = gsap.matchMedia();
      mm.add("(max-width: 991px)", () => {
        introTimeline.from(presentationCentral, fromFadeInPlace, `<${SEQUENCE_OFFSET}`);
      });
      mm.add("(min-width: 992px)", () => {
        introTimeline.from(presentationCentral, fromFadeLeft, `<${SEQUENCE_OFFSET}`);
      });
    }

    // --- UNIFIED SCROLL-TRIGGERED ANIMATIONS ---
    const sectionBatchConfig = {
      start: SCROLL_TRIGGER_START,
      onEnter: batch => gsap.to(batch, { autoAlpha: 1, y: 0, stagger: STAGGER_TIME, duration: ANIM_DURATION, ease: ANIM_EASE, overwrite: true, clearProps: "all" }),
      onLeaveBack: batch => gsap.set(batch, { autoAlpha: 0, y: FADE_IN_DISTANCE, overwrite: true })
    };

    const createSectionBatch = (selector) => {
      const elements = gsap.utils.toArray(selector);
      if (elements.length > 0) {
        gsap.set(elements, { autoAlpha: 0, y: FADE_IN_DISTANCE });
        ScrollTrigger.batch(elements, sectionBatchConfig);
      }
    };

    // Create batches for all sections across the site
    createSectionBatch('.philosophy .column');
    createSectionBatch('.journey .section__header, .journey .column__paragraph div, .journey .column__footer');
    createSectionBatch('.testimonials .section__header, .testimonials .testimonial-card, .testimonials .section__footer');
    createSectionBatch('.skills .column');
    createSectionBatch('.passions .section__header, .passions .column');
    createSectionBatch('.blog .section__header, .blog .column');
    createSectionBatch('.last .promotional-banner');
    createSectionBatch('.project-card');
    createSectionBatch('.project-tile');
    // --- Snapshots Section Animation ---
    // Animate header with the default batch config
    createSectionBatch('.snapshots .section__header');

    // Create a custom, responsive batch for the carousel items
    const snapshotItems = gsap.utils.toArray('.snapshots .snapshot-item');
    if (snapshotItems.length > 0) {
        const snapshotsCarousel = document.querySelector('.snapshots-carousel');
        let dynamicBatchMax = 4; // Default value

        if (snapshotsCarousel && snapshotItems[0]) {
            const itemWidth = snapshotItems[0].offsetWidth;
            if (itemWidth > 0) {
                // Calculate how many items fit and add 2 for buffer
                dynamicBatchMax = Math.ceil(snapshotsCarousel.offsetWidth / itemWidth) + 2;
            }
        }

        const snapshotItemConfig = {
            ...sectionBatchConfig, // Inherit start, onLeaveBack etc.
            batchMax: dynamicBatchMax,
            onEnter: batch => gsap.to(batch, { 
                autoAlpha: 1, 
                y: 0, 
                stagger: STAGGER_TIME / 5, // Faster stagger as requested
                duration: ANIM_DURATION, 
                ease: ANIM_EASE, 
                overwrite: true, 
                clearProps: "all" 
            }),
        };

        // Set initial state and create the batch
        gsap.set(snapshotItems, { autoAlpha: 0, y: FADE_IN_DISTANCE });
        ScrollTrigger.batch(snapshotItems, snapshotItemConfig);
    }

    // Special Batch for Stats section (with counter)
    const statsElements = gsap.utils.toArray('.stats .column__content');
    if (statsElements.length > 0) {
      gsap.set(statsElements, { autoAlpha: 0, y: FADE_IN_DISTANCE });
      ScrollTrigger.batch(statsElements, {
        start: SCROLL_TRIGGER_START,
        onEnter: batch => {
          gsap.to(batch, { autoAlpha: 1, y: 0, stagger: STAGGER_TIME, duration: ANIM_DURATION, ease: ANIM_EASE, clearProps: "all" });
          batch.forEach(el => {
            const counter = el.querySelector('.stat-counter');
            if (counter && !counter.dataset.animated) {
              counter.dataset.animated = 'true';
              const finalValue = parseInt(counter.dataset.finalValue, 10);
              let counterObject = { value: 0 };
              gsap.to(counterObject, {
                duration: 2,
                value: finalValue,
                ease: 'power2.out',
                onUpdate: () => { counter.textContent = `${Math.round(counterObject.value)}+`; }
              });
            }
          });
        },
        onLeaveBack: batch => {
          gsap.set(batch, { autoAlpha: 0, y: FADE_IN_DISTANCE, overwrite: true });
          batch.forEach(el => {
            const counter = el.querySelector('.stat-counter');
            if (counter) {
              counter.textContent = '0+';
              delete counter.dataset.animated;
            }
          });
        }
      });
    }
  };

  // --- Run Animations ---
  initLoaderAnimation();
  initHeaderAnimations();
  initScrollAnimations();
};

export default initGsapAnimations;