<template>
  <div class="faqGroup">
    <div class="faqGroup__name">
      <h4>{{ name }}</h4>
    </div>
    <div class="faqGroup__list">
      <div
        v-for="(item, index) in items"
        :key="index"
        class="faqGroup__item"
      >
        <faq-card
          :question="item.title"
          :answer="item.answer"
        >
        </faq-card>
      </div>
    </div>
  </div>
</template>

<script>
import FaqCard from '../cards/FaqCard.vue';

export default {
  components: { FaqCard },
  name: 'FaqGroup',
  props: {
    name: {
      type: String,
      default: ''
    },
    items: {
      type: Array,
      default: () => [],
    }
  }
}
</script>