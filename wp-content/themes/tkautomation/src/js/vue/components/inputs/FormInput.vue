<template>
  <div class="formInput">
    <label
      v-if="label"
      :for="id"
      class="formInput__label"
    >
      {{ label }}
    </label>
    <input
      :id="id"
      class="formInput__input"
      :class="{ 'formInput__input--error': error }"
      :type="type"
      :required="required"
      :maxlength="maxlength"
      :value="value"
      :placeholder="placeholderInput"
      @input="onInput"
      @focus="onFocus"
      @blur="onBlur"
    >
  </div>
</template>

<script>
export default {
  name: 'formInput',
  props: {
    id: {
      type: String,
      default: '',
    },
    label: {
      type: String,
      default: ''
    },
    value: {
      type: String,
      default: '',
    },
    type: {
      type: String,
      default: 'text',
    },
    required: {
      type: [Boolean, Object],
      default: null,
    },
    maxlength: {
      type: Number,
      default: 50,
    },
    placeholderInput: {
      type: String,
      default: '',
    },
    error: {
      type: Boolean,
      default: false,
    },
    icon: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      isFocused: false,
    };
  },
  methods: {
    onInput(e) {
      const { target } = e;
      const { value } = target;

      this.$emit('input', value);
    },
    onFocus() {
      this.isFocused = true;
    },
    onBlur() {
      this.isFocused = false;
    },
  },
}
</script>