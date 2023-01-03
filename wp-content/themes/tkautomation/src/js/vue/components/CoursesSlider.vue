<template>
  <div
    ref="coursesSlider"
    class="coursesSlider"
    data-cards-slider
  >
    <div class="coursesSlider__categories">
      <div
        v-for="(tag, index) in tags"
        :key="`tag-${index}`"
        class="coursesSlider__category"
      >
        <button
          class="button button--transparent"
          :class="[ tag.term_id === activeTag[0] && !areAllFiltersActive ? 'active' : '' ]"
          @click="toggleTag(tag.term_id)"
        >
          <span v-show="tag.term_id === activeTag[0] && !areAllFiltersActive" class="button__icon button__icon--before icon-check"></span>
          <span class="button__text">
            {{ tag.name }}
          </span>
        </button>
      </div>
      <div
        v-for="(category, index) in categories"
        :key="`cat-${index}`"
        class="coursesSlider__category"
      >
        <button
          class="button button--transparent"
          :class="[ category.id === activeCategory[0] && !areAllFiltersActive ? 'active' : '' ]"
          @click="toggleCategory(category.id)"
        >
          <span v-show="category.id === activeCategory[0] && !areAllFiltersActive" class="button__icon button__icon--before icon-check"></span>
          <span class="button__text">
            {{ category.name }}
          </span>
        </button>
      </div>
    </div>
    <div class="coursesSlider__list swiper-container" data-cards-slider-container>
      <div class="coursesSlider__wrapper swiper-wrapper">
        <div
          v-for="(course, index) in courses"
          :key="index"
          class="coursesSlider__item swiper-slide"
          data-cards-slider-slide
        >
          <course-card
            :image="course.thumbnail"
            :url="course.url"
            :title="course.post_title"
            :lessons="course.lessonsCount"
            :locale="locale"
          >
          </course-card>
        </div>
      </div>
    </div>
    <div class="coursesSlider__bottom">
      <div class="coursesSlider__more">
        <a :href="button.link" class="button button--default">
          <span class="button__text">{{ button.text }}</span>
        </a>
      </div>
      <div class="coursesSlider__nav">
        <div class="coursesSlider__navButton">
          <button class="navButton navButton--onlyIcon navButton--default" data-cards-slider-prev>
            <span class="navButton__icon icon-arrow-left"></span>
          </button>
        </div>
        <div class="coursesSlider__navButton">
          <button class="navButton navButton--onlyIcon navButton--default" data-cards-slider-next>
            <span class="navButton__icon icon-arrow-right"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { debounce } from 'lodash';
import CardsSlider from '../../classes/sliders/CardsSlider';
import CourseCard from './cards/CourseCard.vue';
import axios from 'axios';

export default {
  name: "CoursesSlider",
  components: {
    CourseCard
  },
  props: {
    api: {
      type: String,
      default: ''
    },
    tags: {
      type: Array,
      default: () => [],
    },
    categories: {
      type: Array,
      default: () => [],
    },
    list: {
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
    }
  },
  computed: {
    areAllFiltersActive() {
      if (this.tags.length) return this.activeCategory.length === 0 && this.activeTag.length === 0;
      return this.activeCategory.length === 0;
    },
    categoriesID() {
      return this.categories.map((item) => {
        return item.id;
      });
    },
    tagsID() {
      return this.tags.map((item) => {
        return item.term_id;
      });
    },
  },
  data() {
    return {
      courses: [],
      activeCategory: [],
      activeTag: [],
      slider: null,
    }
  },
  mounted() {
    this.initFilters();
    this.filterCourses();
  },
  methods: {
    filterCourses() {
      const params = {};

      if (this.activeCategory.length > 0) params.category = this.activeCategory;
      if (this.activeTag.length > 0) params.tag = this.activeTag;

      axios.get(`${this.api}courses`, {
        params: params
      }).then((data) => {
        this.courses = data.data.results;
      }).catch((err) => console.log(err))
      .then(() => {
        this.setSlider();
      });
    },
    initFilters() {
      if (this.filterAll && this.filterAll.checked) {
        this.toggleAll();
        return;
      } else if (this.categories.length && !this.tags.length) {
        this.activeCategory = [this.categoriesID[0]];
        this.filterCourses();
        return;
      } else if (this.tags.length && !this.categories.length
        || this.tags.length && this.categories.length) {
        this.activeTag = [this.tagsID[0]]
      }
    },
    toggleAll() {
      this.activeCategory = [];
      this.activeTag = [];
      this.filterCourses();
    },
    toggleCategory(id) {
      this.unsetTags();
      this.activeCategory = [id];
      this.filterCourses();
    },
    toggleTag(id) {
      this.unsetCategories();
      this.activeTag = [id];
      this.filterCourses();
    },
    unsetCategories() {
      this.activeCategory = [];
    },
    unsetTags() {
      this.activeTag = [];
    },
    async setSlider() {
      await this.destroySlider();
      this.slider = new CardsSlider(this.$refs.coursesSlider);
    },
    destroySlider() {
      if (!this.slider || !this.slider.swiper) return;
      this.slider.swiper.destroy();
    }
  }
}
</script>
