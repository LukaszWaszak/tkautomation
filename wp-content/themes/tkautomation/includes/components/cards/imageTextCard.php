<?php
  $image = $args['image'];
  $text = $args['text'];
  $url = $args['url'];
?>

<div class="imageTextCard">
  <div class="imageTextCard__image">
    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
  </div>
  <div class="imageTextCard__content">
    <div class="imageTextCard__text">
      <a href="<?= $url ?>">
        <h5><?= $text ?></h5>
      </a>
    </div>
    <div class="imageTextCard__more">
    <?php get_template_part('/includes/components/button', null, [
      'text' => 'Sprawdź ofertę',
      'url' => ''
    ]) ?>
    </div>
  </div>
</div>