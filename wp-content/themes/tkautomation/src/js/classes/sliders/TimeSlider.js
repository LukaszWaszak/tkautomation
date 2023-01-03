import Swiper, { Pagination } from 'swiper';

Swiper.use([Pagination]);

export default class TimeSlider {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.init();
  }

  setVars(el) {
    if (!el) return false;

    this.slider = el;
    this.nav = this.slider.querySelector('[data-time-slider-nav]');
    this.navItems = (this.nav) ? this.nav.querySelectorAll('[data-time-slider-nav-item]') : null;
    this.settings = this.slider.getAttribute('data-time-slider-settings');
    this.wrapper = this.slider.querySelector('[data-time-slider-wrapper]');
    this.settingsJSON = (this.settings) ? JSON.parse(this.settings) : [];

    this.swiper = null;
    this.activeSlide = 0;

    return true;
  }

  init() {
    this.initSettings();
    this.initSwiper();
    this.bindEvents();
    this.toggleNav();
  }

  initSettings() {
    if (!this.settingsJSON) return;
    this.delay = (parseInt(this.settingsJSON.interval) * 1000) || 2000;
  }

  initSwiper() {
    this.swiper = new Swiper(this.wrapper, {
      autoplay: {
        delay: this.delay,
      },
      slidesPerView: 'auto',
      allowTouchMove: false,
    });
  }

  bindEvents() {
    this.bindSwiperEvents();
    this.bindNav();
    this.bindWrapper();
  }

  bindNav() {
    if (!this.nav || !this.navItems) return;
    this.nav.addEventListener('mouseenter', (event) => {
      this.onWrapperMouseenter();
    });
    this.nav.addEventListener('mouseleave', (event) => {
      this.onWrapperMouseleave();
    });

    this.bindNavItem();
  }

  bindNavItem() {
    if (!this.navItems) return;

    this.navItems.forEach((item) => {
      item.addEventListener('click', (event) => this.onNavItemClick(event));
    });
  }

  bindSwiperEvents() {
    if (!this.swiper) return;

    this.swiper.on('realIndexChange', (event) => {
      this.activeSlide = this.swiper.realIndex;
      this.toggleNav();
    });
  }

  bindWrapper() {
    this.wrapper.addEventListener('mouseenter', (event) => {
      this.onWrapperMouseenter();
    });
    this.wrapper.addEventListener('mouseleave', (event) => {
      this.onWrapperMouseleave();
    });
  }

  onNavItemClick(event) {
    const { currentTarget } = event;
    const index = currentTarget.getAttribute('data-time-slider-nav-item');

    if (!index || !this.swiper) return;

    this.swiper.slideTo(index);
  }

  onWrapperMouseenter() {
    this.swiper.autoplay.stop();
    if (this.activeNavItem) this.activeNavItem.classList.add('pause');
  }

  onWrapperMouseleave() {
    this.swiper.autoplay.start();
    if (this.activeNavItem) this.activeNavItem.classList.remove('pause');
  }

  toggleNav() {
    if (!this.navItems) return;
    const navItem = document.querySelector(`[data-time-slider-nav-item="${this.activeSlide}"]`);
    this.activeNavItem = navItem;

    this.navItems.forEach((item) => {
      item.classList.remove('active');
      item.classList.remove('pause');
    });

    if (!navItem) return;
    navItem.classList.add('active');
  }
}
