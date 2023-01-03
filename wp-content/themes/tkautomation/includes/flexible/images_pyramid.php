<?php
  $rootClass = '';
  $images = $section['images'];

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section imagesPyramid" data-section>
  <div class="container">
    <div class="imagesPyramid__images">
    <?php foreach($images as $key => $item): ?>
      <div class="imagesPyramid__image">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $item['image']
      ]) ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>