import Swiper from 'swiper';

export default class CompanyBigPhotoSlider {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.slider = document.querySelector(".companyBigSlider");
    if (!this.slider) return false;


    this.bigPhotoContainer = this.slider.querySelector(".companyBigSlider__bigPhoto");
    this.bigPhoto = this.slider.querySelector('[data-bigPhoto-slider]');
    this.smallPhotos = this.slider.querySelectorAll('[data-smallPhotos-slider]');

    this.swiper = null;
    this.i = 2;
    return true;
  }


  init() {
    this.setBigPhotoDefault();  
    this.setBigPhotoCurrent();

    if(window.innerWidth < 1000){

      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView:4,
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
        slidesPerView: this.smallPhotos.length,
        freeMode: true,
        watchSlidesProgress: true,
  
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    }
    
  
  }


  setBigPhotoDefault(){
    let a = this.i;
    this.bigPhoto.src = this.smallPhotos[a].src;
    this.smallPhotos[a].classList.add("activeslide");
    console.log(this.smallPhotos.length);
  } 


  setBigPhotoCurrent(){
    this.smallPhotos.forEach(e =>{
      e.addEventListener("click",()=>{
        const smallphotos = this.smallPhotos;
        smallphotos.forEach(e =>{
          e.classList.remove("activeslide");
        })
          this.bigPhoto.src = e.src;
          e.classList.add("activeslide");
        
      })
    })






}
}