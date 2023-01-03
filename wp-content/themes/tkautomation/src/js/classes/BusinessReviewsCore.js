import BusinessReviewsSlider from './sliders/BusinessReviewSlider';

export default class BusinessReviewsCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.sliders = document.querySelectorAll('[data-business-review-slider]');
    if (!this.sliders) return false;

    this.instances = [];

    return true;
  }

  init() {
    this.sliders.forEach((item) => {
      this.instances.push(new BusinessReviewsSlider(item));
    });
  }
}
