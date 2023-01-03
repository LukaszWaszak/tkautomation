<?php
  $icon = $args['icon'];
  $title = $args['title'];
  $text = $args['text'];
?>

<div class="iconDetailsCard">
  <div class="iconDetailsCard__top">
    <div class="iconDetailsCard__icon">
    <?php get_template_part('/includes/components/image/imageBox', null, [
      'image' => $icon
    ]) ?>
    </div>
    <div class="iconDetailsCard__title">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $title,
      'headerTag' => 'h5',
    ]) ?>
    </div>
  </div>
  <div class="iconDetailsCard__text">
  <?php get_template_part('/includes/components/text', null, [
    'text' => $text,
    'isTextBig' => true,
  ]) ?>
  </div>
</div>