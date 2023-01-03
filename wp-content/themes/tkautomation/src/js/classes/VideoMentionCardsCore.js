import VideoMention from './cards/VideoMention';

export default class VideoMentionCardsCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.cards = document.querySelectorAll('[data-video-mention]');
    if (!this.cards) return false;

    this.instances = [];

    return true;
  }

  init() {
    this.cards.forEach((item) => {
      this.instances.push(new VideoMention(item));
    });
  }
}
