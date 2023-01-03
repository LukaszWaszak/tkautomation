<?php
  $rootClass = '';

  $header = $section['header'];
  $items = $section['items'];
  $settings = $section['settings'];
  $padding = $settings['padding'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section ratings <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="ratings__wrapper" data-cards-slider>
      <div class="ratings__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'headerTag' => 'h4'
        ]) ?>
        <div class="ratings__nav">
          <div class="ratings__navButton">
          <?php get_template_part('/includes/components/buttons/navButton', null, [
            'icon' => 'arrow-left',
            'attr' => 'data-cards-slider-prev'
          ]) ?>
          </div>
          <div class="ratings__navButton">
          <?php get_template_part('/includes/components/buttons/navButton', null, [
            'icon' => 'arrow-right',
            'attr' => 'data-cards-slider-next'
          ]) ?>
          </div>
        </div>
      </div>
      <div class="ratings__list">
        <div class="ratings__slider swiper-container" data-cards-slider-container>
          <div class="ratings__sliderWrapper swiper-wrapper">
          <?php foreach($items as $key => $item): ?>
            <div class="ratings__sliderSlide swiper-slide" data-cards-slider-slide>
            <?php get_template_part('/includes/components/cards/reviewCard', null, [
              'description' => $item['description'],
              'name' => $item['name'],
              'avatar' => $item['avatar'],
              'city' => $item['city'],
              'stars' => $item['stars']
            ]); ?>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>