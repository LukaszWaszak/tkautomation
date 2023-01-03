import ContactFormSelect from './ContactFormSelect';

export default class CustomSelect {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;
    this.select = el;
    this.label = this.select.querySelector('[data-custom-select-label]');
    this.currentOption = '';
    this.selectEl = this.select.querySelector('.customSelect__select');
    this.options = [];
    this.placeholder = '';

    return true;
  }

  init() {
    this.setOptions();
    this.setLabel();
    this.initSelect();
  }

  setLabel() {
    if (!this.label) return;
    this.placeholder = this.label.innerText;
  }

  setOptions() {
    if (!this.selectEl) return;

    const { options } = this.selectEl;
    Array.from(options).forEach((item) => {
      const option = item.value;
      this.options.push(option);
    });
  }

  initSelect() {
    let html = '';
    html += '<div class="formSelect formSelect--theme-white formSelect--floatingLabel" data-contact-form-select>';
    html += this.getOptionsTemplate();
    html += '</div>';

    new ContactFormSelect(this.select, html);
  }

  getOptionsTemplate() {
    let options = `<div class="formSelect__options" data-contact-form-select-options>
      <div class="formSelect__selected" data-contact-form-select-selected>
        <div class="formSelect__selectedPlaceholder">
          <span>${this.placeholder}</span>
        </div>
        <div class="formSelect__selectedItem">
          <p data-contact-form-select-current></p>
        </div>
        <div class="formSelect__selectedIcon" data-contact-form-select-icon>
          <span class="icon-chevron-down"></span>
        </div>
      </div>
    <div class="formSelect__list" data-contact-form-select-list>`;

    this.options.forEach((item) => {
      options += `<div class="formSelect__listItem" data-contact-form-select-option>
          <p data-contact-form-select-option-value>${item}</p>
        </div>`;
    });

    options += '</div></div>';
    return options;
  }
}
