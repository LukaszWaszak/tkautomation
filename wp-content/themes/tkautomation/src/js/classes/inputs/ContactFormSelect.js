/* HANDLER FOR CUSTOM SELECTS IN CONTACT FORM 7 */

export default class ContactFormSelect {
  constructor(select, html) {
    if (!this.setVars(select, html)) return;

    this.init();
  }

  setVars(select, html) {
    if (!select || html === '') return false;
    this.select = select;
    this.html = html;
    this.wrapper = this.select.querySelector('.wpcf7-form-control-wrap');

    return true;
  }

  init() {
    this.setSelect();
    this.setSelectInner();
    this.bindEvents();
  }

  setSelect() {
    if (!this.select || this.html === '' || !this.wrapper) return;

    const el = new DocumentFragment();
    el.innerHTML = this.html;
    this.wrapper.insertAdjacentHTML('beforeend', this.html);
  }

  setSelectInner() {
    this.contactFormSelect = this.wrapper.querySelector('[data-contact-form-select]');
    if (!this.contactFormSelect) return;

    this.baseSelect = this.select.querySelector('select');
    this.selectedEl = this.contactFormSelect.querySelector('[data-contact-form-select-selected]');
    this.current = this.contactFormSelect.querySelector('[data-contact-form-select-current]');
    this.selectIcon = this.contactFormSelect.querySelector('[data-contact-form-select-icon]');
    this.listEl = this.contactFormSelect.querySelector('[data-contact-form-select-list]');
    this.optionsEl = this.contactFormSelect.querySelector('[data-contact-form-select-options]');
    this.options = this.contactFormSelect.querySelectorAll('[data-contact-form-select-option]');
  }

  bindEvents() {
    this.bindSelectEvents();
    this.bindListEvents();
  }

  bindSelectEvents() {
    if (!this.selectedEl || !this.listEl) return;
    this.selectedEl.addEventListener('click', (event) => this.onSelectedClick(event));
  }

  bindListEvents() {
    if (!this.options) return;

    this.options.forEach((item) => {
      item.addEventListener('click', (event) => this.onOptionClick(event));
    });
  }

  onSelectedClick(event) {
    if (!this.selectIcon || !this.optionsEl) return;

    this.optionsEl.classList.toggle('active');
  }

  onOptionClick(event) {
    const { currentTarget } = event;
    const optionValue = currentTarget.querySelector('[data-contact-form-select-option-value]');
    this.optionsEl.classList.toggle('active');
    this.optionsEl.classList.add('selected');

    if (!optionValue) return;
    this.current.innerHTML = optionValue.innerHTML;

    if (this.baseSelect) this.baseSelect.value = optionValue.innerHTML;
  }
}
