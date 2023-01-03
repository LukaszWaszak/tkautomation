export default class FaqCard {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.card = el;
    this.toggle = this.card.querySelector('[data-faq-card-toggle]');
    this.toggleIcon = this.card.querySelector('[data-faq-card-toggle-icon]');

    return true;
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    this.bindToggle();
  }

  bindToggle() {
    if (!this.toggle) return;
    this.toggle.addEventListener('click', (event) => this.onToggleClick(event));
  }

  onToggleClick(event) {
    this.card.classList.toggle('active');

    if (this.toggleIcon) {
      this.toggleIcon.classList.toggle('icon-plus');
      this.toggleIcon.classList.toggle('icon-minus');
    }
  }
}
