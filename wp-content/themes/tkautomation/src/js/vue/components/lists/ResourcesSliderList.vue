<template>
  <div class="resourcesSliderList">
    <div
      v-for="(item, index) in items"
      :key="index"
      class="resourcesSliderList__item"
    >
      <resource-group-slider
        :header="item.resourceType"
        :slides="item.items"
        :locale="locale"
      >
      </resource-group-slider>
    </div>
  </div>
</template>

<script>
import ResourceGroupSlider from '../sliders/ResourceGroupSlider.vue';

export default {
  name: 'ResourcesSliderList',
  components: {
    ResourceGroupSlider
  },
  props: {
    items: {
      type: Array,
      default: () => [],
    },
    locale: {
      type: Object,
      default: () => {}
    }
  }
}
</script>