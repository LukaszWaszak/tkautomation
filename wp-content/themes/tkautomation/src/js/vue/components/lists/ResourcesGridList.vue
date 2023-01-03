<template>
  <div class="resourcesGridList">
    <div class="resourceGroupSlider__header">
      <h4>{{ header }}</h4>
    </div>
    <div class="resourcesGridList__list">
      <div
        v-for="(item, index) in items"
        :key="index"
        class="resourcesGridList__item"
      >
        <resource-card
          :url="item.url"
          :title="item.title"
          :thumbnail="item.thumbnail"
          :locale="locale.card"
        >
        </resource-card>
      </div>
    </div>
    <div class="resourcesGridList__pagination">
      <pagination
        :per-page="perPage"
        :count="count"
        :pages-count="pagesCount"
        :locale="locale.pagination"
        @change="changePage($event)"
      >
      </pagination>
    </div>
  </div>
</template>

<script>
import Pagination from '../filters/pagination.vue';
import ResourceCard from '../cards/ResourceCard.vue';

export default {
  name: 'ResourcesGridList',
  components: {
    ResourceCard,
    Pagination,
  },
  props: {
    header: {
      type: String,
      default: '',
    },
    items: {
      type: Array,
      default: () => [],
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
    },
    locale: {
      type: Object,
      default: () => {},
    }
  },
  methods: {
    changePage($event) {
      this.$emit('pageChange', $event);
    }
  }
}
</script>