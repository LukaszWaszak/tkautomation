<?php
  $rootClass = '';

  $icon = $args['icon'];
  $link = $args['link'];
  $text = $args['text'];
  $desc = $args['description'];
  $theme = $args['theme'];

  $url = (!is_null($link) && $link !== '') ? $link['url'] : '';

  $rootClass .= ($theme !== 'default') ? 'linkCard--'.$theme : '';
?>

<div class="linkCard <?= $rootClass ?>">
  <a href="<?= $url ?>">
    <div class="linkCard__wrapper">
      <div class="linkCard__inner">
        <div class="linkCard__icon">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $icon
        ]); ?>
        </div>
        <div class="linkCard__text">
          <h5><?= $text ?></h5>
        </div>
      </div>
      <div class="linkCard__desc">
        <p><?= $desc ?></p>
      </div>
    </div>
  </a>
</div>