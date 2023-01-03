<template>
  <div
    :class="[
      'popup',
      {
        'popup--halfSize': latest && latest.halfSize,
        'popup--noBg': latest && latest.noBackground,
      },
    ]"
  >
    <transition name="popup__overlay">
      <div v-if="latest && latest.noBackground" class="popup__overlay" @click="closeAll" />
    </transition>
    <div class="container">
      <transition :name="latest && latest.halfSize ? 'popup-slide-half' : 'popup-slide'" :css="true">
        <div v-if="latest !== null" :key="latest.id" class="popup__outer">
          <div class="popup__close">
            <CloseButton @click="close" />
          </div>
          <div class="popup__inner">
            <component
              :is="latest.component"
              v-if="latest.component"
              :data="latest.props"
            />
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
import CloseButton from '../buttons/CloseButton.vue';

export default {
  name: 'Popup',
  components: {
    CloseButton,
  },
  data() {
    return {
      stack: [],
    };
  },
  computed: {
    latest() {
      const length = this.stack.length;
      return length > 0 ? this.stack[length - 1] : null;
    },
  },
  watch: {
    stack({ length }) {
      if (length) {
        document.body.style.overflow = 'hidden';
      } else {
        document.body.removeAttribute('style');
      }
    },
  },
  mounted() {
    this.bindEvents();
  },
  beforeDestroy() {
    this.unbindEvents();
  },
  methods: {
    bindEvents() {
      window.addEventListener('popupOpen', this.open);
      window.addEventListener('popupClose', this.close);
      window.addEventListener('popupCloseAll', this.closeAll);
    },
    unbindEvents() {
      window.removeEventListener('popupOpen', this.open);
      window.removeEventListener('popupClose', this.close);
      window.removeEventListener('popupCloseAll', this.closeAll);
    },
    open(e) {
      this.stack.push(e.detail);
    },
    close(e) {
      if (!e || !e.detail || !e.detail.id) {
        this.stack.pop();
        return;
      }

      let i = -1;
      const length = this.stack.length;
      for (i = length - 1; i > 0; i--) {
        if (this.stack[i].id === e.detail.id) break;
      }
      if (i < 0) return;

      this.stack.splice(i, 1);
    },
    closeAll() {
      this.stack = [];
    },
  },
};
</script>