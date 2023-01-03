export default class HistoryTile {
  constructor() {
    if (!this.setVars()) return;
    this.init();
  }

  setVars() {
    this.tile = document.querySelectorAll(".historyTileCard");
    if (!this.tile) return;
    return true;
}


init() {
  if (!this.tile) return;
  document.addEventListener('scroll',()=>{
    this.tile.forEach(e => {
this.dot = e.querySelector(".historyTileCard__line__fill");
if (e.getBoundingClientRect().top <= (window.outerHeight / 2) && e.getBoundingClientRect().top >= ((window.outerHeight / 2) - e.clientHeight)) {
  this.dot.classList.add("active");
      }
      else{
        this.dot.classList.remove("active");
      }

    })
  })

}

}