<?php
  $items = $args['items'];
  $count = (!is_null($items)) ? count($items) : 0;
  $current = 0;
  $maxVisible = 4;
?>

<div class="stackedSlider" data-stacked-slider>
  <div class="stackedSlider__wrapper">
    <div class="stackedSlider__slides">
    <?php foreach($items as $key => $item): $diff = $key % $maxVisible; ?>
      <div
        class="stackedSlider__slide"
        data-stacked-slider-slide="<?= $key ?>"
      >
      <?php get_template_part('/includes/components/cards/stackedReviewCard', null, [
        'item' => $item
      ]) ?>
      </div>
    <?php endforeach; ?>
    </div>
    <div class="stackedSlider__nav">
      <div class="stackedSlider__nav stackedSlider__nav--prev">
      <?php get_template_part('/includes/components/buttons/navButton', null, [
        'icon' => 'arrow-left',
        'attr' => 'data-stacked-slider-prev'
      ]); ?>
      </div>
      <div class="stackedSlider__nav stackedSlider__nav--next">
      <?php get_template_part('/includes/components/buttons/navButton', null, [
        'icon' => 'arrow-right',
        'attr' => 'data-stacked-slider-next'
      ]); ?>
      </div>
    </div>
  </div>
</div>