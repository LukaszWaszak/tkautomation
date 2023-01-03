<template>
  <div class="statusBadge" :class="`statusBadge--${code}`">
    <div class="statusBadge__wrapper">
      <div class="statusBadge__dot"></div>
      <div class="statusBadge__label">
        {{ label }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'StatusBadge',
  props: {
    code: {
      type: String,
      default: '',
    },
    label: {
      type: String,
      default: '',
    }
  }
}
</script>