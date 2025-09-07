import Swiper from 'swiper';
import { Navigation, Autoplay, EffectFade, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/effect-fade'; // Import fade effect CSS

const initTestimonialSwiper = () => {
  const testimonialSwiper = document.querySelector('.testimonials-swiper');

  if (testimonialSwiper) {
    new Swiper(testimonialSwiper, {
      // Optional parameters
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      slidesPerView: 1,
      centeredSlides: false,
      spaceBetween: 16,
      modules: [Navigation, Autoplay], // Add Navigation module here

      // Navigation arrows
      navigation: {
        nextEl: '.section__header .swiper-button-next',
        prevEl: '.section__header .swiper-button-prev',
      },
      breakpoints: {
        // when window width is >= 768px
        768: {
          slidesPerView: 2,
          spaceBetween: 16
        },
        // when window width is >= 1024px
        1024: {
          slidesPerView: 3,
          spaceBetween: 16
        }
      },
      on: {
        init: function () {
          this.slides.forEach(slide => {
            const btn = slide.querySelector('.read-more-btn');
            if (!btn) return;
      
            const card = slide.querySelector('.testimonial-card');
            const paragraph = slide.querySelector('.testimonial-card__body p');
      
            btn.classList.add('read-more-hidden');

            if (paragraph.scrollHeight > paragraph.clientHeight) {
              btn.classList.remove('read-more-hidden');
            } else {
              btn.classList.add('read-more-hidden');
            }
      
            btn.addEventListener('click', () => {
              const isExpanded = paragraph.classList.contains('expanded');
              paragraph.classList.toggle('expanded');
              
              if (!isExpanded) {
                btn.textContent = 'Read less...';
                card.style.height = 'auto';
              } else {
                btn.textContent = 'Read more...';
                card.style.height = '440px';
              }
              this.update(); // Update swiper layout
            });
          });
        },
        update: function () {
          this.slides.forEach(slide => {
              const btn = slide.querySelector('.read-more-btn');
              if (!btn) return;
      
              const paragraph = slide.querySelector('.testimonial-card__body p');
              const isExpanded = paragraph.classList.contains('expanded');
      
              if (!isExpanded) {
                  if (paragraph.scrollHeight > paragraph.clientHeight) {
                      btn.classList.remove('read-more-hidden');
                  } else {
                      btn.classList.add('read-more-hidden');
                  }
              }
          });
        }
      }
    });
  }
};

const initHeroSwiper = () => {
  const heroSwiperContainer = document.querySelector('.hero-swiper');

  if (heroSwiperContainer) {
    new Swiper(heroSwiperContainer, {
      // Optional parameters
      loop: true,
      autoplay: {
        delay: 6500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      slidesPerView: 1,
      modules: [EffectFade, Pagination, Autoplay], // Add Pagination module here
      pagination: {
        el: '.hero-swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          const bullets = document.querySelectorAll('.hero-swiper-pagination p');
          return `<p class="text-body-sm ${className}">${bullets[index].innerHTML}</p>`;
        },
      },
    });
  }
};

export default initTestimonialSwiper;
export { initHeroSwiper };