<template>
  <div
    ref="coursesList"
    class="coursesList"
    data-cards-slider
  >
    <div class="coursesList__filters">
      <div class="coursesList__categories">
        <div
          v-if="filterAll && filterAll.active"
          class="coursesList__category"
        >
          <button
            class="button button--transparent"
            :class="[ areAllFiltersActive ? 'active' : '' ]"
            @click="toggleAll"
          >
            <span v-show="areAllFiltersActive" class="button__icon button__icon--before icon-check"></span>
            <span class="button__text">
              {{ filterAll.label }}
            </span>
          </button>
        </div>
        <div
          v-for="(tag, index) in tags"
          :key="`tag-${index}`"
          class="coursesList__category"
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
          class="coursesList__category"
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
      <div class="coursesList__levels">
        <form-select
          :label="locale.levelLabel"
          :chooseLabel="locale.level"
          :options="levelsOptions"
          @change="toggleLevel($event)"
        >
        </form-select>
      </div>
    </div>
    <div class="coursesList__list">
        <Transition name="fade">
          <div v-if="courses.length > 0" class="coursesList__wrapper">
            <div
              v-for="(course, index) in courses"
              :key="index"
              class="coursesList__item"
            >
              <course-card
                :image="course.thumbnail"
                :url="course.url"
                :title="course.post_title"
                :tag="course.tag"
                :course-type="course.courseType"
                :lessons="course.lessonsCount"
                :level="course.advancement"
                :locale="locale"
              >
              </course-card>
            </div>
          </div>
        </Transition>
        <Transition name="fade">
          <div v-if="courses.length == 0 && !loading" class="coursesList__notFound">
            <h4>{{ locale.notFound }}</h4>
          </div>
        </Transition>
      </div>
    <div class="coursesList__pagination">
      <Pagination
        :count="courses.length"
        :per-page="perPage"
        :pages-count="totalPages"
        :locale="locale"
        @change="changePage($event)"
      >

      </Pagination>
    </div>
  </div>
</template>

<script>
import { debounce } from 'lodash';
import Pagination from './filters/pagination.vue';
import CourseCard from './cards/CourseCard.vue';
import FormSelect from './inputs/FormSelect.vue';
import axios from 'axios';

export default {
  name: "CoursesList",
  components: {
    CourseCard,
    FormSelect,
    Pagination
  },
  props: {
    api: {
      type: String,
      default: ''
    },
    perPage: {
      type: Number,
      default: 5,
    },
    filterAll: {
      type: Object,
      default: () => {},
    },
    tags: {
      type: Array,
      default: () => [],
    },
    categories: {
      type: Array,
      default: () => [],
    },
    levels: {
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
    levelsOptions() {
      const levels = [];

      levels.push({
        id: null,
        name: this.locale.all
      })

      this.levels.forEach((item) => {
        levels.push(item)
      })

      return levels;
    },
  },
  data() {
    return {
      currentPage: 1,
      totalPages: 1,
      courses: [],
      activeCategory: [],
      activeTag: [],
      activeLevel: null,
      slider: null,
      loading: false,
    }
  },
  mounted() {
    this.initFilters();
    this.filterCourses();
    this.scrollToTop(false);
  },
  methods: {
    filterCourses() {
      this.loading = true;

      const params = {
        per_page: this.perPage,
        page: this.currentPage
      }

      if (this.activeCategory.length > 0) params.category = this.activeCategory;
      if (this.activeTag.length > 0) params.tag = this.activeTag;
      if (this.activeLevel !== null) {
        params.level = this.activeLevel
      }

      axios.get(`${this.api}courses`, {
        params
      }).then((data) => {
        this.courses = data.data.results;
        this.totalPages = data.data.total_pages;
      }).catch((err) => console.log(err))
      .then(() => {
        this.loading = false;
      });
    },
    initFilters() {
      if (this.filterAll && this.filterAll.checked) {
        this.toggleAll();
        console.log('toggle all');

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
      this.activeCategory = [id];
      this.filterCourses();
      this.scrollToTop();
    },
    toggleTag(id) {
      this.activeTag = [id];
      this.filterCourses();
      this.scrollToTop();
    },
    toggleLevel(id) {
      this.activeLevel = id;
      this.filterCourses();
      this.scrollToTop();
    },
    changePage(page) {
      this.currentPage = page;
      this.filterCourses();
      this.scrollToTop();
    },
    scrollToTop(scroll = true) {
      const courses = document.querySelector('.courses')
      if (!courses || !scroll) return;

      setTimeout(() => {
        courses.scrollIntoView({
          behavior: 'smooth',
        });
      }, 100)
    }
  }
}
</script>

<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
