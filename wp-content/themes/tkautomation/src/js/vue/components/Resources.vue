<template>
  <div class="resources">
    <div class="resources__search">
      <form-input
        v-model="searchInput"
        :id="'resourcesSearch'"
        :placeholder-input="search.label"
        :maxlength="40"
      >
      </form-input>
    </div>
    <div
      ref="resourcesTop"
      class="resources__top"
    >
      <div class="resources__filters">
        <div class="resources__categories">
          <div class="resources__categoriesHead">
            <p>{{ locale.filter }}</p>
          </div>
          <div class="resources__categoriesList">
            <div
              v-if="topicOptions.options.length"
              class="resources__category"
            >
              <form-multiple-select
                :label="topicOptions.label"
                :options="topicOptions.options"
                @change="setTopic($event)"
              >
              </form-multiple-select>
            </div>
            <div
              v-if="typeOptions.options.length"
              class="resources__category"
            >
              <form-multiple-select
                :label="typeOptions.label"
                :options="typeOptions.options"
                :active-options="activeGroups"
                @change="setType($event)"
              >
              </form-multiple-select>
            </div>
            <div
              v-if="targetOptions.options.length"
              class="resources__category"
            >
              <form-multiple-select
                :label="targetOptions.label"
                :options="targetOptions.options"
                :active-options="activeTargets"
                @change="setTarget($event)"
              >
              </form-multiple-select>
            </div>
          </div>
        </div>
        <div class="resources__filtersSort">
          <form-select
            v-bind="locale.sort"
            @change="setSort($event)"
          >
          </form-select>
        </div>
        <div class="resources__selected">
          <div
            v-if="topic.length"
            class="resources__selectedItem"
          >
            <div class="resources__selectedLabel">
              <p class="p">{{ topicOptions.label }}:</p>
            </div>
            <div
              v-for="(option, index) in topic"
              :key="index"
              class="resources__selectedOption"
            >
              <div class="resources__selectedOptionInner">
                <p class="p">{{ option.name }}</p>
                <span class="icon icon-close"></span>
              </div>
            </div>
          </div>
          <div
            v-if="type.length"
            class="resources__selectedItem"
          >
            <div class="resources__selectedLabel">
              <p class="p">{{ typeOptions.label }}:</p>
            </div>
            <div
              v-for="(option, index) in type"
              :key="index"
              class="resources__selectedOption"
            >
              <div class="resources__selectedOptionInner">
                <p class="p">{{ option.name }}</p>
                <span class="icon icon-close"></span>
              </div>
            </div>
          </div>
          <div
            v-if="target.length"
            class="resources__selectedItem"
          >
            <div class="resources__selectedLabel">
              <p class="p">{{ targetOptions.label }}:</p>
            </div>
            <div
              v-for="(option, index) in target"
              :key="index"
              class="resources__selectedOption"
            >
              <div class="resources__selectedOptionInner">
                <p class="p">{{ option.name }}</p>
                <span class="icon icon-close"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="resources__results">
        <Transition>
          <div
            v-if="loading || initState"
            class="resources__loader"
          >
            <loader></loader>
          </div>
        </Transition>
        <Transition>
          <div v-if="!loading && isResultEmpty && !initState" class="resources__notFound">
            <not-found
              v-bind="notFound"
              @clearFilters="resetFilters"
            >
            </not-found>
          </div>
        </Transition>
        <Transition>
          <resources-slider-list
            v-if="isMultipleGroups && resources.length && !initState"
            :items="resources"
            :locale="locale"
          >
          </resources-slider-list>
        </Transition>
        <Transition>
          <resources-grid-list
            v-if="!isMultipleGroups && resources.length && !initState"
            :header="resources[0].resourceType"
            :items="resources[0].items"
            :per-page="perPage"
            :count="resources[0].total_records"
            :pages-count="resources[0].total_pages"
            :locale="locale"
            @pageChange="changePage($event)"
          >
          </resources-grid-list>
        </Transition>
      </div>
    </div>
  </div>
</template>

<script>
import { debounce } from 'lodash';
import Loader from './Loader.vue';
import NotFound from './filters/notFound.vue';
import ResourcesSliderList from './lists/ResourcesSliderList.vue';
import ResourcesGridList from './lists/ResourcesGridList.vue';
import FormInput from '../components/inputs/FormInput.vue';
import FormSelect from '../components/inputs/FormSelect.vue';
import FormMultipleSelect from './inputs/FormMultipleSelect.vue';
import axios from 'axios';

export default {
  name: 'Resources',
  components: {
    Loader,
    NotFound,
    ResourcesSliderList,
    ResourcesGridList,
    FormInput,
    FormSelect,
    FormMultipleSelect
  },
  props: {
    api: {
      type: String,
      default: ''
    },
    search: {
      type: Object,
      default: () => {}
    },
    topicOptions: {
      type: Object,
      default: () => {}
    },
    typeOptions: {
      type: Object,
      default: () => {}
    },
    targetOptions: {
      type: Object,
      default: () => {}
    },
    initTargetGroup: {
      type: Array,
      default: null,
    },
    notFound: {
      type: Object,
      default: () => {},
    },
    locale: {
      type: Object,
      default: () => {}
    }
  },
  watch: {
    searchInput() {
      this.filterResources();
    }
  },
  computed: {
    isMultipleGroups() {
      return this.resources.length > 1;
    },
    isResultEmpty() {
      return (!this.resources.length);
    },
    activeGroups() {
      return this.resources.map((item) => item.resourceType);
    },
    activeTargets() {
      return this.target.map((item) => item.name);
    }
  },
  data() {
    return {
      searchInput: '',
      sort: null,
      topic: [],
      target: [],
      type: [],
      resources: [],
      initState: true,
      loading: false,
      perPage: 12,
      page: 1,
    }
  },
  mounted() {
    this.checkTarget();
    this.filterResources();
  },
  methods: {
    filterResources: debounce(function(scroll = false) {
      this.loading = true;
      const params = {};

      if (this.topic !== null) {
        params.topic = this.topic.map((item) => {
          return item.value;
        });
      }
      if (this.target !== null) {
        params.target = this.target.map((item) => {
          return item.value;
        });
      }
      if (this.type !== null) {
        params.type = this.type.map((item) => {
          return item.value;
        });
      }
      if (this.sort !== null) {
        params.sort = this.sort;
      }
      if (this.searchInput !== '') {
        params.search = this.searchInput;
      }

      params.paged = (this.isMultipleGroups) ? 1 : this.page;
      params.per_page = this.perPage;

      axios.get(`${this.api}resources`, {
        params
      }).then((data) => {
        this.resources = data.data.results;
      }).catch((err) => console.log(err))
      .then(() => {
        this.loading = false;
        this.initState = false;
        this.checkType();
        if (scroll) {
          setTimeout(() => {
            this.scrollToResults();
          }, 1000);
        }
      });
    }, 1000),
    setTopic($event) {
      this.topic = $event;
      this.filterResources();
    },
    setTarget($event) {
      this.target = $event;
      this.filterResources();
    },
    setType($event) {
      const resourceType = $event;
      this.type = resourceType;

      this.filterResources();
    },
    setSort($event) {
      this.sort = $event;
      this.filterResources();
    },
    changePage($event) {
      this.page = $event;
      this.filterResources(true);
    },
    resetFilters() {
      this.searchInput = '';
      this.sort = null;
      this.topic = [];
      this.target = [];
      this.type = this.typeOptions.options;
    },
    checkTarget() {
      if (this.initTargetGroup === null) return;
      let targets = [];

      this.initTargetGroup.forEach((target) => {
        const filteredTarget = this.targetOptions.options.filter((item) => {
          return item.name === target;
        });

        targets.push(...filteredTarget);
      });

      targets = [...new Set(targets)];
      this.target = targets;
    },
    checkType() {
      const filteredTypes = this.resources.map((item) => item.resourceType);
      let types = [];

      filteredTypes.forEach((type) => {
        const items = this.typeOptions.options.filter((opt) => opt.name === type);
        types.push(...items);
      });

      types = [...new Set(types)];
      this.type = types;
    },
    scrollToResults() {
      const { resourcesTop } = this.$refs;
      if (!resourcesTop) return;

      resourcesTop.scrollIntoView({
        behavior: 'smooth'
      });
    }
  }
}
</script>