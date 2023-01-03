<?php
  $rootClass = '';

  $icon = $args['icon'];
  $title = $args['title'];
  $link = $args['link'];
  $theme = $args['theme'];


  $rootClass .= ($theme !== 'default') ? 'otherBenefitsCard--'.$theme : '';
?>
<a href="<?= $link ?>">
  <div class="checkRulesCard <?= $rootClass ?>">
    <div class="checkRulesCard__wrapper">
      <div class="checkRulesCard__inner">
        <div class="checkRulesCard__icon">
          <img src="<?= $icon ?>" alt="Check the rules icon">
        </div>
        <div class="checkRulesCard__text">
          <div class="checkRulesCard__title">
            <p><?= $title ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</a>