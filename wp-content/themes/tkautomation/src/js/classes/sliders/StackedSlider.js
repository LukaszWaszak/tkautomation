export default class StackedSlider {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.slider = el;
    this.slides = this.slider.querySelectorAll('[data-stacked-slider-slide]');
    this.prev = this.slider.querySelector('[data-stacked-slider-prev]');
    this.next = this.slider.querySelector('[data-stacked-slider-next]');

    this.currentSlide = 0;
    this.maxVisible = 4;

    return true;
  }

  init() {
    this.setSlides();
    this.bindEvents();
  }

  bindEvents() {
    this.bindPrev();
    this.bindNext();
  }

  bindPrev() {
    if (!this.prev) return;
    this.prev.addEventListener('click', (event) => this.onPrevClick(event));
  }

  bindNext() {
    if (!this.next) return;
    this.next.addEventListener('click', (event) => this.onNextClick(event));
  }

  setSlides() {
    if (!this.slides) return;

    this.slides.forEach((item, index) => {
      this.setActive(item, index);
      this.setDiffAttr(item, index);
    });
  }

  onPrevClick(event) {
    const current = this.currentSlide;
    if (current === 0) return;

    this.currentSlide = current - 1;
    this.setSlides();
  }

  onNextClick(event) {
    const current = this.currentSlide;
    if (current === this.slides.length - 1) return;

    this.currentSlide = current + 1;
    this.setSlides();
  }

  setActive(item, index) {
    if (index === this.currentSlide) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  }

  setDiffAttr(item, index) {
    const diff = index - this.currentSlide;
    if (diff < this.maxVisible) {
      item.setAttribute('data-stacked-slider-slide-diff', diff);
    } else {
      item.removeAttribute('data-stacked-slider-slide-diff');
    }
  }
}
