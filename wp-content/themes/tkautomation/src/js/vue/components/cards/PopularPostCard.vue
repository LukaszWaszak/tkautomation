<template>
  <div class="popularPostCard">
    <div class="popularPostCard__wrapper">
      <div class="popularPostCard__image">
        <div class="popularPostCard__imageWrapper">
          <img :src="image.url" :alt="image.alt">
        </div>
      </div>
      <div class="popularPostCard__title">
        <a :href="url">
          <p class="p">{{ title }}</p>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    url: {
      type: String,
      default: '',
    },
    title: {
      type: String,
      default: '',
    },
    image: {
      type: Object,
      default: () => {}
    }
  }
}
</script>