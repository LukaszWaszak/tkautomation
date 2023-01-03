import Swiper, { Autoplay } from 'swiper';

Swiper.use([Autoplay]);

export default class LoopSlider {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;

    this.slider = el;
    this.wrapper = this.slider.querySelector('[data-loop-slider-wrapper]');

    return true;
  }

  init() {
    if (!this.slider || !this.wrapper) return;

    this.swiper = new Swiper(this.wrapper, {
      autoplay: {
        delay: 1000,
      },
      speed: 3000,
      slidesPerView: 1,
      loop: true,
      breakpoints: {
        440: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1280: {
          slidesPerView: 5,
        },
      },
    });
  }
}
