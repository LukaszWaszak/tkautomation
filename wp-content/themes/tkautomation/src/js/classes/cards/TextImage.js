import { popupOpen } from '../../helpers/popup';

export default class TextImage {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.card = el;
    this.video = this.card.getAttribute('data-video-textimage-src');
    this.play = this.card.querySelector('[data-video-textimage-play]');

    return true;
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    this.bindPlay();
  }

  bindPlay() {
    if (!this.play) return;
    this.play.addEventListener('click', this.onPlayClick.bind(this));
  }

  onPlayClick() {
    if (!this.video) return;

    popupOpen({
      id: 'VideoPopup',
      noBackground: true,
      component: () => import(/* webpackMode: "eager" */ '../../vue/components/popup/VideoPopup.vue'),
      props: {
        src: this.video
      }
    });
  }
}
