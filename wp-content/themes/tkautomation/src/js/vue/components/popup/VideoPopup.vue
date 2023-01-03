<template>
  <div class="videoPopup">
    <div class="videoPopup__wrapper">
      <div class="videoPopup__video" ref="video" :data-video-settings="JSON.stringify(settings)">
        <video :src="data.src" data-video-player></video>
      </div>
    </div>
  </div>
</template>

<script>
import Video from '../../../classes/video/Video';

export default {
  name: 'VideoPopup',
  props: {
    data: {
      type: Object,
      default: () => {},
    },
  },
  data() {
    return {
      video: null,
      settings: {
        videoWidth: '100%',
        videoHeight: '100%',
        setDimensions: false,
        hideVideoControlsOnLoad: true,
        hideVideoControlsOnPause: true,
        features: ['progress', 'duration'],
      }
    }
  },
  mounted() {
    this.initVideo();
  },
  methods: {
    initVideo() {
      if (!this.$refs.video) return;
      this.video = new Video(this.$refs.video);
    }
  }
}
</script>