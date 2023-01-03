<?php
  $rootClass = '';

  $header = $section['header'];
  $logos = $section['logos'];

  $settings = $section['settings'];
  $padding = $settings['padding'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section logosSlider <?= $rootClass ?>" data-section data-loop-slider>
  <div class="container">
    <div class="logosSlider__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
      'headerTag' => 'h5'
    ]) ?>
    </div>
  </div>
  <div class="logosSlider__slider swiper-container" data-loop-slider-wrapper>
    <div class="logosSlider__sliderWrapper swiper-wrapper">
    <?php foreach($logos as $key => $item): ?>
      <div class="logosSlider__sliderSlide swiper-slide">
        <a href="<?= (!is_null($item['link']) && $item['link'] !== '') ? $item['link']['url'] : '' ?>">
          <div class="logosSlider__sliderLogo">
          <?php get_template_part('/includes/components/image/imageBox', null, [
            'image' => $item['logo']
          ]) ?>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>