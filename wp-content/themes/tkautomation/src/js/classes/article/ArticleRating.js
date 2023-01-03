import axios from 'axios';

export default class ArticleRating {
  constructor() {
    if (!this.setVars()) return;

    this.init();
  }

  setVars() {
    this.el = document.querySelector('[data-article-rating]');
    if (!this.el) return false;

    this.stars = this.el.querySelectorAll('[data-article-rating-star]');
    this.data = this.el.getAttribute('data-article-rating');
    this.dataParsed = (this.data) ? JSON.parse(this.data) : [];

    this.ip = this.dataParsed.ip;
    this.postID = this.dataParsed.postID;
    this.apiUrl = this.dataParsed.apiUrl;

    return true;
  }

  init() {
    this.bindEvents();
  }

  bindEvents() {
    this.bindStars();
  }

  bindStars() {
    if (!this.stars) return;

    this.stars.forEach((item) => {
      item.addEventListener('click', (event) => this.onStarClick(event));
    });
  }

  onStarClick(event) {
    this.deactivateStars();
    const { currentTarget } = event;
    const rate = currentTarget.getAttribute('data-article-rating-star');

    if (!rate) return;
    this.rate = parseInt(rate);

    for (let i = 1; i <= parseInt(rate); i++) {
      const el = this.el.querySelector(`[data-article-rating-star="${i}"]`);
      if (el) el.classList.add('active');
    }

    this.rateArticle();
  }

  deactivateStars() {
    if (!this.stars) return;

    this.stars.forEach((item) => {
      item.classList.remove('active');
    });
  }

  rateArticle() {

    axios.post(`${this.apiUrl}blog/rate`, {
      ip: this.ip,
      postID: this.postID,
      rate: this.rate,
    }).then((data) => {
      console.log(data);
    });
  }
}
