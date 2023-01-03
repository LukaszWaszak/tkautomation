import Shape from '../shape/Shape';

export default class Section {
  constructor(section) {
    if (!this.setVars(section)) return;

    this.init();
  }

  init() {
    this.bindObserver();
  }

  setVars(section) {
    if (!section) return false;
    this.section = section;
    this.shapes = this.section.querySelectorAll('[data-section-shape]');
    this.threshold = 0;

    return true;
  }

  bindObserver() {
    this.observer = new IntersectionObserver(this.observerCallback.bind(this), {
      threshold: this.threshold,
    });

    this.observer.observe(this.section);
  }

  observerCallback(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const { target } = entry;
        const id = target.getAttribute('id');

        target.classList.add('intersect');
      }
    });
  }

  calcThreshold() {
    const rect = this.section.getBoundingClientRect();
    const { height } = rect;
    const factor = window.innerHeight / height;

    this.threshold = (factor > this.threshold) ? this.threshold : factor;
    const thresholdHeight = this.threshold * height;

    // if threshold pixels height is larger than half window height, divide by 2
    this.threshold = (thresholdHeight >= (window.innerHeight / 2))
      ? (this.threshold / 2) : this.threshold;
  }

  initShapes() {
    if (!this.shapes) return;

    this.shapes.forEach((item) => {
      new Shape(this.section, item);
    });
  }
}
