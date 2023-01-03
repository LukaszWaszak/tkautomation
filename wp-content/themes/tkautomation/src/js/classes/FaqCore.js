import FaqCard from './cards/FaqCard';

export default class FaqCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.faqCards = document.querySelectorAll('[data-faq-card]');
    if (!this.faqCards) return false;

    return true;
  }

  init() {
    if (!this.faqCards) return;

    this.faqCards.forEach((item) => {
      new FaqCard(item);
    });
  }
}
