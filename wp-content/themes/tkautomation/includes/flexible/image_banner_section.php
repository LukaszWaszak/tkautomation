<?php
  $rootClass = '';

  $header = $section['header'];
  $subtitle = $section['subtitle'];
  $text = $section['text'];
  $image = $section['image'];
  $button = $section['button'];

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $interval = $settings['time_interval'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section <?= $rootClass ?> imageBannerSection" data-section>
  <div class="container">
    <div class="imageBannerSection__wrapper">
      <div class="imageBannerSection__shapes">
        <div class="imageBannerSection__shape imageBannerSection__shape--blue" data-section-shape></div>
        <div class="imageBannerSection__shape imageBannerSection__shape--purple" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/elipse_quarter_purple_2.svg'
          ]
        ]) ?>
        </div>
        <div class="imageBannerSection__shape imageBannerSection__shape--rose" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/ellipse_rose.svg'
          ]
        ]) ?>
        </div>
        <div class="imageBannerSection__shape imageBannerSection__shape--yellow" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/circle_yellow.svg'
          ]
        ]) ?>
        </div>
        <div class="imageBannerSection__shape imageBannerSection__shape--lightYellow" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/circle_light_yellow.svg'
          ]
        ]) ?>
        </div>
        <div class="imageBannerSection__shape imageBannerSection__shape--pattern" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/pattern_cross_2.svg'
          ]
        ]) ?>
        </div>
      </div>
      <div class="imageBannerSection__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4',
        'subtitle' => $subtitle,
        'text' => $text,
        'isTextBig' => true
      ]) ?>
      </div>
      <div class="imageBannerSection__image">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $image
      ]) ?>
      </div>
      <?php if (!is_null($button) && $button['active']): ?>
        <div class="imageBannerSection__more">
        <?php get_template_part('/includes/components/button', null, [
          'text' => $button['text'],
          'url' => $button['link']['url']
        ]) ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>