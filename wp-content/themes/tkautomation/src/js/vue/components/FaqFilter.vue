<template>
  <div class="faqFilter">
    <div class="faqFilter__search">
      <form-input
        v-model="searchInput"
        :id="'resourcesSearch'"
        :placeholder-input="locale.search"
        :maxlength="40"
      >
      </form-input>
    </div>
    <div class="faqFilter__wrapper">
      <div class="faqFilter__filters">
        <div class="faqFilter__filtersLabel">
          <p class="p">{{ locale.filter.label }}</p>
        </div>
        <div class="faqFilter__filtersOptions">
          <div class="faqFilter__filter">
            <button
              class="button button--transparent"
              :class="[ activeCategory !== null && activeCategory.length ? 'active' : '' ]"
              @click="toggleAll"
            >
              <span v-show="activeCategory !== null && activeCategory.length" class="button__icon button__icon--before icon-check"></span>
              <span class="button__text">
                {{ locale.filter.all }}
              </span>
            </button>
          </div>
          <div
            v-for="(category, index) in categories"
            :key="index"
            class="faqFilter__filter"
          >
            <button
              class="button button--transparent"
              :class="[ category.term_id === activeCategory && activeCategory !== null ? 'active' : '' ]"
              @click="toggleCategory(category.term_id)"
            >
              <span v-show="category.term_id === activeCategory && activeCategory !== null" class="button__icon button__icon--before icon-check"></span>
              <span class="button__text">
                {{ category.name }}
              </span>
            </button>
          </div>
        </div>
        <div class="faqFilter__filtersHint" v-html="hint">
        </div>
      </div>
      <div class="faqFilter__results">
        <Transition name="fade">
          <faq-list
            v-if="questions.length > 0 && !loading && !initState"
            :items="questions"
          >
          </faq-list>
        </Transition>
        <Transition name="fade">
          <div
            v-if="loading"
            class="faqFilter__loader"
          >
            <loader></loader>
          </div>
        </Transition>
      </div>
    </div>
  </div>
</template>

<script>
import { debounce } from 'lodash';
import axios from 'axios';
import Loader from './Loader.vue';
import NotFound from './filters/notFound.vue';
import FormInput from './inputs/FormInput.vue';
import FaqList from './lists/FaqList.vue';

export default {
  name: 'FaqFilter',
  components: {
    Loader,
    NotFound,
    FormInput,
    FaqList,
  },
  props: {
    api: {
      type: String,
      default: ''
    },
    categories: {
      type: Array,
      default: () => [],
    },
    hint: {
      type: String,
      default: '',
    },
    locale: {
      type: Object,
      default: () => {},
    }
  },
  data() {
    return {
      searchInput: '',
      activeCategory: null,
      loading: false,
      initState: true,
      questions: []
    }
  },
  watch: {
    searchInput() {
      this.filterFaq();
    }
  },
  computed: {
    allCategories() {
      return this.categories.map((item) => item.term_id);
    }
  },
  mounted() {
    this.toggleAll();
  },
  methods: {
    toggleAll() {
      this.activeCategory = this.allCategories;
      this.filterFaq();
    },
    toggleCategory(cat) {
      this.activeCategory = cat;
      this.filterFaq();
    },
    checkActiveGroup() {

    },
    filterFaq: debounce(function() {
      this.loading = true;
      const params = {};

      if (this.searchInput !== '') params.search = this.searchInput;
      if (this.activeCategory.length !== null) params.category = this.activeCategory;

      axios.get(`${this.api}faq`, {
        params: params
      }).then((data) => {
        this.questions = data.data.results;
      }).catch((err) => console.log(err))
      .then(() => {
        this.loading = false;
        this.initState = false;
      });
    }, 1000),
  }
}
</script>

<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>