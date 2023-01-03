<template>
  <div class="speakersSection" :class="`speakersSection--${variant}`">
    <div class="speakersSection__head">
      <div class="speakersSection__top">
        <div v-if="tag && tag !== ''" class="speakersSection__tag">
          <div class="tag  tag--theme-default">
            <p class="tag__text p p--big">{{ tag }}</p>
          </div>
        </div>
        <div class="speakersSection__header">
          <div class="text">
            <div class="text__header">
              <h3>{{ header }}</h3>
            </div>
            <div class="text__text">
              <p></p>
            </div>
          </div>
        </div>
        <div v-if="text && text !== ''" class="speakersSection__text">
          <div class="text">
            <div class="text__text">
              <p class="p p--big">
                {{ text }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="speakersSection__categories">
        <div
          class="speakersSection__category"
        >
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
          class="speakersSection__category"
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
    <div class="speakersSection__list">
      <speakers-list
        :list="teachers"
        :button="button"
        :locale="locale"
        :with-popup="withPopup"
        :tutlo-app-url="tutloAppUrl"
      >
      </speakers-list>
      <div v-if="button.text !== '' && button.link !== ''" class="speakersSection__more">
        <a :href="button.link" class="button button--transparent">
          <span class="button__text">
            {{ button.text }}
          </span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import SpeakersList from './lists/SpeakersList.vue';
import axios from 'axios';

export default {
  name: "SpeakersSection",
  components: {
    SpeakersList
  },
  props: {
    api: {
      type: String,
      default: ''
    },
    variant: {
      type: String,
      default: ''
    },
    withPopup: {
      type: Boolean,
      default: false
    },
    tag: {
      type: String,
      default: ''
    },
    header: {
      type: String,
      default: ''
    },
    text: {
      type: String,
      default: ''
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
    },
    tutloAppUrl: {
      type: String,
      default: '',
    },
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
      teachers: [],
      activeCategory: [],
    }
  },
  mounted() {
    this.activeCategory = this.categoriesID;
    this.filterTeachers();
  },
  methods: {
    filterTeachers() {
      axios.get(`${this.api}teachers`, {
        params: {
          category: this.activeCategory
        }
      }).then((data) => {
        this.teachers = data.data;
      }).catch((err) => console.log(err));
    },
    toggleCategory(id) {
      this.activeCategory = [id];
      this.filterTeachers();
    },
    toggleAll() {
      this.activeCategory = this.categoriesID;
      this.filterTeachers();
    }
  }
}
</script>