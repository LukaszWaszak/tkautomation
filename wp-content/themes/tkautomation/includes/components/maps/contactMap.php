<?php
  $apiKey = get_field('google_api_key', 'options');
  $mapStylesFile = THEME_DIR.'assets/json/google_maps_styles.json';
  $mapStyles = (file_exists($mapStylesFile)) ? file_get_contents($mapStylesFile) : null;

  $title = $args['title'];
  $coordinates = $args['coordinates'];
  $address = $args['address'];
  $icon = $args['icon']['url'];
?>

<div class="contactMap">
  <div class="contactMap__wrapper">
    <div class="contactMap__map" data-vue-component>
      <v-default-map
        :api-key='<?= json_encode($apiKey) ?>'
        :marker-icon='<?= json_encode($icon) ?>'
        :coords='<?= json_encode($coordinates) ?>'
        :styles='<?= $mapStyles ?>'
      >
      </v-default-map>
    </div>
    <div class="contactMap__data">
      <div class="contactMap__details">
        <div class="contactMap__title">
          <h6><?= $title ?></h6>
        </div>
        <div class="contactMap__address">
          <p class="p p--big"><?= $address ?></p>
        </div>
      </div>
      <div class="contactMap__route">
      <?php get_template_part('/includes/components/button', null, [
        'text' => __('Wyznacz trasę', 'tutlo')
      ]) ?>
      </div>
    </div>
  </div>
</div>