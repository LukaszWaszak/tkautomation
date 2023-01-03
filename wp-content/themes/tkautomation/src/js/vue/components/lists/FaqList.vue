<template>
  <div class="faqList">
    <div class="faqList__wrapper">
      <div class="faqList__list">
        <div
          v-for="(item, index) in items"
          :key="index"
          class="faqList__group"
        >
          <faq-group
            :name="item.faqType"
            :items="item.items"
          >
          </faq-group>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FaqGroup from './FaqGroup.vue';

export default {
  name: 'FaqList',
  components: {
    FaqGroup
  },
  props: {
    items: {
      type: Array,
      default: () => [],
    }
  }
}
</script>