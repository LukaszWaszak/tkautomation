export default class LazyImage {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.image = el;
    this.threshold = 0;

    return true;
  }

  init() {
    this.bindObserver();
  }

  bindObserver() {
    this.observer = new IntersectionObserver(this.observerCallback.bind(this), {
      rootMargin: '0px 0px 50px 0px',
      threshold: this.threshold,
    });

    this.observer.observe(this.image);
  }

  observerCallback(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const { target } = entry;
        const { parentElement } = target;
        const parentClasses = parentElement.classList;
        const src = target.getAttribute('data-image-lazy-src');

        target.src = src;

        if (parentClasses.contains('imageBox')) {
          target.onload = () => {
            target.classList.add('loaded');
            parentElement.classList.add('loaded');
          };
        } else {
          target.onload = () => {
            target.classList.add('loaded');
          };
        }

        this.observer.unobserve(this.image);
      }
    });
  }
}
