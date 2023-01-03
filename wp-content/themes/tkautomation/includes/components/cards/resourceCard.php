<?php
  $title = $args['title'];
  $image = $args['image'];
  $url = $args['url'];
?>
<div class="resourceCard">
  <div class="resourceCard__thumbnail">
    <div class="resourceCard__thumbnailWrapper">
      <img src="<?= $image ?>" alt="">
    </div>
  </div>
  <div class="resourceCard__content">
    <div class="resourceCard__title">
      <p class="p p--big"><?= $title ?></p>
    </div>
    <div class="resourceCard__button">
      <a href="<?= $url ?>" class="button button--default button--size-medium">
        <span class="button__text">
          <?= __('Pobierz', 'tutlo') ?>
        </span>
      </a>
    </div>
  </div>
</div>