<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];

  $header = $section['header'];
  $mentions = $section['mentions'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section videoMentions <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="videoMentions__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
      'headerTag' => 'h4'
    ]) ?>
    </div>
    <div class="videoMentions__mentions" data-cards-slider>
      <div class="videoMentions__nav videoMentions__nav--prev">
      <?php get_template_part('/includes/components/buttons/navButton', null, [
        'icon' => 'arrow-left',
        'attr' => 'data-cards-slider-prev'
      ]); ?>
      </div>
      <div class="videoMentions__nav videoMentions__nav--next">
      <?php get_template_part('/includes/components/buttons/navButton', null, [
        'icon' => 'arrow-right',
        'attr' => 'data-cards-slider-next'
      ]); ?>
      </div>
      <div class="videoMentions__slider swiper-container" data-cards-slider-container>
        <div class="videoMentions__sliderWrapper swiper-wrapper">
        <?php foreach($mentions as $key => $item): ?>
          <div class="videoMentions__slide swiper-slide" data-cards-slider-slide>
          <?php get_template_part('/includes/components/cards/videoMentionCard', null, [
            'name' => $item['name'],
            'caption' => $item['caption'],
            'preview' => $item['preview_image'],
            'video' => $item['video']
          ]) ?>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>