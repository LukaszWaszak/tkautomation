<template>
  <button
    class="closeButton"
    :class="{
      'burgerButton--dark': dark,
    }"
    @click="$emit('click', $event)"
  >
    <span class="closeButton__cross" />
  </button>
</template>

<script>
export default {
  name: 'CloseButton',
  props: {
    active: {
      type: Boolean,
      default: false,
    },
    dark: {
      type: Boolean,
      default: false,
    },
  },
};
</script>