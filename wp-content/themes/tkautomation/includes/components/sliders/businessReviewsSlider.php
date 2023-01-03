<?php
  $items = $args['items'];
?>

<div class="businessReviewsSlider" data-business-review-slider>
  <div class="businessReviewsSlider__nav businessReviewsSlider__nav--prev">
  <?php get_template_part('/includes/components/buttons/navButton', null, [
    'icon' => 'arrow-left',
    'attr' => 'data-business-review-slider-prev'
  ]); ?>
  </div>
  <div class="businessReviewsSlider__nav businessReviewsSlider__nav--next">
  <?php get_template_part('/includes/components/buttons/navButton', null, [
    'icon' => 'arrow-right',
    'attr' => 'data-business-review-slider-next'
  ]); ?>
  </div>
  <div class="businessReviewsSlider__container swiper-container" data-business-review-slider-wrapper>
    <div class="businessReviewsSlider__wrapper swiper-wrapper">
    <?php foreach($items as $key => $item): ?>
      <div class="businessReviewsSlider__slide swiper-slide">
      <?php get_template_part('/includes/components/cards/businessReviewCard', null, [
        'text' => $item['text'],
        'logo' => $item['logo']
      ]); ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>