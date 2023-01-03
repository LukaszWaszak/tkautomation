<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $settingsWithBg = $settings['with_background'];

  $withFilters = $section['with_filters'];
  $headerTag = $section['headerTag'];
  $header = $section['header'];
  $categories = (is_array($section['categories'])) ? $section['categories'] : [];
  $targetGroups = (is_array($section['target_groups'])) ? $section['target_groups'] : [];
  $button = $section['button'];
  $download = $section['download'];

  $terms = get_terms(array(
    'taxonomy' => 'speaker',
    'include' => $categories
  ));

  $categoriesList = [];
  foreach($categories as $key => $cat) {
    $category = get_category($cat);
    array_push($categoriesList, [
      'id' => $category->term_id,
      'name' => $category->name
    ]);
  }

  foreach($targetGroups as $key => $cat) {
    $category = get_term($cat);
    array_push($categoriesList, [
      'id' => $category->term_id,
      'name' => $category->name
    ]);
  }

  $apiURL = home_url().'/wp-json/api/v1/';
  $locale = [
    'toggleAll' => __('Wszystkie', 'tutlo'),
    "more" => __('Czytaj więcej', 'tutlo')
  ];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section blog <?= $rootClass ?>" data-section <?= ($settingsWithBg) ? 'data-bg-to-footer' : '' ?>>
  <div class="container">
    <div class="blog__wrapper" data-vue-component>
      <v-blog-section
        :with-filters='<?= json_encode($withFilters) ?>'
        :api='<?= json_encode($apiURL) ?>'
        :locale='<?= json_encode($locale) ?>'
        :header='<?= json_encode($header) ?>'
        :categories='<?= json_encode($categoriesList) ?>'
        :button='<?= json_encode($button) ?>'
        :download='<?= json_encode($download); ?>'
      >
      </v-blog-section>
    </div>
  </div>
</section>