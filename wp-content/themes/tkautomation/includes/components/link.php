<?php
  $rootClass = '';

  $url = $args['url'];
  $text = $args['text'];
  $customClass = $args['customClass'];
  $theme = $args['theme'];
  $noHover = $args['noHover'];
  $size = $args['size'];
  $icon = $args['icon'];
  $onlyIcon = $args['onlyIcon'];
  $iconAfter = $args['iconAfter'];
  $iconBefore = $args['iconBefore'];

  $rootClass .= (isset($customClass) && $customClass != '') ? ' '.$customClass : '';
  $rootClass .= (isset($theme) && $theme != '') ? ' link--theme-'.$theme : '';
  $rootClass .= (isset($size) && $size != '') ? ' link--'.$size : '';
  $rootClass .= (isset($noHover) && $noHover) ? ' link--noHover' : '';
  $rootClass .= (isset($onlyIcon) && $onlyIcon) ? ' link--onlyIcon' : '';
?>

<a href="<?= $url ?>" class="link <?= $rootClass ?>">
  <?php if (isset($iconBefore) && isset($icon) && $iconBefore): ?>
    <span class="link__icon icon icon-<?= $icon ?>"></span>
  <?php endif; ?>
  <?php if (!$onlyIcon): ?>
    <span class="link__text">
      <?= $text ?>
    </span>
  <?php else : ?>
    <span class="link__icon icon icon-<?= $icon ?>"></span>
  <?php endif; ?>
  <?php if (isset($iconAfter) && isset($icon) && $iconAfter): ?>
    <span class="link__icon icon icon-<?= $icon ?>"></span>
  <?php endif; ?>
</a>