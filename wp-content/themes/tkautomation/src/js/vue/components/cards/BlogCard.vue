<template>
  <div class="blogCard">
    <div class="blogCard__thumbnail">
      <div class="blogCard__thumbnailWrapper">
        <img :src="image" alt="">
      </div>
    </div>
    <div class="blogCard__content">
      <div class="blogCard__top">
        <div class="blogCard__tags">
          <div
            v-for="(tag, index) in tags"
            :key="index"
            class="blogCard__tag"
          >
            <p class="blogCard__tagText p p--small">
              {{ tag.name }}
            </p>
          </div>
        </div>
        <div class="blogCard__link">
          <a :href="url" class="button button--onlyIcon button--purple">
            <span class="button__icon icon-arrow-up-right"></span>
          </a>
        </div>
      </div>
      <div class="blogCard__title">
        <p class="p p--big">{{ title }}</p>
      </div>
      <div class="blogCard__excerpt">
        <p class="p">{{ excerpt }}</p>
      </div>
      <div class="blogCard__more">
        <a :href="url" class="button button--default">
          <span class="button__text">{{ locale.more }}</span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BlogCard',
  props: {
     image: {
      type: String,
      default: '',
    },
    tags: {
      type: Array,
      default: () => [],
    },
    title: {
      type: String,
      default: '',
    },
    excerpt: {
      type: String,
      default: '',
    },
     url: {
      type: String,
      default: '',
    },
    locale: {
      type: Object,
      default: () => {},
    },
  }
}
</script>