<?php
  $mapStylesFile = THEME_DIR.'assets/json/google_maps_styles.json';
  $mapStyles = (file_exists($mapStylesFile)) ? file_get_contents($mapStylesFile) : null;

  $apiKey = get_field('google_api_key', 'options');
  $points = get_field('map_points_hidden', 'option');
  $marker = get_field('map_marker_icon', 'option');

  $points = array_map(function($item) {
    $item['coordinates']['latitude'] = floatval($item['coordinates']['latitude']);
    $item['coordinates']['longitude'] = floatval($item['coordinates']['longitude']);

    return $item;
  }, $points);

  $locale = [
    'show_in_maps' => __('Wyświetl w mapach Google', 'tutlo'),
    'maps_details' => __('Szczegóły z Map Google', 'tutlo'),
  ]
?>

<section class="section section--padding-none map" data-section>
  <div class="map__wrapper">
    <div class="map__inner" data-vue-component>
      <v-google-map
        :api-key='<?= json_encode($apiKey) ?>'
        :points='<?= json_encode($points) ?>'
        :marker-icon='<?= json_encode($marker['url']) ?>'
        :styles='<?= $mapStyles ?>'
        :locale='<?= json_encode($locale) ?>'
      >
      </v-google-map>
    </div>
  </div>
</section>