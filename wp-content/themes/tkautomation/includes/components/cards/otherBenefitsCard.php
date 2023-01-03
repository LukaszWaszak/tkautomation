<?php
  $rootClass = '';

  $icon = $args['icon'];
  $title = $args['title'];
  $desc = $args['desc'];
  $theme = $args['theme'];

  $url = (!is_null($link) && $link !== '') ? $link['url'] : '';

  $rootClass .= ($theme !== 'default') ? 'otherBenefitsCard--'.$theme : '';
?>

<div class="otherBenefitsCard <?= $rootClass ?>">
    <div class="otherBenefitsCard__wrapper">
      <div class="otherBenefitsCard__inner">
        <div class="otherBenefitsCard__icon">
          <img src="<?= $icon ?>" alt="Job Advantages Icon">
        </div>
        <div class="otherBenefitsCard__text">
          <div class="otherBenefitsCard__title">
            <h5><?= $title ?></h5>
          </div>
          <div class="otherBenefitsCard__desc">
            <p><?= $desc ?></p>
          </div>
        </div>
      </div>
    </div>
</div>