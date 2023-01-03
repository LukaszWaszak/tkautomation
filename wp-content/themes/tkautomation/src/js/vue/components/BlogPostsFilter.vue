<template>
  <div class="blogPostsFilter">
    <div class="blogPostsFilter__search">
      <form-input
        v-model="searchInput"
        :id="'resourcesSearch'"
        :placeholder-input="searchLabel"
        :maxlength="40"
      >
      </form-input>
    </div>
    <div class="blogPostsFilter__filters">
      <div class="blogPostsFilter__filtersLabel">
        <p class="p">{{ locale.filter }}</p>
      </div>
      <div class="blogPostsFilter__filtersWrapper">
        <div class="blogPostsFilter__filter">
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
          :key="`cat_${index}`"
          class="blogPostsFilter__filter"
        >
          <button
            class="button button--transparent"
            :class="[ category.term_id === activeCategory[0] && activeCategory.length < 2 ? 'active' : '' ]"
            @click="toggleCategory(category.term_id)"
          >
            <span v-show="category.term_id === activeCategory[0] && activeCategory.length < 2" class="button__icon button__icon--before icon-check"></span>
            <span class="button__text">
              {{ category.name }}
            </span>
          </button>
        </div>
        <div
          v-for="(aud, index) in audience"
          :key="`aud_${index}`"
          class="blogPostsFilter__filter"
        >
          <button
            class="button button--transparent"
            :class="[ aud.term_id === activeCategory[0] && activeCategory.length < 2 ? 'active' : '' ]"
            @click="toggleCategory(aud.term_id)"
          >
            <span v-show="aud.term_id === activeCategory[0] && activeCategory.length < 2" class="button__icon button__icon--before icon-check"></span>
            <span class="button__text">
              {{ aud.name }}
            </span>
          </button>
        </div>
      </div>
    </div>
    <transition>
      <div v-if="loading" class="blogPostsFilter__loader">
        <loader></loader>
      </div>
    </transition>
    <div class="blogPostsFilter__top">
      <transition>
        <div v-if="!loading && !initState && posts.length === 0" class="blogPostsFilter__notFound">
          <not-found
            v-bind="notFound"
            @clearFilters="resetFilters"
          >
          </not-found>
        </div>
      </transition>
      <div
        v-if="topPosts.length > 0 && !loading && !initState"
        class="blogPostsFilter__featured"
      >
        <div class="blogPostsFilter__featuredWrapper">
          <div
            v-for="(item, index) in topPosts"
            :key="index"
            class="blogPostsFilter__post"
          >
            <blog-post-card
              :url="item.url"
              :image="item.thumbnail"
              :title="item.post_title"
              :categories="item.categories"
              :date="item.date"
              :read-time="item.readTime"
              :text="item.post_content"
              :locale="locale"
            >
            </blog-post-card>
          </div>
        </div>
      </div>
      <div v-if="!loading && !initState" class="blogPostsFilter__popular">
        <div class="blogPostsFilter__popularLabel">
          <h5>{{ locale.popular }}</h5>
        </div>
        <div class="blogPostsFilter__popularList">
          <div
            v-for="(popularItem, index) in popular"
            :key="index"
            class="blogPostsFilter__popularItem"
          >
            <popular-post-card
              :title="popularItem.title"
              :url="popularItem.url"
              :image="popularItem.image"
            >
            </popular-post-card>
          </div>
        </div>
      </div>
    </div>
    <div class="blogPostsFilter__form">
      <ebook-download-form
        v-bind="ebookForm"
      >
      </ebook-download-form>
    </div>
    <div
      v-if="bottomPosts.length > 0 && !loading && !initState"
      class="blogPostsFilter__bottom"
    >
      <div
        v-for="(item, index) in bottomPosts"
        :key="index"
        class="blogPostsFilter__post"
      >
        <blog-post-card
          :url="item.url"
          :image="item.thumbnail"
          :title="item.post_title"
          :categories="item.categories"
          :date="item.date"
          :read-time="item.readTime"
          :text="item.post_content"
          :locale="locale"
        >
        </blog-post-card>
      </div>
    </div>
    <div class="blogPostsFilter__pagination">
      <pagination
        :per-page="perPage"
        :count="postsCount"
        :pages-count="maxPages"
        :theme="'purple'"
        :locale="locale.pagination"
        @change="changePage($event)"
      >
      </pagination>
    </div>
  </div>
</template>

<script>
import { debounce } from 'lodash';
import axios from 'axios';
import Loader from './Loader.vue';
import NotFound from './filters/notFound.vue';
import FormInput from '../components/inputs/FormInput.vue';
import BlogPostCard from '../components/cards/BlogPostCard.vue';
import PopularPostCard from '../components/cards/PopularPostCard.vue';
import Pagination from '../components/filters/pagination.vue';
import EbookDownloadForm from '../components/forms/EbookDownloadForm.vue';

export default {
  components: {
    Loader,
    NotFound,
    Pagination,
    FormInput,
    BlogPostCard,
    PopularPostCard,
    EbookDownloadForm
  },
  props: {
    api: {
      type: String,
      default: ''
    },
    searchLabel: {
      type: String,
      default: ''
    },
    categories: {
      type: Array,
      default: () => []
    },
    audience: {
      type: Array,
      default: () => []
    },
    popular: {
      type: Array,
      default: () => [],
    },
    notFound: {
      type: Object,
      default: () => {}
    },
    ebookForm: {
      type: Object,
      default: () => {},
    },
    targetGroup: {
      type: Number,
      default: null,
    },
    locale: {
      type: Object,
      default: () => {}
    }
  },
  watch: {
    searchInput() {
      this.filterBlog();
    }
  },
  computed: {
    topPosts() {
      if (this.posts.length === 0) return [];
      const posts = [];
      this.posts.forEach((item, index) => {
        if (index <= 1) posts.push(item);
      });

      return posts;
    },
    bottomPosts() {
      if (this.posts.length === 0) return [];
      const posts = [];
      this.posts.forEach((item, index) => {
        if (index > 1) posts.push(item);
      });

      return posts;
    },
    categoriesID() {
      return this.categories.map((item) => {
        return item.term_id;
      });
    },
    audienceID() {
      return this.audience.map((item) => {
        return item.term_id;
      });
    },
  },
  data() {
    return {
      searchInput: '',
      activeCategory: [],
      initState: true,
      loading: false,
      posts: [],
      perPage: 8,
      page: 1,
      postsCount: 0,
      maxPages: 1
    }
  },
  mounted() {
    this.initFilter();
    this.filterBlog();
  },
  methods: {
    filterBlog: debounce(function() {
      this.loading = true;
      const params = {};

      if (this.searchInput !== '') params.search = this.searchInput;
      if (this.activeCategory.length > 0) params.category = this.activeCategory;

      params.paged = this.page;
      params.per_page = this.perPage;

      axios.get(`${this.api}blog`, {
        params: params
      }).then((data) => {
        console.log(data);

        this.posts = data.data.results;
        this.postsCount = data.data.total_records;
        this.maxPages = data.data.total_pages;
      }).catch((err) => console.log(err))
      .then(() => {
        this.loading = false;
        this.initState = false;
      });
    }, 1000),
    toggleAll() {
      this.activeCategory = [...this.categoriesID, ...this.audienceID];
      this.filterBlog();
    },
    initFilter() {
      this.activeCategory = [...this.categoriesID, ...this.audienceID];
      if (this.targetGroup !== null) this.activeCategory = [this.targetGroup];
    },
    toggleCategory(id) {
      this.activeCategory = [id];
      this.filterBlog();
    },
    changePage(page) {
      this.page = page;
      this.filterBlog();
    },
    resetFilters() {
      this.toggleAll();
      this.filterBlog();
    }
  }
}
</script>