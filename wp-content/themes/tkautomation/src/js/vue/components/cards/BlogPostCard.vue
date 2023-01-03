<template>
  <div class="blogPostCard">
    <div class="blogPostCard__wrapper">
      <div class="blogPostCard__image">
        <div class="blogPostCard__imageWrapper">
          <img :src="image" alt="">
        </div>
      </div>
      <div class="blogPostCard__content">
        <div class="blogPostCard__top">
          <div v-if="categories && categories.length" class="blogPostCard__categories">
            <div
              v-for="(cat, index) in categories"
              :key="index"
              class="blogPostCard__category"
            >
              <div class="blogPostCard__categoryInner">
                <p class="p">{{ cat.name }}</p>
              </div>
            </div>
          </div>
          <div class="blogPostCard__date">
            <p class="p">{{ date }}</p>
          </div>
          <div class="blogPostCard__readTime">
            <p class="p">{{ locale.readTime }}: <span>{{ readTime }}</span></p>
          </div>
        </div>
        <div class="blogPostCard__title">
          <a :href="url"><h5>{{ title }}</h5></a>
        </div>
        <div class="blogPostCard__text">
          <p class="p p--big">{{ text }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BlogPostCard',
  props: {
    url: {
      type: String,
      default: '',
    },
    image: {
      type: String,
      default: '',
    },
    title: {
      type: String,
      default: '',
    },
    categories: {
      type: Array,
      default: () => [],
    },
    date: {
      type: String,
      default: '',
    },
    readTime: {
      type: String,
      default: '',
    },
    text: {
      type: String,
      default: '',
    },
    locale: {
      type: Object,
      default: () => {}
    }
  }
}
</script>