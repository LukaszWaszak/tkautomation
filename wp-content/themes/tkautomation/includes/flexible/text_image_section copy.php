<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $header = $section['header'];
  $subtitle = $section['subtitle'];
  $text = $section['text'];
  $image = $section['image'];
  $imageLeft = $section['image_left'];

  $rootClass .= ($imageLeft) ? 'textImageSection--imageLeft' : '';
  $rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';
?>

<section class="section textImageSection <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="textImageSection__wrapper">
      <?php if ($imageLeft): ?>
        <div class="textImageSection__image">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
      <?php endif; ?>
      <div class="textImageSection__text">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'subtitle' => $subtitle,
        'text' => $text,
        'headerTag' => 'h4',
        'textTag' => 'p',
        'isTextBig' => true
      ]); ?>
      </div>
      <?php if (!$imageLeft): ?>
        <div class="textImageSection__image">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>