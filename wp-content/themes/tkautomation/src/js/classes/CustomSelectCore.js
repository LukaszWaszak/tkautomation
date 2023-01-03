import CustomSelect from "./inputs/CustomSelect";

export default class CustomSelectCore {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.selects = document.querySelectorAll('[data-custom-select]');
    if (!this.selects) return false;

    this.instances = [];

    return true;
  }

  init() {
    if (!this.selects) return;

    this.selects.forEach((item) => {
      this.instances.push(new CustomSelect(item));
    });
  }
}
