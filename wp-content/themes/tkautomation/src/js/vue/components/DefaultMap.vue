<template>
  <div class="defaultMap" ref="map"></div>
</template>

<script>
import { Loader } from '@googlemaps/js-api-loader';

export default {
  name: 'DefaultMap',
  props: {
    apiKey: {
      type: String,
      default: '',
    },
    markerIcon: {
      type: String,
      default: ''
    },
    coords: {
      type: Object,
      default: () => {},
    },
    styles: {
      type: Array,
      default: () => {},
    }
  },
  data() {
    return {
      loader: null,
      map: null,
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
        .then(google => {
          this.initMap();
        });
    },
    initMap() {
      this.map = new google.maps.Map(this.$refs.map, {
        center: {lat: parseFloat(this.coords.latitude), lng: parseFloat(this.coords.longitude)},
        zoom: 14,
        styles: this.styles,
      });

      this.setMarkers();
    },
    setMarkers() {
      if (!this.map || this.map === null) return;
      const latlon = new google.maps.LatLng(parseFloat(this.coords.latitude), parseFloat(this.coords.longitude));

      this.placeMarker(latlon);
    },
    placeMarker(latlon, index) {
      const marker = new google.maps.Marker({
          position: latlon,
          icon: this.markerIcon,
          optimized: false,
      });
      marker.setMap(this.map);
    },
  }
}
</script>