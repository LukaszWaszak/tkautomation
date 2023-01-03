import CounterSlider from './sliders/CounterSlider';

export default class CounterSliderCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.sliders = document.querySelectorAll('[data-counter-slider]');
    if (!this.sliders) return false;

    this.instances = [];

    return true;
  }

  init() {
    if (!this.sliders) return;

    this.sliders.forEach((item) => {
      const slider = new CounterSlider(item);
      this.instances.push(slider);
    });
  }
}
