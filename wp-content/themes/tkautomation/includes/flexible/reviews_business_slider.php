<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];

  $header = $section['header'];
  $bg = $section['background'];
  $reviews = $section['reviews'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section businessReviews <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="businessReviews__wrapper">
      <div class="businessReviews__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4',
      ]) ?>
      </div>
      <div class="businessReviews__bg">
        <div class="businessReviews__bgInner">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $bg
        ]) ?>
        </div>
      </div>
      <div class="businessReviews__slider">
      <?php get_template_part('/includes/components/sliders/businessReviewsSlider', null, [
        'items' => $reviews
      ]) ?>
      </div>
    </div>
  </div>
</section>