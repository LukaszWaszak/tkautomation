<template>
  <div class="speakerPopup">
    <div class="speakerPopup__wrapper">
      <div class="speakerPopup__top">
        <div class="speakerPopup__header">
          <h4>{{ data.name }}</h4>
        </div>
        <div class="speakerPopup__details">
          <div class="speakerPopup__type">
            <div class="speakerPopup__typeName">
              <p class="p">{{ data.type }}</p>
            </div>
            <div class="speakerPopup__typeCountry">
              <img :src="data.country.url" :alt="data.country.title">
            </div>
          </div>
          <div class="speakerPopup__tags">
            <div
              v-for="(tag, index) in data.tags"
              :key="index"
              class="speakerPopup__tag"
            >
              <div class="speakerPopup__tagInner">
                <p class="p">{{ tag.name }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="speakerPopup__bottom">
        <div class="speakerPopup__data">
          <div class="speakerPopup__asset">
            <div class="speakerPopup__assetHeader">
              <h5>{{ data.locale.popupAbout }}</h5>
            </div>
            <div class="speakerPopup__assetContent">
              <p class="p">{{ data.bio }}</p>
            </div>
          </div>
          <div class="speakerPopup__asset">
            <div class="speakerPopup__assetHeader">
              <h5>{{ data.locale.popupCompetence }}</h5>
            </div>
            <div class="speakerPopup__assetContent">
              <p class="p">{{ data.competence }}</p>
            </div>
          </div>
        </div>
        <div class="speakerPopup__outro">
          <div class="speakerPopup__video">
            <div class="speakerPopup__videoInner">
              <VideoElement
                :src="data.video"
                :type="'video/youtube'"
              >
              </VideoElement>
            </div>
          </div>
          <div class="speakerPopup__more">
            <a :href="data.url" target="_blank" class="button button--default">
              <span class="button__text">{{ data.locale.popupMore }}</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VideoElement from '../video/VideoElement.vue';

export default {
  name: 'SpeakerPopup',
  components: {
    VideoElement,
  },
  props: {
    data: {
      type: Object,
      default: () => {}
    }
  }
}
</script>