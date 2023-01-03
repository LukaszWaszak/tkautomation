import LazyImage from "./images/LazyImage";

export default class LazyImageCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.images = document.querySelectorAll('[data-image-lazy]');
    if (!this.images) return false;

    this.instances = [];

    return true;
  }

  init() {
    this.images.forEach((item) => {
      const image = new LazyImage(item);
      this.instances.push(image);
    });
  }
}
