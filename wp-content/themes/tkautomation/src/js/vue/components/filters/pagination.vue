<template>
  <div
    class="pagination"
    :class="[ theme !== '' ? `pagination--${theme}` : '' ]"
  >
    <div class="pagination__wrapper">
      <div class="pagination__prev">
        <button
          class="navButton navButton--onlyIcon navButton--default"
          :class="[ theme !== '' ? `navButton--${theme}` : '' ]"
          @click="goToPrev"
        >
          <span class="navButton__icon icon-chevron-left"></span>
        </button>
      </div>
      <div class="pagination__label">
        <p class="p">
          {{ locale.page }}
        </p>
      </div>
      <div class="pagination__current">
        <div class="formInput formInput--pagination">
          <input class="formInput__input" type="number" v-model="currentPage" :min="1" :max="pagesCount">
        </div>
      </div>
      <div class="pagination__of">
        <p class="p">
          {{ locale.pageOf }} {{ pagesCount }}
        </p>
      </div>
      <div class="pagination__next">
        <button
          class="navButton navButton--onlyIcon navButton--default"
          :class="[ theme !== '' ? `navButton--${theme}` : '' ]"
          @click="goToNext"
        >
          <span class="navButton__icon icon-chevron-right"></span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Pagination',
  props: {
    theme: {
      type: String,
      default: '',
    },
    locale: {
      type: Object,
      default: () => {}
    },
    perPage: {
      type: Number,
      default: 5,
    },
    count: {
      type: Number,
      default: 0,
    },
    pagesCount: {
      type: Number,
      default: 1,
    }
  },
  watch: {
    currentPage(value) {
      this.$emit('change', value);
    }
  },
  data() {
    return {
      currentPage: 1
    }
  },
  methods: {
    goToPrev() {
      const prev = this.currentPage - 1;
      if (prev <= 0) return;

      this.currentPage = prev;
    },
    goToNext() {
      const next = this.currentPage + 1;
      if (next > this.pagesCount) return;

      this.currentPage = next;
    }
  }
}
</script>