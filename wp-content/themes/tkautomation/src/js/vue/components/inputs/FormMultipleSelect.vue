<template>
  <div class="formMultipleSelect">
    <div
      class="formMultipleSelect__options"
      :class="{ 'active': opened }"
     >
      <div class="formMultipleSelect__selected" @click="toggleOptions">
        <div class="formMultipleSelect__selectedItem">
          <p>{{ label }}</p>
        </div>
        <div class="formMultipleSelect__selectedIcon">
          <span :class="iconClass"></span>
        </div>
      </div>
      <div
        class="formMultipleSelect__list"
        :class="{ 'active': opened }"
      >
        <div
          v-for="(option, index) in options"
          :key="index"
          class="formMultipleSelect__listItem"
        >
          <input
            :id="`${label}_${index}`"
            class="formMultipleSelect__input"
            type="checkbox"
            :checked="checkIfSelected(option) !== -1"
            @change="chooseOption(option)"
          >
          <label :for="`${label}_${index}`">
            <p>{{ option.name }}</p>
          </label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormMultipleSelect',
  props: {
    activeOptions: {
      type: Array,
      default: () => [],
    },
    initWithAll: {
      type: Boolean,
      default: false,
    },
    label: {
      type: String,
      default: ''
    },
    options: {
      type: Array,
      default: () => []
    },
  },
  watch: {
    activeOptions(value) {
      let union = [];
      value.forEach((item) => {
        const items = this.options.filter((opt) => opt.name === item);
        union.push(...items);
        console.log(item, items);
      });

      union = [...new Set(union)];
      this.selected = union;
    }
  },
  computed: {
    iconClass() {
      return (this.opened) ? 'icon-chevron-up' : 'icon-chevron-down';
    }
  },
  data() {
    return {
      opened: false,
      selected: []
    }
  },
  mounted() {
    this.initWithAllOptions();
  },
  methods: {
    initWithAllOptions() {
      if (!this.initWithAll) return;

      this.options.forEach((option) => {
        this.chooseOption(option);
      })
    },
    toggleOptions() {
      this.opened = !this.opened;
    },
    chooseOption(option) {
      const selectedIndex = this.checkIfSelected(option);

      if (selectedIndex === -1) {
        this.selected.push(option);
      } else {
        this.selected.splice(selectedIndex, 1);
      }

      this.$emit('change', this.selected);
    },
    checkIfSelected(option) {
      return this.selected.findIndex((item) => {
        return item.value === option.value;
      })
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