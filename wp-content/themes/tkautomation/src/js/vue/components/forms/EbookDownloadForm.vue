<template>
  <div class="ebookDownloadForm">
    <div class="ebookDownloadForm__wrapper">
      <div class="ebookDownloadForm__thumbnail">
        <div class="ebookDownloadForm__thumbnailWrapper">
          <img :src="ebook.image.url" :alt="ebook.image.alt">
        </div>
      </div>
      <div class="ebookDownloadForm__content">
        <div class="ebookDownloadForm__header">
          <h4>{{ title }}</h4>
        </div>
        <div class="ebookDownloadForm__subtitle">
          <h5>{{ ebook.title }}</h5>
        </div>
        <div class="ebookDownloadForm__form" id="ebookDownloadForm" ref="form">

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { validate } from '../../../helpers/inputs/validate';
import FormInput from '../inputs/FormInput.vue';
import axios from 'axios';

export default {
  name: 'EbookDownloadForm',
  components: {
    FormInput,
  },
  props: {
    ebook: {
      type: Object,
      default: () => {}
    },
    inputs: {
      type: Object,
      default: () => {}
    },
    title: {
      type: String,
      default: '',
    },
    portalID: {
      type: String,
      default: ''
    },
    formID: {
      type: String,
      default: ''
    }
  },
  computed: {
    formValid() {
      return (this.cons_1 && this.cons_2 && this.name.valid && this.email.valid);
    }
  },
  data() {
    return {
      cons_1: false,
      cons_2: false,
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
    }
  },
  mounted() {
    this.initForm();
  },
  methods: {
    initForm() {
      const script = document.createElement("script");
      script.src="https://js.hsforms.net/forms/v2.js";
      document.body.appendChild(script);
      script.addEventListener("load", () => {
        if (window.hbspt) {
          window.hbspt.forms.create({
            portalId: this.portalID,
            formId: this.formID,
            target: "#ebookDownloadForm"
          })
        }
      })
    },
    validateInput($event, params) {
      this.formInit = true;
      const { name } = params;
      this[name].valid = validate(null, params);
    },
  }
}
</script>

<style lang="scss">
.ebookDownloadForm {
  .hs-form-field {
    display: inline-block;
    width: 50%;

    &.hs-fieldtype-booleancheckbox {
      width: 100%;
    }
  }
}
</style>