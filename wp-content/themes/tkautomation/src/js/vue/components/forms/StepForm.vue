<template>
  <div class="stepForm">
    <div class="stepForm__header">
      <div class="text">
        <div class="text__header">
          <h4>{{ header }}</h4>
        </div>
        <div class="text__text">
          <p class="p p--big">{{ subHeader }}</p>
        </div>
      </div>
    </div>
    <div class="stepForm__steps">
      <steps
        :active-index="activeStep"
        :current-step="currentStep"
        :steps="steps"
        :choices="choices"
        :form-passed="formPassed"
        :locale="locale"
        @step="changeStep($event)"
      >
      </steps>
    </div>
    <Transition name="fade">
      <div v-if="!formPassed" class="stepForm__questions">
        <div class="stepForm__questionsText">
          <h5>{{ currentStep.question }}</h5>
        </div>
        <div class="stepForm__options">
          <div
            v-for="(option, index) in currentStep.options"
            :key="index"
            class="stepForm__option"
          >
            <div class="stepForm__optionInner" @click="chooseOption(option)">
              <p class="p p--big">{{ option.name }}</p>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="stepForm__outro">
        <div class="stepForm__outroText" v-html="outro.secondary_header"></div>
      </div>
    </Transition>
  </div>
</template>

<script>
import Steps from './Steps.vue';

export default {
  components: {
    Steps,
  },
  props: {
    intro: {
      type: Object,
      default: () => {}
    },
    outro: {
      type: Object,
      default: () => {}
    },
    steps: {
      type: Array,
      default: () => []
    },
    locale: {
      type: Object,
      default: () => {}
    },
  },
  computed: {
    header() {
      return (!this.formPassed)
        ? this.intro.header : this.outro.main_header;
    },
    subHeader() {
      return !this.formPassed ? this.intro.text : '';
    },
    currentStep() {
      return this.steps[this.activeStep];
    }
  },
  data() {
    return {
      activeStep: 0,
      formPassed: false,
      choices: [],
      contactForm: null,
    }
  },
  mounted() {
    this.choices = this.steps.map((item) => {
      return {
        name: item.name,
        selected: null
      }
    });

    this.contactForm = document.querySelector('[data-step-form-contact]');
  },
  methods: {
    chooseOption(option) {
      const stepIndex = this.activeStep;
      this.choices[stepIndex].selected = option;

      if (stepIndex < this.steps.length - 1) {
        this.activeStep = this.activeStep + 1;
        this.toggleContactForm(false);
      } else {
        this.formPassed = true;
        this.toggleContactForm();
      }
    },
    changeStep(index) {
      this.activeStep = index;
    },
    toggleContactForm(state = true) {
      if (!this.contactForm) return;

      if (state) {
        this.contactForm.classList.add('active');
      } else {
        this.contactForm.classList.remove('active');
      }
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