export default class PageNav {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.header = document.querySelector('[data-page-nav]');
    if (!this.header) return false;

    this.progress = this.header.querySelector('[data-page-nav-progress]');
    this.sticky = this.header.querySelector('[data-page-nav-side]');
    this.top = this.header.querySelector('[data-page-nav-top]');
    this.main = this.header.querySelector('[data-page-nav-main]');

    this.toggle = this.header.querySelectorAll('[data-page-nav-toggle]');
    this.currentScroll = 0;

    // this.mainButton = this.header.querySelector('[data-page-nav-main-button]');
    // this.initMainButton = {
    //   url: this.mainButton.href,
    //   text: this.mainButton.innerText,
    // };
    // this.replaceButton = document.querySelector('[data-page-nav-replace-main-button]');

    return true;
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    this.bindScroll();
    this.bindToggle();
  }

  bindScroll() {
    this.onScroll = this.onScroll.bind(this);
    window.addEventListener('liteScroll', this.onScroll);
  }

  bindToggle() {
    if (!this.toggle || !this.main) return;
    this.toggle.forEach((item) => {
      item.addEventListener('click', (event) => this.onToggleClick(event));
    });
  }

  onScrollProgress() {
    if (!this.progress) return;

    const fullHeight = document.body.offsetHeight - window.innerHeight;
    const scroll = this.currentScroll;
    const percentage = (scroll / fullHeight) * 100;

    this.progress.style = `width: ${percentage}%`;
  }

  onToggleClick(event) {
    this.main.classList.toggle('active');
  }

  onScroll(e) {
    let isScrollDown = e.detail.scrollTop > this.currentScroll;
    this.currentScroll = e.detail.scrollTop;

    if (this.currentScroll === window.offsetHeight) {
      isScrollDown = true;
    } else if (this.currentScroll === 0) {
      isScrollDown = false;
    }

    this.setFixed(isScrollDown);
    // this.setMainButton();
    this.onScrollProgress();
  }

  setFixed(status) {
    const stickyRect = this.sticky.getBoundingClientRect();
    const stickyHeight = stickyRect.height;
    const topRect = this.top.getBoundingClientRect();
    const topHeight = topRect.height;
    let transform = 0;

    if (window.innerWidth < 1024) {
      transform = (status) ? (stickyHeight + 1) : 0;
    } else {
      transform = (status) ? (stickyHeight + topHeight + 1) : 0;
    }

    if (status) {
      this.header.classList.add('fixed');
    } else {
      this.header.classList.remove('fixed');
    }

    this.setHeaderTransform(transform);
  }



  setHeaderTransform(value) {
    this.header.style.transform = `translateY(-${value}px)`;
  }
}
