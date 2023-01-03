<?php
  $rootClass = '';

  $variant = $section['variant'];
  $withPopup = $section['cards_with_popup'];
  $header = $section['header'];
  $tag = $section['tag'];
  $categories = $section['categories'];
  $text = $section['text'];
  $button = $section['button'];

  $terms = get_terms(array(
    'taxonomy' => 'speaker',
    'include' => $categories
  ));

  $categoriesList = [];
  foreach ($terms as $key => $item) {
    array_push($categoriesList, [
      'id' => $item->term_id,
      'name' => $item->name
    ]);
  };

  $apiURL = home_url().'/wp-json/api/v1/';
  $locale = [
    'toggleAll' => __('Wszyscy nauczyciele', 'tutlo'),
    "more" => __('Poznaj mnie', 'tutlo'),
    'popupButton' => __('Rozpocznij naukę', 'tutlo'),
    'popupAbout' => __('O mnie', 'tutlo'),
    'popupCompetence' => __('Kompetencje', 'tutlo'),
    'popupMore' => __('Rozpocznij naukę', 'tutlo')
  ];

  $rootClass .= (!is_null($variant) && $variant != 'default') ? 'speakers--'.$variant : '';
?>

<section class="section speakers <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="speakers__wrapper" data-vue-component>
      <v-speakers-section
        :api='<?= json_encode($apiURL) ?>'
        :tag='<?= json_encode($tag) ?>'
        :header='<?= json_encode($header) ?>'
        :text='<?= json_encode($text) ?>'
        :categories='<?= json_encode($categoriesList) ?>'
        :locale='<?= json_encode($locale) ?>'
        :button='<?= json_encode($button) ?>'
        :variant='<?= json_encode($variant) ?>'
        :with-popup='<?= json_encode($withPopup) ?>'
      >
      </v-speakers-section>
    </div>
  </div>
</section>