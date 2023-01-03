<template>
  <div class="speakersList">
    <div
      v-for="(item, index) in list"
      :key="index"
      class="speakersList__item"
    >
      <speaker-card
        :url="item.url"
        :tags="item.tags"
        :thumbnail="item.thumbnail"
        :name="item.name"
        :description="item.description"
        :bio="item.bio"
        :competence="item.competence"
        :video="item.video"
        :country="item.country"
        :type="item.type"
        :status="item.status"
        :locale="locale"
        :with-popup="withPopup"
        :tutlo-app-url="tutloAppUrl"
      >
      </speaker-card>
    </div>
  </div>
</template>

<script>
import SpeakerCard from '../cards/SpeakerCard.vue'

export default {
  name: 'SpeakersList',
  components: {
    SpeakerCard
  },
  props: {
    list: {
      type: Array,
      default: () => [],
    },
    button: {
      type: Object,
      default: () => {},
    },
    withPopup: {
      type: Boolean,
      default: false
    },
    locale: {
      type: Object,
      default: () => {},
    },
    tutloAppUrl: {
      type: String,
      default: '',
    },
  },
}
</script>