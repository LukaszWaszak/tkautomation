<template>
  <div
    ref="newsletterForm"
    class="newsletterForm"
  >
    <div class="newsletterForm__wrapper">
      <div v-if="!formSend" class="newsletterForm__before">
        <div class="newsletterForm__head">
          <div class="text">
            <div class="text__header">
              <h3>{{ beforeHeader }}</h3>
            </div>
            <div class="text__text">
              <p>{{ beforeText }}</p>
            </div>
          </div>
        </div>
        <form class="newsletterForm__form form" @submit.prevent="submitForm">
          <div class="newsletterForm__input">
            <form-input
              id="name"
              v-model="name.value"
              :error="!name.valid"
              :placeholderInput="locale.name"
              :maxlength="40"
              @input="validateInput($event, name)"
            />
          </div>
          <div class="newsletterForm__input">
            <form-input
              id="email"
              v-model="email.value"
              :error="!email.valid"
              :placeholderInput="locale.email"
              @input="validateInput($event, email)"
            />
          </div>
          <div class="newsletterForm__input newsletterForm__input--submit">
            <button class="button button--default button--size-medium">
              <span class="button__text">
                {{ submit }}
              </span>
            </button>
          </div>
        </form>
      </div>
      <div v-else class="newsletterForm__after">
        <div class="newsletterForm__head">
          <div class="text">
            <div class="text__header">
              <h4>{{ afterHeader }}</h4>
            </div>
          </div>
          <div class="text">
            <div class="text__header">
              <h3>{{ email.value }}</h3>
            </div>
          </div>
          <div class="text">
            <div class="text__text">
              <p>{{ afterText }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { validate } from '../../../helpers/inputs/validate';
import FormInput from '../inputs/FormInput.vue';

export default {
  name: 'NewsletterForm',
  components: {
    FormInput
  },
  props: {
    apiKey: {
      type: String,
      default: ''
    },
    beforeHeader: {
      type: String,
      default: ''
    },
    beforeText: {
      type: String,
      default: ''
    },
    afterHeader: {
      type: String,
      default: ''
    },
    afterText: {
      type: String,
      default: ''
    },
    submit: {
      type: String,
      default: ''
    },
    locale: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      name: {
        name: 'name',
        value: '',
        type: 'text',
        required: true,
        valid: false
      },
      email: {
        name: 'email',
        value: '',
        type: 'email',
        required: true,
        regex: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
        valid: false
      },
      formInit: false,
      formSend: false,
    }
  },
  computed: {
    formValid() {
      return this.name.valid && this.email.valid;
    }
  },
  methods: {
    validateInput($event, params) {
      this.formInit = true;
      const { name } = params;
      this[name].valid = validate(null, params);
    },
    submitForm() {
      if (!this.formValid) return;

      this.formSend = true;
    }
  }
}
</script>