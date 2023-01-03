<template>
  <div class="textImageSlider">
    <div
      v-for="(item, index) in items"
      :key="index"
      class="textImageSlider__item"
      :class="[ index === activeSlide ? 'textImageSlider__item--active' : '' ]"
    >
      <div class="textImageSlider__itemLeft">
        <div class="textImageSlider__itemHeader">
          <div class="text">
            <div class="text__header">
              <h4>{{ header }}</h4>
            </div>
          </div>
        </div>
        <div class="textImageSlider__itemSubtitle">
          <div class="text">
            <div class="text__text">
              <h5>{{ item.subtitle }}</h5>
            </div>
          </div>
        </div>
        <div class="textImageSlider__itemContent textEditor" v-html="item.content"></div>
      </div>
      <div class="textImageSlider__image">
        <div class="textImageSlider__imageInner">
          <img :src="item.image.url" :alt="item.image.alt">
        </div>
      </div>
    </div>
    <div class="textImageSlider__nav">
      <div class="textImageSlider__navPins">
        <button
          v-for="(item, index) in items"
          :key="index"
          class="pinButton pinButton--default textImageSlider__navPin"
          :class="[ index === activeSlide ? 'pinButton--active' : '' ]"
          @click="goToSlide(index)"
        >
        </button>
      </div>
      <div class="textImageSlider__navLoop">
        <div class="textImageSlider__navHint">
          <p class="p">{{ hint }}</p>
        </div>
        <div class="textImageSlider__navNext">
          <button class="navButton navButton--onlyIcon navButton--default" @click="goToNext()">
            <span class="navButton__icon icon-arrow-right"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TextImageSlider',
  props: {
    header: {
      type: String,
      default: ''
    },
    items: {
      type: Array,
      default: () => []
    },
    locale: {
      type: Object,
      default: () => {}
    }
  },
  computed: {
    hint() {
      if (this.activeSlide === 0) {
        return this.locale.more;
      } else if (this.activeSlide > 0 && this.activeSlide < this.items.length - 1) {
        return this.locale.evenMore;
      } else {
        return this.locale.loop;
      }
    }
  },
  data() {
    return {
      activeSlide: 0
    }
  },
  methods: {
    goToSlide(index) {
      this.activeSlide = index;
    },
    goToNext() {
      const current = this.activeSlide;
      const next = current + 1;

      this.activeSlide = (next > this.items.length - 1) ? 0 : next;
    }
  }
}
</script>