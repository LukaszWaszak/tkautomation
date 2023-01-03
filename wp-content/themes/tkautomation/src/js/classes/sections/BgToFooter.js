export default class BgToFooter {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.section = document.querySelector('[data-bg-to-footer]');
    if (!this.section) return false;

    this.footer = document.querySelector('footer');
    return true;
  }

  init() {
    if (!this.section || !this.footer) return;

    this.newsletter = this.footer.querySelector('.newsletter');

    this.bindResize();
    setTimeout(() => {
      this.setOffset();
    }, 1000);
  }

  bindEvents() {
    this.bindResize();
  }

  bindResize() {
    window.addEventListener('resize', this.setOffset.bind(this));
  }

  setOffset() {
    const sectionTop = this.section.offsetTop;

    const footerTop = this.footer.offsetTop;
    const newsletterRect = this.newsletter.getBoundingClientRect();
    const newsletterHeight = newsletterRect.height;

    const height = (footerTop - sectionTop) + (newsletterHeight / 2);
    this.section.style = `--after: ${height}px;`;
  }
}
