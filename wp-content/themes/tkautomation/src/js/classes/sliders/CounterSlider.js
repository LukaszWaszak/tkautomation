import Swiper, { Autoplay } from 'swiper';

Swiper.use([Autoplay]);

export default class CounterSlider {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.slider = el;
    this.sliderContainer = this.slider.querySelector('[data-counter-slider-container]');
    this.swiper = null;

    return true;
  }

  init() {
    if (!this.slider || !this.sliderContainer) return;

    this.swiper = new Swiper(this.sliderContainer, {
      autoplay: {
        delay: 1000,
      },
      speed: 3000,
      slidesPerView: 'auto',
      loop: true,
    });
  }
}
