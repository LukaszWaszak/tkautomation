<?php
  $header = $section['header'];
  $subtitle = $section['subtitle'];
  $eBook = $section['e-book'];

  $url = (!is_null($eBook)) ? get_the_permalink($eBook->ID) : '';

  $imageID = (!is_null($eBook)) ? get_post_thumbnail_id( $eBook->ID ) : null;
  $imageUrl = (!is_null($imageID)) ? wp_get_attachment_image_src( $imageID, '') : '';
  $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
?>

<div class="eBookBanner">
  <div class="eBookBanner__wrapper">
    <div class="eBookBanner__thumbnail">
      <div class="eBookBanner__thumbnailInner">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => [
          'url' => $imageUrl[0],
          'alt' => $imageAlt
        ]
      ]) ?>
      </div>
    </div>
    <div class="eBookBanner__content">
      <div class="eBookBanner__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4'
      ]) ?>
      </div>
      <div class="eBookBanner__subtitle">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $subtitle,
        'headerTag' => 'h5'
      ]) ?>
      </div>
      <div class="eBookBanner__button">
      <?php get_template_part('/includes/components/button', null, [
        'text' => __('Pobierz darmowy ebook', 'tutlo'),
        'url' => $url
      ]); ?>
      </div>
    </div>
  </div>
</div>