import Swiper, { Autoplay, Navigation } from 'swiper';

Swiper.use([Autoplay, Navigation]);

export default class BusinessReviewsSlider {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.slider = el;
    this.wrapper = this.slider.querySelector('[data-business-review-slider-wrapper]');
    this.nextEl = this.slider.querySelector('[data-business-review-slider-next]');
    this.prevEl = this.slider.querySelector('[data-business-review-slider-prev]');

    return true;
  }

  init() {
    this.initSwiper();
  }

  initSwiper() {
    if (!this.slider || !this.wrapper) return;

    this.swiper = new Swiper(this.wrapper, {
      speed: 2000,
      slidesPerView: 1,
      loop: true,
      centeredSlides: true,
      navigation: {
        nextEl: this.nextEl,
        prevEl: this.prevEl,
      },
      breakpoints: {
        440: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  }
}
