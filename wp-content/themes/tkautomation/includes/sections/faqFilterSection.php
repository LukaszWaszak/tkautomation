<?php
  $faqCategories = apply_filters('getTermsObjects', 'question-type');
  $faqHint = get_field('faq_hint', $post->ID);
  $locale = [
    'filter' => [
      'label' => __('Filtruj', 'tutlo'),
      'all' => __('Wszystkie', 'tutlo')
    ],
    'search' => __('Wyszukaj pytanie np. czym jest Tutlo?', 'tutlo'),
  ];

  $apiURL = $baseURL.'/wp-json/api/v1/';
?>

<section class="section section--padding-topNone faqFilterSection">
  <div class="container">
    <div class="faqFilterSection__wrapper" data-vue-component>
      <v-faq-filter
        :api='<?= json_encode($apiURL) ?>'
        :categories='<?= json_encode($faqCategories) ?>'
        :hint='<?= json_encode($faqHint) ?>'
        :locale='<?= json_encode($locale) ?>'
      >
      </v-faq-filter>
    </div>
  </div>
</section>