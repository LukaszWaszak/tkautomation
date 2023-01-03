<?php
  $title = get_the_title($post->ID);
  $thumbnailID = get_post_thumbnail_id($post->ID);
  $thumbnail = wp_get_attachment_image_src($thumbnailID, 'post-thumbnail');
  $thumbnailAlt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', TRUE);

  $scrollLink = get_field('single_resource_scroll_link', $post->ID);
  $description = get_field('single_resource_description', $post->ID);
  $form = get_field('single_resource_form', $post->ID);
  $textEditor = get_field('single_resource_text_editor', $post->ID);
?>

<section class="section resourcesHero" data-section>
  <div class="container">
    <div class="resourceHero__title">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $title,
      'headerTag' => 'h5',
    ]) ?>
    </div>
    <div class="resourcesHero__wrapper">
      <div class="resourcesHero__thumbnail">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => [
          'url' => $thumbnail[0],
          'alt' => $thumbnailAlt
        ]
      ]); ?>
      </div>
      <div class="resourcesHero__content">
        <div class="resourcesHero__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => __('O materiale', 'tutlo'),
          'headerTag' => 'h5',
          'text' => $description,
          'isTextBig' => true
        ]) ?>
        </div>
        <div class="resourcesHero__scrollLink">
        <?php get_template_part('/includes/components/link', null, [
          'text' => $scrollLink,
          'theme' => 'underline',
          'size' => 'big',
          'url' => '#resourcesDetails'
        ]) ?>
        </div>
        <?php if (!is_null($form)): ?>
          <div class="resourcesHero__form">
          <?php get_template_part('/includes/components/forms/pageForm', null, [
            'form' => $form['form'],
            'header' => $form['header'],
            'subtitle' => $form['subtitle'],
          ]) ?>
          </div>
        <?php endif; ?>
        <div class="resourcesHero__textEditor" id="resourcesDetails">
          <div class="textEditor textEditor--list-normal">
            <?= $textEditor ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>