import TextImage from './cards/TextImage';

export default class TextImageCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.cards = document.querySelectorAll('[data-video-textimage]');
    if (!this.cards) return false;

    this.instances = [];

    return true;
  }

  init() {
    this.cards.forEach((item) => {
      this.instances.push(new TextImage(item));
    });
  }
}
