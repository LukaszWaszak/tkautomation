import TimeSlider from './sliders/TimeSlider';

export default class TimeSliderCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.sliders = document.querySelectorAll('[data-time-slider]');
    if (!this.sliders) return false;

    this.instances = [];

    return true;
  }

  init() {
    if (!this.sliders) return;

    this.sliders.forEach((item) => {
      this.instances.push(new TimeSlider(item));
    });
  }
}
