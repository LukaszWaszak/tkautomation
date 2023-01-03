import ButtonVideoPopup from './buttons/ButtonVideoPopup';

export default class ButtonVideoPopupCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.buttons = document.querySelectorAll('[data-button-video-popup]');
    if (!this.buttons) return false;

    this.instances = [];

    return true;
  }

  init() {
    this.buttons.forEach((item) => {
      this.instances.push(new ButtonVideoPopup(item));
    });
  }
}
