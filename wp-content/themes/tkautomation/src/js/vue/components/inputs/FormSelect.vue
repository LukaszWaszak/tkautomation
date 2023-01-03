<template>
  <div class="formSelect">
    <div class="formSelect__label">
      <p class="p">{{ label }}</p>
    </div>
    <div class="formSelect__options">
      <div class="formSelect__selected" @click="toggleOptions">
        <div class="formSelect__selectedItem">
          <p>{{ selectedLabel }}</p>
        </div>
        <div class="formSelect__selectedIcon">
          <span :class="iconClass"></span>
        </div>
      </div>
      <div
        class="formSelect__list"
        :class="{ 'active': opened }"
      >
        <div
          v-for="(option, index) in options"
          :key="index"
          class="formSelect__listItem"
          @click="chooseOption(option)"
        >
          <p>{{ option.name }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormSelect',
  props: {
    label: {
      type: String,
      default: ''
    },
    chooseLabel: {
      type: String,
      default: ''
    },
    options: {
      type: Array,
      default: []
    }
  },
  computed: {
    selectedLabel() {
      return (this.opened) ? this.chooseLabel : this.selected.name;
    },
    iconClass() {
      return (this.opened) ? 'icon-chevron-up' : 'icon-chevron-down';
    }
  },
  data() {
    return {
      opened: false,
      selected: {
        id: null,
        name: ''
      },
    }
  },
  mounted() {
    this.selected = this.options[0];
  },
  methods: {
    toggleOptions() {
      this.opened = !this.opened;
    },
    chooseOption(option) {
      this.selected = option;
      this.opened = false;

      this.$emit('change', this.selected.id);
    }
  }
}
</script>

<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>