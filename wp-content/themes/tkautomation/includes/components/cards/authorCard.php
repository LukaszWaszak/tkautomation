<?php
  $image = $args['image'];
  $name = $args['name'];
  $role = $args['role'];
?>

<div class="authorCard">
  <div class="authorCard__wrapper">
    <div class="authorCard__avatar">
    <?php get_template_part('/includes/components/image/imageBox', null, [
      'image' => [
        'url' => $image,
        'alt' => ''
      ]
    ]) ?>
    </div>
    <div class="authorCard__data">
      <div class="authorCard__role">
        <p class="p"><?= $role ?></p>
      </div>
      <div class="authorCard__name">
        <p class="p p--big"><?= $name ?></p>
      </div>
    </div>
  </div>
</div>