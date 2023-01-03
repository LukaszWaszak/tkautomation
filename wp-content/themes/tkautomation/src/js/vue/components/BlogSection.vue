<template>
  <div class="blogSection" ref="blog">
    <div class="blogSection__top">
      <div class="blogSection__head">
        <div class="text">
          <div class="text__header">
            <h3>{{ header }}</h3>
          </div>
          <div class="text__text">
            <p></p>
          </div>
        </div>
      </div>
      <div v-if="withFilters" class="blogSection__categories">
        <div class="blogSection__category">
          <button
            class="button button--transparent"
            :class="[ activeCategory.length > 1 ? 'active' : '' ]"
            @click="toggleAll()"
          >
            <span v-show="activeCategory.length > 1" class="button__icon button__icon--before icon-check"></span>
            <span class="button__text">
              {{ locale.toggleAll }}
            </span>
          </button>
        </div>
        <div
          v-for="(category, index) in categories"
          :key="index"
          class="blogSection__category"
        >
          <button
            class="button button--transparent"
            :class="[ category.id === activeCategory[0] && activeCategory.length < 2 ? 'active' : '' ]"
            @click="toggleCategory(category.id)"
          >
            <span v-show="category.id === activeCategory[0] && activeCategory.length < 2" class="button__icon button__icon--before icon-check"></span>
            <span class="button__text">
              {{ category.name }}
            </span>
          </button>
        </div>
      </div>
    </div>
    <div
      class="blogSection__list swiper-container"
      :class="[ loading ? 'loading' : '' ]"
      data-cards-slider-container
    >
      <div class="blogSection__wrapper swiper-wrapper">
        <div
          v-for="(post, index) in posts"
          :key="index"
          class="blogSection__item swiper-slide"
          data-cards-slider-slide
        >
          <blog-card
            :image="post.thumbnail"
            :title="post.post_title"
            :url="post.url"
            :locale="locale"
            :excerpt="post.excerpt"
            :tags="post.categories"
          >
          </blog-card>
        </div>
      </div>
    </div>
    <div class="blogSection__bottom">
      <div class="blogSection__bottomButtons">
        <div class="blogSection__bottomButton blogSection__more">
          <a :href="button.link" class="button button--default">
            <span class="button__text">{{ button.text }}</span>
          </a>
        </div>
        <div v-if="download.text !== ''" class="blogSection__bottomButton blogSection__download">
          <a :href="download.link" class="button button--transparent">
            <span class="button__text">{{ download.text }}</span>
          </a>
        </div>
      </div>
      <div class="blogSection__nav">
        <div class="blogSection__navButton">
          <button class="navButton navButton--onlyIcon navButton--default" data-cards-slider-prev>
            <span class="navButton__icon icon-arrow-left"></span>
          </button>
        </div>
        <div class="blogSection__navButton">
          <button class="navButton navButton--onlyIcon navButton--default" data-cards-slider-next>
            <span class="navButton__icon icon-arrow-right"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardsSlider from '../../classes/sliders/CardsSlider';
import BlogCard from './cards/BlogCard.vue';
import axios from 'axios';

export default {
  name: "BlogSection",
  components: {
    BlogCard
  },
  props: {
    withFilters: {
      type: Boolean,
      default: true,
    },
    api: {
      type: String,
      default: ''
    },
    header: {
      type: String,
      default: ''
    },
    headerTag: {
      type: String,
      default: 'h3'
    },
    categories: {
      type: Array,
      default: () => [],
    },
    locale: {
      type: Object,
      default: () => {},
    },
    button: {
      type: Object,
      default: () => {},
    },
    download: {
      type: Object,
      default: () => {},
    }
  },
  computed: {
    categoriesID() {
      return this.categories.map((item) => {
        return item.id;
      });
    }
  },
  data() {
    return {
      posts: [],
      activeCategory: [],
      slider: null,
      loading: false,
    }
  },
  mounted() {
    this.activeCategory = this.categoriesID;
    this.filterBlog();
  },
  methods: {
    filterBlog() {
      this.loading = true;

      axios.get(`${this.api}blog`, {
        params: {
          category: this.activeCategory
        }
      }).then((data) => {
        this.posts = data.data.results;
      }).catch((err) => console.log(err))
      .then(() => {
        this.setSlider();
        this.loading = false;
      });
    },
    toggleCategory(id) {
      this.activeCategory = [id];
      this.filterBlog();
    },
    toggleAll() {
      this.activeCategory = this.categoriesID;
      this.filterBlog();
    },
     async setSlider() {
      await this.destroySlider();
      this.slider = new CardsSlider(this.$refs.blog);
    },
    destroySlider() {
      if (!this.slider || !this.slider.swiper) return;
      this.slider.swiper.destroy();
    }
  }
}
</script>