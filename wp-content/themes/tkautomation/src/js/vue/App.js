import Vue from 'vue';
import { ready } from '../helpers/ready';

import CoursesList from './components/CoursesList.vue';
import CoursesSlider from './components/CoursesSlider.vue';
import SpeakersSection from './components/SpeakersSection.vue';
import BlogSection from './components/BlogSection.vue';
// import NewsletterForm from './components/forms/NewsletterForm.vue';
// import TextImageSlider from './components/sliders/TextImageSlider.vue';
// import StepForm from './components/forms/StepForm.vue';
import Popup from './components/popup/Popup.vue';
// import Resources from './components/Resources.vue';
// import BlogPostsFilter from './components/BlogPostsFilter.vue';
// import FaqFilter from './components/FaqFilter.vue';
// import GoogleMap from './components/GoogleMap.vue';
// import DefaultMap from './components/DefaultMap.vue';

Vue.component('v-courses-list', CoursesList);
Vue.component('v-courses-slider', CoursesSlider);
Vue.component('v-speakers-section', SpeakersSection);
Vue.component('v-blog-section', BlogSection);
// Vue.component('v-newsletter-form', NewsletterForm);
// Vue.component('v-text-image-slider', TextImageSlider);
// Vue.component('v-step-form', StepForm);
Vue.component('v-popup', Popup);
// Vue.component('v-resources', Resources);
// Vue.component('v-blog-posts-filter', BlogPostsFilter);
// Vue.component('v-faq-filter', FaqFilter);
// Vue.component('v-google-map', GoogleMap);
// Vue.component('v-default-map', DefaultMap);

ready(() => {
  const vComponents = document.querySelectorAll('[data-vue-component]');
  if (vComponents.length) {
    vComponents.forEach((elem) => {
      window.App = new Vue({
        el: elem,
      });
    });
  }
});