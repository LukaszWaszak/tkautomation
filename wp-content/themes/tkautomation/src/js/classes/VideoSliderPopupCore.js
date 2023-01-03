import VideoSliderPopup from './cards/VideoSliderPopup';

export default class VideoSliderCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.cards = document.querySelectorAll('[data-video-videoSlider]');
    if (!this.cards) return false;

    this.instances = [];

    return true;
  }

  init() {
    this.cards.forEach((item) => {
      this.instances.push(new VideoSliderPopup(item));
    });
  }
}
