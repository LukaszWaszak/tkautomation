<template>
  <div class="steps">
    <div
      v-for="(step, index) in steps"
      :key="index"
      class="steps__step"
      :class="[
        step.name === currentStep.name && !formPassed ? 'active' : '' ,
        index < activeIndex || formPassed ? 'passed' : ''
      ]"
    >
      <div class="steps__top">
        <div class="steps__indicator" @click="chooseStep(index)"></div>
        <div class="steps__progress"></div>
      </div>
      <div class="steps__index">
        <span>{{ locale.step }} {{ index + 1 }}</span>
      </div>
      <div class="steps__name">
        <p class="p">{{ step.name }}</p>
      </div>
      <Transition name="fade">
        <div v-if="choices[index] && choices[index].selected !== null" class="steps__selection">
          <p class="p">{{ choices[index].selected.display_name }}</p>
        </div>
      </Transition>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    activeIndex: {
      type: Number,
      default: 0,
    },
    currentStep: {
      type: Object,
      default: () => {}
    },
    steps: {
      type: Array,
      default: () => []
    },
    choices: {
      type: Array,
      default: () => []
    },
    locale: {
      type: Object,
      default: () => {}
    },
    formPassed: {
      type: Boolean,
      default: false,
    }
  },
  methods: {
    chooseStep(index) {
      if (index > this.activeIndex) return;

      this.$emit('step', index);
    }
  }
}
</script>

<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>