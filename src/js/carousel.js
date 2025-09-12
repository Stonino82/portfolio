import { gsap } from "gsap";

// --- Continuous Carousel Animation ---
const createWrapperCarousel = (wrapper, itemSelector, duration = 35) => {
  if (!wrapper) return;

  const originalItems = Array.from(wrapper.querySelectorAll(itemSelector));
  if (originalItems.length === 0) return;

  let originalWidth = 0;
  originalItems.forEach(item => {
    const style = getComputedStyle(item);
    originalWidth += item.offsetWidth + parseInt(style.marginLeft) + parseInt(style.marginRight);
  });

  if (wrapper.offsetWidth > 0 && originalWidth > 0) {
    const cloneCount = Math.ceil(wrapper.offsetWidth / originalWidth) + 2;
    for (let i = 0; i < cloneCount; i++) {
      originalItems.forEach(item => {
        const clone = item.cloneNode(true);
        wrapper.appendChild(clone);
      });
    }

    gsap.to(wrapper, {
      x: -originalWidth,
      ease: "none",
      duration: duration,
      repeat: -1,
      modifiers: {
        x: gsap.utils.unitize(x => parseFloat(x) % originalWidth)
      }
    });
  }
};

// Apply the carousel to courses
const coursesWrapper = document.querySelector('.courses-wrapper');
if (coursesWrapper) {
  createWrapperCarousel(coursesWrapper, '.course', 35);
}
