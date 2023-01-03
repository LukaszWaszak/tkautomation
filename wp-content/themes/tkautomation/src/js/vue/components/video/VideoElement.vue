<template>
  <div class="video" ref="video">
    <video :id="id" width="100%" height="100%" data-video-player>
      <source :src="src" :type="type" >
    </video>
  </div>
</template>

<script>
import Video from '../../../classes/video/Video';

export default {
  name: 'VideoElement',
  props: {
    id: {
      type: String,
      default: ''
    },
    width: {
      type: Number,
      default: null,
    },
    height: {
      type: Number,
      default: null,
    },
    src: {
      type: String,
      default: ''
    },
    type: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      video: null
    }
  },
  mounted() {
    this.$nextTick(() => {
      this.video = new Video(this.$refs.video);
    })
  }
}
</script>

<style lang="scss" scoped>
.video {
  width: 100%;
  height: 100%;
  overflow: hidden;
  cursor: pointer;
}
</style>