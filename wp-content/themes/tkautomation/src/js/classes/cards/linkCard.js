export default class linkCard {
  constructor() {
    if (!this.setVars()) return;
    this.init();
  }

  setVars() {
    this.tile = document.querySelector(".cardsLinksSection");
    this.cardsWrapper = document.querySelector(".cardsLinksSection__cards");
    if (this.cardsWrapper)

      this.linkcardWrapper = this.cardsWrapper.querySelectorAll(".cardsLinksSection__card");

    if (!this.tile) return;
    return true;
  }


  init() {
    if (!this.tile) return;

    this.iconScale();


  }

  iconScale() {
    this.linkcardWrapper.forEach(e => {

      e.addEventListener("mouseover", () => {
        this.icon = e.querySelector("img");
        console.log(this.icon);
        this.icon.classList.add("active");

      })
      e.addEventListener("mouseout", () => {
        this.icon = e.querySelector("img");
        console.log(this.icon);
        this.icon.classList.remove("active");

      })

    });
  }

}