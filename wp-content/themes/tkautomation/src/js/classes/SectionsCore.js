import Section from './sections/Section';

export default class SectionCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.sections = document.querySelectorAll('[data-section]');
    if (!this.sections) return false;

    this.instances = [];
    return true;
  }

  init() {
    if (!this.sections) return;

    this.sections.forEach((item) => {
      this.instances.push(new Section(item));
    });
  }
}
