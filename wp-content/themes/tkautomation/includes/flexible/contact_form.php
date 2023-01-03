<?php
  $rootClass = '';

  $header = $section['header'];
  $text = $section['text'];
  $image = $section['image'];
  $form = $section['form'];

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section contactForm <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="contactForm__wrapper">
      <div class="contactForm__lead">
        <div class="contactForm__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'headerTag' => 'h4',
          'text' => $text,
          'isTextBig' => true
        ]) ?>
        </div>
        <div class="contactForm__image">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
      </div>
      <div class="contactForm__form">
      <?= do_shortcode($form) ?>
      </div>
    </div>
  </div>
</section>