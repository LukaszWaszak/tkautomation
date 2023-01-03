export default class Shape {
  constructor(section, shape) {
    if (!this.setVars(section, shape)) return;

    this.initMaxTranslates();
    this.loop();
  }

  setVars(section, shape) {
    if (!section || !shape) return false;

    this.section = section;
    this.shape = shape;
    this.shapeRect = this.shape.getBoundingClientRect();

    this.cursorX = 0;
    this.cursorY = 0;
    this.moveRelativeX = 0;
    this.moveRelativeY = 0;
    this.shapeX = this.shapeRect.x;
    this.shapeY = this.shapeRect.y;
    this.maxX = 40;
    this.maxY = 50;

    this.section.addEventListener('mousemove', event => this.onSectionMousemove(event));

    return true;
  }

  onSectionMousemove(event) {
    if (!this.shape || !this.section) return;

    const { clientX, clientY } = event;
    const elRect = this.section.getBoundingClientRect();

    this.cursorX = clientX;
    this.cursorY = clientY;

    this.moveRelativeX = ((clientX - elRect.left) / elRect.width);
    this.moveRelativeY = ((clientY - elRect.top) / elRect.height);

    this.shape.style.transform = `translate(${this.moveRelativeX * this.maxX}px, ${(this.moveRelativeY * this.maxY)}px)`;
  }

  initMaxTranslates() {
    const maxX = this.shape.getAttribute('data-max-x');
    const maxY = this.shape.getAttribute('data-max-y');

    this.maxX = (maxX !== null) ? maxX : this.maxX;
    this.maxY = (maxY !== null) ? maxY : this.maxY;
  }

  loop() {
    //this.shapeX += (this.shapeX - (this.moveRelativeX * this.maxX)) * 0.1;
    // this.shapeY += (this.shapeY - (this.moveRelativeX * this.maxX)) * 0.1;
    requestAnimationFrame(this.loop.bind(this));
  }
}
