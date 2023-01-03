<?php
  $rootClass = '';
  $sectionClass = '';

  $variant = $section['variant'];
  $settings = $section['settings'];
  $padding = $settings['padding'];

  $header = $section['header'];
  $text = $section['text'];
  $button = $section['button'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
  $sectionClass .= (isset($variant) && $variant != '') ? ' encourageBanner--'.$variant : '';
?>

<section class="section <?= $rootClass ?> encourageBanner <?= $sectionClass ?>" data-section>
  <div class="container">
    <div class="encourageBanner__wrapper">
      <div class="encourageBanner__circles encourageBanner__circles--left"></div>
      <div class="encourageBanner__circles encourageBanner__circles--right"></div>
      <div class="encourageBanner__inner">
        <div class="encourageBanner__text">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'text' => $text,
          'headerTag' => 'h4',
          'textTag' => 'p',
          'isTextBig' => true
        ]) ?>
        </div>
        <div class="encourageBanner__button">
        <?php get_template_part('/includes/components/button', null, [
          'text' => $button['text'],
          'url' =>(!is_null($button['link']) && $button['link']) ?  $button['link']['url'] : '',
          'big' => true
        ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>