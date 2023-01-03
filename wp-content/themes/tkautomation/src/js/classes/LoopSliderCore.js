import LoopSlider from './sliders/LoopSlider';

export default class LoopSliderCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.sliders = document.querySelectorAll('[data-loop-slider]');
    if (!this.sliders) return false;

    this.instances = [];

    return true;
  }

  init() {
    if (!this.sliders) return;

    this.sliders.forEach((item) => {
      this.instances.push(new LoopSlider(item));
    });
  }
}
