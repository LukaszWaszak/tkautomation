<?php
  $header = $section['header'];
  $slides = $section['slides'];

  $locale = [
    'more' => __('Dowiedz się więcej', 'tutlo'),
    'evenMore' => __('Dowiedz się jeszcze więcej', 'tutlo'),
    'loop' => __('Czytaj od nowa', 'tutlo')
  ]
?>

<section class="section textImageSliderSection" data-section>
  <div class="container">
    <div class="textImageSliderSection__slider" data-vue-component>
      <v-text-image-slider
        :header='<?= json_encode($header) ?>'
        :items='<?= json_encode($slides) ?>'
        :locale='<?= json_encode($locale) ?>'
      >
      </v-text-image-slider>
    </div>
  </div>
</section>