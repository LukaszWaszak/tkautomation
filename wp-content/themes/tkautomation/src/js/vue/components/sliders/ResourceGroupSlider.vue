<template>
  <div
    class="resourceGroupSlider"
    data-cards-slider
    ref="resourceGroupSlider"
  >
    <div class="resourceGroupSlider__top">
      <div class="resourceGroupSlider__header">
        <h4>{{ header }}</h4>
      </div>
      <div class="resourceGroupSlider__nav">
        <div class="resourceGroupSlider__navButton">
          <button class="navButton navButton--onlyIcon navButton--default" data-cards-slider-prev>
            <span class="navButton__icon icon-arrow-left"></span>
          </button>
        </div>
        <div class="resourceGroupSlider__navButton">
          <button class="navButton navButton--onlyIcon navButton--default" data-cards-slider-next>
            <span class="navButton__icon icon-arrow-right"></span>
          </button>
        </div>
      </div>
    </div>
    <div class="resourceGroupSlider__slider swiper-container" data-cards-slider-container>
      <div class="resourceGroupSlider__items swiper-wrapper">
        <div
          v-for="(slide, index) in slides"
          :key="index"
          class="resourceGroupSlider__item swiper-slide"
          data-cards-slider-slide
        >
          <resource-card
            :url="slide.url"
            :title="slide.title"
            :thumbnail="slide.thumbnail"
            :locale="locale.card"
          >
          </resource-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardsSlider from '../../../classes/sliders/CardsSlider';
import ResourceCard from '../cards/ResourceCard.vue';

export default {
  name: 'ResourceGroupSlider',
  components: {
    ResourceCard,
  },
  props: {
    header: {
      type: String,
      default: '',
    },
    slides: {
      type: Array,
      default: () => [],
    },
    locale: {
      type: Object,
      default: () => {}
    }
  },
  mounted() {
    this.setSlider();
  },
  methods: {
    async setSlider() {
      await this.destroySlider();
      this.slider = new CardsSlider(this.$refs.resourceGroupSlider);
    },
    destroySlider() {
      if (!this.slider || !this.slider.swiper) return;
      this.slider.swiper.destroy();
    }
  }
}
</script>