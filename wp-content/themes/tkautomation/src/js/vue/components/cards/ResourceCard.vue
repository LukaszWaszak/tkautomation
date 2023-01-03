<template>
  <div class="resourceCard">
    <div class="resourceCard__thumbnail">
      <div class="resourceCard__thumbnailWrapper">
        <img :src="thumbnail" alt="">
      </div>
    </div>
    <div class="resourceCard__content">
      <div class="resourceCard__title">
        <p class="p p--big">{{ title }}</p>
      </div>
      <div class="resourceCard__button">
        <a :href="url" class="button button--default button--size-medium">
          <span class="button__text">{{ locale.button }}</span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ResourceCard',
  props: {
    url: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    },
    thumbnail: {
      type: String,
      default: ''
    },
    locale: {
      type: Object,
      default: () => {},
    }
  }
}
</script>