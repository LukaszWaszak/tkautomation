import StackedSlider from './sliders/StackedSlider';

export default class StackedSliderCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.sliders = document.querySelectorAll('[data-stacked-slider]');
    if (!this.sliders) return false;
    this.instances = [];

    return true;
  }

  init() {
    this.sliders.forEach((item) => {
      this.instances.push(new StackedSlider(item));
    });
  }
}
