export default class DotCard {
  constructor() {
    if (!this.setVars()) return;
    this.init();
  }

  setVars() {
    this.tile = document.querySelectorAll(".imageDotCard ");
    if (!this.tile) return;
    return true;
  }


  init() {
    if (!this.tile) return;
    document.addEventListener('scroll', () => {
      this.tile.forEach(e => {
        if (!this.dot) return;
        this.dot = e.querySelector(".imageDotCard__dot");
        if (e.getBoundingClientRect().top <= (window.outerHeight / 2) && e.getBoundingClientRect().top >= ((window.outerHeight / 2) - e.clientHeight)) {
          this.dot.classList.add("active");
        }
        else {
          this.dot.classList.remove("active");
        }

      })
    })

  }

}