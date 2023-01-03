<?php
  $icon = $args['icon'];
  $title = $args['title'];
  $text = $args['text'];
?>
<div class="iconTextCard">
  <div class="iconTextCard__icon">
    <img src="<?= $icon['url'] ?>" alt="<?= $icon['args'] ?>">
  </div>
  <div class="iconTextCard__title">
    <p class="p p--big"><?= $title ?></p>
  </div>
  <div class="iconTextCard__text">
    <p class="p p--small">
      <?= $text ?>
    </p>
  </div>
</div>