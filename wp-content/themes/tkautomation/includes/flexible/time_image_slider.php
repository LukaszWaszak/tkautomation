<?php
  $rootClass = '';

  $header = $section['header'];
  $slides = $section['slides'];

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $interval = $settings['time_interval'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $nav = array_map(function($item) {
    return $item['title'];
  }, $slides);

  $sliderSettings = [
    'interval' => $interval
  ]
?>

<section class="section timeImageSlider <?= $rootClass ?>" data-section data-time-slider data-time-slider-settings='<?= json_encode($sliderSettings); ?>'>
  <div class="container">
    <div class="timeImageSlider__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
      'headerTag' => 'h4',
    ]) ?>
    </div>
    <div class="timeImageSlider__nav" data-time-slider-nav>
    <?php foreach($nav as $key => $item): ?>
      <div class="timeImageSlider__navItem" data-time-slider-nav-item="<?= $key ?>">
        <div class="timeImageSlider__navItemName">
          <h6><?= $item ?></h6>
          <div class="timeImageSlider__navItemProgress" style="--interval:<?= $interval ?>"></div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
    <div class="timeImageSlider__slider">
      <div class="timeImageSlider__sliderContainer swiper-container" data-time-slider-wrapper>
        <div class="timeImageSlider__sliderWrapper swiper-wrapper">
        <?php foreach($slides as $key => $item): ?>
          <div class="timeImageSlider__slide swiper-slide">
            <div class="timeImageSlider__content">
              <div class="timeImageSlider__contentText">
                <div class="textEditor">
                  <?= $item['content'] ?>
                </div>
              </div>
              <?php if ($item['button'] && $item['button']['active']): ?>
                <div class="timeImageSlider__more">
                <?php get_template_part('/includes/components/button', null, [
                  'text' => $item['button']['text'],
                  'url' => $item['button']['link']
                ]) ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="timeImageSlider__image">
              <div class="timeImageSlider__imageWrapper">
                <?php get_template_part('/includes/components/image/imageBox', null, [
                  'image' => $item['image']
                ]) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>