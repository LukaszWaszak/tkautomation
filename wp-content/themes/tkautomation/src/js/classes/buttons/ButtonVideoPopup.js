import { popupOpen } from '../../helpers/popup';

export default class ButtonVideoPopup {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.button = el;
    this.url = this.button.getAttribute('href');

    return true;
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    this.bindClick();
  }

  bindClick() {
    if (!this.button) return;
    this.button.addEventListener('click', (event) => this.onButtonClick(event));
  }

  onButtonClick(event) {
    if (!this.url || this.url === '') return;

    event.preventDefault();
    popupOpen({
      id: 'VideoPopup',
      noBackground: true,
      component: () => import(/* webpackMode: "eager" */ '../../vue/components/popup/VideoPopup.vue'),
      props: {
        src: this.url
      }
    });
  }
}
