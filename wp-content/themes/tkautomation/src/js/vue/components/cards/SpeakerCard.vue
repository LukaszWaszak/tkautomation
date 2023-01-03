<template>
  <div class="speakerCard">
    <div class="speakerCard__status">
      <status-badge
        :code="status.code"
        :label="status.label"
      >
      </status-badge>
    </div>
    <div class="speakerCard__thumbnail">
      <img :src="thumbnail" alt="">
      <div class="speakerCard__details">
        <div class="speakerCard__type">
          <p class="p">
            {{ type }}
          </p>
        </div>
        <div class="speakerCard__country">
          <img :src="country.url" :alt="country.alt">
        </div>
      </div>
    </div>
    <div class="speakerCard__content">
      <div class="speakerCard__name">
        <p class="p p--big">
          {{ name }}
        </p>
      </div>
      <div class="speakerCard__description">
        <p class="p">
          {{ description }}
        </p>
      </div>
      <div class="speakerCard__more">
        <a :href="url" class="button button--default" @click="onLinkClick($event)">
          <span class="button__text">
            {{ locale.more }}
          </span>
          <span class="button__icon button__icon--after icon-play-circle"></span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import StatusBadge from '../badges/StatusBadge.vue';
import { popupOpen } from '../../../helpers/popup';

export default {
  components: {
    StatusBadge,
  },
  props: {
    url: {
      type: String,
      default: ''
    },
    thumbnail: {
      type: String,
      default: ''
    },
    name: {
      type: String,
      default: ''
    },
    description: {
      type: String,
      default: ''
    },
    bio: {
      type: String,
      default: ''
    },
    competence: {
      type: String,
      default: '',
    },
    video: {
      type: String,
      default: '',
    },
    tags: {
      type: Array,
      default: () => []
    },
    country: {
      type: [String, Object],
      default: () => {},
    },
    type: {
      type: String,
      default: '',
    },
    locale: {
      type: Object,
      default: () => {},
    },
    withPopup: {
      type: Boolean,
      default: false
    },
    status: {
      type: Object,
      default: '',
    },
    tutloAppUrl: {
      type: String,
      default: '',
    }
  },
  methods: {
    onLinkClick($event) {
      $event.preventDefault();

      popupOpen({
        id: 'popupSpeaker',
        noBackground: true,
        component: () => import(/* webpackMode: "eager" */ '../popup/SpeakerPopup.vue'),
        props: {
          url: this.tutloAppUrl,
          tags: this.tags,
          name: this.name,
          thumbnail: this.thumbnail,
          type: this.type,
          bio: this.bio,
          competence: this.competence,
          country: this.country,
          description: this.description,
          video: this.video,
          locale: this.locale
        }
      });
    },
  }
}
</script>