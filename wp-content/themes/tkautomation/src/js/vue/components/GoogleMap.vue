<template>
  <div class="googleMap" >
    <div class="googleMap__map" ref="map"></div>
    <div
      class="googleMap__list"
      :class="[ activeItem !== null ? 'active' : '' ]"
    >
      <div class="googleMap__locations">
        <div class="googleMap__locationsInner">
          <Transition name="fade">
            <div v-if="activeItem !== null" class="googleMap__back">
              <button class="googleMap__backButton" @click="closeDetails">
                <span class="icon icon-arrow-left"></span>
              </button>
            </div>
          </Transition>
          <Transition name="fade">
            <div v-if="activeItem === null">
              <div
                v-for="(item, index) in points"
                :key="index"
                class="googleMap__location"
                @mouseenter="setMarkerActive(index)"
                @mouseleave="setMarkerInactive(index)"
                @click="setActiveItem(index)"
              >
                <div class="googleMap__locationWrapper">
                  <div class="googleMap__locationIcon">
                    <div class="googleMap__locationIconWrapper">
                      <img :src="markerIcon" alt="location icon">
                    </div>
                  </div>
                  <div class="googleMap__locationData">
                    <h6 class="googleMap__locationName">{{ item.one_line_summary }}</h6>
                    <p class="p p--big">{{ item.address }}</p>
                    <p class="p p--big">{{ item.contact }}</p>
                  </div>
                </div>
              </div>
            </div>
          </Transition>
          <Transition name="fade">
            <div
              v-if="activeItem !== null"
              class="googleMap__details"
            >
              <div class="googleMap__detailsPhoto">
                <div class="googleMap__detailsPhotoInner">
                  <img :src="activeItem.photo.url" :alt="activeItem.photo.alt">
                </div>
              </div>
              <div class="googleMap__detailsContent">
                <div class="googleMap__detailsName">
                  <h5>{{ activeItem.name }}</h5>
                </div>
                <div class="googleMap__detailsAddress">
                  <p class="p p--big">{{ activeItem.address }}</p>
                  <p class="p p--big">{{ activeItem.contact }}</p>
                </div>
              </div>
              <div class="googleMap__detailsRating">
                <div class="googleMap__detailsRatingValue">
                  <p class="p p--big">{{ activeItem.rating }}</p>
                </div>
              </div>
              <div class="googleMap__detailsMore">
                <p class="p">
                  <a target="_blank" :href="activeItem.place_url">{{ locale.show_in_maps }}</a>
                </p>
              </div>
            </div>
          </Transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Loader } from '@googlemaps/js-api-loader';

export default {
  name: 'GoogleMap',
  props: {
    apiKey: {
      type: String,
      default: '',
    },
    points: {
      type: Array,
      default: () => [],
    },
    markerIcon: {
      type: String,
      default: '',
    },
    styles: {
      type: [Array, Object],
      default: null,
    },
    locale: {
      type: Object,
      default: () => {},
    }
  },
  data() {
    return {
      loader: null,
      map: null,
      markers: [],
      activeItem: null
    }
  },
  mounted() {
    this.createMap();
  },
  methods: {
    async createMap() {
      this.loader = new Loader({
        apiKey: this.apiKey,
      });

      await this.loader
        .load()
        .then((google) => {
          this.initMap();
        })
        .catch(e => {
          console.log(e);
        })
    },
    initMap() {
      this.map = new google.maps.Map(this.$refs.map, {
        center: {lat: 52.2761241, lng: 15.0787111},
        zoom: 7,
        styles: this.styles,
      });

      this.setMarkers();
    },
    setMarkers() {
      if (!this.map || this.map === null) return;

      this.points.forEach((item, index) => {
        const { coordinates } = item;
        const latlon = new google.maps.LatLng(coordinates.latitude, coordinates.longitude);

        this.placeMarker(latlon, index);
      })

      const myoverlay = new google.maps.OverlayView();
      myoverlay.draw = function () {
          this.getPanes().markerLayer.id='markerLayer';
      };
      myoverlay.setMap(this.map);
      setTimeout(() => {
        this.assignMarkers();
      }, 800);
    },
    placeMarker(latlon, index) {
      const marker = new google.maps.Marker({
          position: latlon,
          icon: this.markerIcon,
          optimized: false,
      });
      marker.setMap(this.map);

      google.maps.event.addListener(marker, 'click', function(event) {
        this.onMarkerClick(index);
      }.bind(this));
    },
    assignMarkers() {
      const layer = document.querySelectorAll('#markerLayer > div');
      console.log(layer);

      if (!layer) return;

      layer.forEach((item, index) => {
        if (index > 0) {
          this.markers.push(item);
        }
      });
    },
    onMarkerClick(index) {
      if (this.activeItem === null) {
        this.setMarkerActive(index);
        this.setActiveItem(index);
      } else {
        this.setMarkerInactive(index);
        this.closeDetails();
      }
    },
    setMarkerActive(index) {
      const marker = this.markers.find((item, i) => i === index);
      if (!marker) return;

      marker.classList.add('googleMap__point--active');
    },
    setMarkerInactive(index) {
      const marker = this.markers.find((item, i) => i === index);
      if (!marker) return;

      marker.classList.remove('googleMap__point--active');
    },
    setActiveItem(index) {
      this.activeItem = this.points.find((item, i) => i === index);
    },
    closeDetails() {
      this.activeItem = null;
      this.markers.forEach((item) => {
        item.classList.remove('googleMap__point--active');
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>