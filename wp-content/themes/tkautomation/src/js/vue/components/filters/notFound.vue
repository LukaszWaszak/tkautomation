<template>
  <div class="notFound">
    <div class="notFound__wrapper">
      <div class="notFound__image">
        <img :src="image.url" :alt="image.alt">
      </div>
      <div class="notFound__text">
        <h5>{{ header }}</h5>
        <p class="p">
          <span>{{ subtitle }}</span>
          <span
            class="notFound__clear"
            @click="clearFilters"
          >
              {{ clear }}
          </span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NotFound',
  props: {
    image: {
      type: Object,
      default: () => {}
    },
    header: {
      type: String,
      default: '',
    },
    subtitle: {
      type: String,
      default: '',
    },
    clear: {
      type: String,
      default: '',
    }
  },
  methods: {
    clearFilters() {
      this.$emit('clearFilters');
    }
  }
}
</script>