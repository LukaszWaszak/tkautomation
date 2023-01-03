import Swiper from 'swiper';

export default class VideoSlider {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.slider = document.querySelector(".videoSliderCard");
    if (!this.slider) return false;


    this.videoCards = this.slider.querySelectorAll('[data-video-videoslider]');

    console.log(this.videoCards);
    this.swiper = null;
    return true;
  }


  init() {
    if(window.innerWidth > 800){
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView:3,
        freeMode: true,
        watchSlidesProgress: true,
  
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    }else{
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView:1,
        freeMode: true,
        watchSlidesProgress: true,
  
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    }

    
  
  }






    


}
