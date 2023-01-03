<template>
  <div class="faqCard" :class="[ opened ? 'active' : '' ]">
    <div class="faqCard__wrapper">
      <div class="faqCard__top">
        <div class="faqCard__question">
          <p class="p p--big">{{ question }}</p>
        </div>
        <div class="faqCard__toggle">
          <button class="faqCard__toggleButton" @click="toggleCard">
            <span
              class="faqCard__toggleButtonIcon"
              :class="iconClass"
            >
            </span>
          </button>
        </div>
      </div>
      <div class="faqCard__answer">
        <p class="p">{{ answer }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    question: {
      type: String,
      default: '',
    },
    answer: {
      type: String,
      default: '',
    }
  },
  computed: {
    iconClass() {
      return (this.opened) ? 'icon-minus' : 'icon-plus';
    }
  },
  data() {
    return {
      opened: false,
    }
  },
  methods: {
    toggleCard() {
      this.opened = !this.opened;
    }
  }
}
</script>