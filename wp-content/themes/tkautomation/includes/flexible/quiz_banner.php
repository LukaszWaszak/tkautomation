<?php
  $settings = $section['settings'];
  $padding = $settings['padding'];

  $header = $section['header'];
  $text = $section['text'];
  $button = $section['button'];
  $image = $section['image'];

  $sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section <?= $sectionPadding ?> quizBanner" data-section>
  <div class="container">
    <div class="quizBanner__wrapper">
      <div class="quizBanner__text">
      <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'text' => $text,
          'headerTag' => 'h5',
          'textTag' => 'p',
          'isTextBig' => true
      ]) ?>
      </div>
      <div class="quizBanner__button">
      <?php get_template_part('/includes/components/button', null, [
        'text' => $button['text'],
        'url' => $button['link']
      ]) ?>
      </div>
      <div class="quizBanner__image">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $image
      ]) ?>
      </div>
    </div>
  </div>
</section>