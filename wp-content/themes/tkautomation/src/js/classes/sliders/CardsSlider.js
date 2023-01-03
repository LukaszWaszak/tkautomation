import Swiper, { Autoplay, Navigation } from 'swiper';

Swiper.use([Autoplay, Navigation]);

export default class CounterSlider {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.slider = el;
    this.sliderContainer = this.slider.querySelector('[data-cards-slider-container]');

    this.prevNav = this.slider.querySelector('[data-cards-slider-prev]');
    this.nextNav = this.slider.querySelector('[data-cards-slider-next]');

    this.swiper = null;

    return true;
  }

  init() {
    if (!this.slider || !this.sliderContainer) return;

    this.swiper = new Swiper(this.sliderContainer, {
      navigation: {
        nextEl: this.nextNav,
        prevEl: this.prevNav,
      },
      speed: 1500,
      slidesPerView: 'auto',
    });
  }

  destroy() {
    this.swiper.destroy();
  }
}
