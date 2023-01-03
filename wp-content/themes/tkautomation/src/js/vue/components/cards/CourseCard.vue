<template>
  <div class="courseCard">
    <div
      v-if="tag !== ''"
      :style="`background-color: ${tag.color}`"
      class="courseCard__tag"
    >
      <p>{{ tag.name }}</p>
    </div>
    <div class="courseCard__thumbnail">
      <div class="courseCard__thumbnailWrapper">
        <img :src="image" alt="">
      </div>
    </div>
    <div class="courseCard__content">
      <div class="courseCard__title">
        <p class="p p--big">{{ title }}</p>
      </div>
      <div v-if="level && level.name" class="courseCard__level">
        <span :style="`color: ${level.color}`">{{ level.name }}</span>
      </div>
      <div class="courseCard__feature">
        <span class="courseCard__featureIcon icon-monitor"></span>
        <p class="courseCard__featureCount p p--small">
          {{ locale.lessons }}: {{ lessonsCount }}
        </p>
      </div>
      <div v-if="courseType" class="courseCard__feature">
        <span class="courseCard__featureIcon icon-book-open"></span>
        <p class="courseCard__featureCount p p--small">
          {{ locale.type }}: {{ courseType }}
        </p>
      </div>
      <div class="courseCard__more">
        <a :href="url" class="button button--default">
          <span class="button__text">{{ locale.more }}</span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    image: {
      type: String,
      default: '',
    },
    title: {
      type: String,
      default: '',
    },
    level: {
      type: Object,
      default: () => {},
    },
    tag: {
      type: [String, Object],
      default: '',
    },
    lessons: {
      type: String,
      default: '',
    },
    courseType: {
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
  },
  computed: {
    lessonsCount() {
      return (!this.lessons) ? 0 : this.lessons;
    },
  }
}
</script>