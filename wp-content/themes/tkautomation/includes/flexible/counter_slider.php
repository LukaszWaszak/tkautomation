<?php
  $rootClass = '';
  $settings = $section['settings'];
  $theme = $settings['theme'];

  $slides = $section['slider'];
  $header = $section['header'];
  $image = $section['background_image'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
  $rootClass .= (isset($theme)) ? 'counterSlider--'.$theme : '';
?>

<section id="firmy" class="section section--padding-small counterSlider <?= $rootClass ?>" data-counter-slider data-section style="background-image:url('<?= $image['url'] ?>')">
  <div class="container">
    <div class="counterSlider__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
      'headerTag' => 'h5'
    ]) ?>
    </div>
    <div class="counterSlider__inner swiper-container" data-counter-slider-container>
      <div class="counterSlider__slides swiper-wrapper">
      <?php foreach($slides as $key => $item): ?>
        <div class="counterSlider__slide swiper-slide" data-counter-slider-slide>
          <div class="counterSlider__slideIcon">
            <img src="<?= $item['icon_main']['url'] ?>" alt="<?= $item['icon_main']['alt'] ?>">
          </div>
          <div class="counterSlider__slideContent">
            <h4 class="counterSlider__slideNumber" data-counter-slider-number><?= $item['number'] ?></h4>
            <p class="counterSlider__slideText" data-counter-slider-text><?= $item['text'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>