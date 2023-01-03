<?php
  $rootClass = '';

  $icon = $args['icon'];
  $title = $args['title'];
  $desc = $args['desc'];
  $theme = $args['theme'];

  $url = (!is_null($link) && $link !== '') ? $link['url'] : '';

  $rootClass .= ($theme !== 'default') ? 'jobAdvantagesCard--'.$theme : '';
?>

<div class="jobAdvantagesCard <?= $rootClass ?>">
    <div class="jobAdvantagesCard__wrapper">
      <div class="jobAdvantagesCard__inner">
        <div class="jobAdvantagesCard__icon">
          <img src="<?= $icon ?>" alt="Job Advantages Icon">
        </div>
        <div class="jobAdvantagesCard__text">
          <div class="jobAdvantagesCard__title">
            <h4><?= $title ?></h4>
          </div>
          <div class="jobAdvantagesCard__desc">
            <p><?= $desc ?></p>
          </div>
        </div>
      </div>
    </div>
</div>