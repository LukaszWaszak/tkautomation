<?php
  $rootClass = '';
  $rootAttr = '';

  $text = $args['text'];
  $url = $args['url'];
  $theme = $args['theme'];
  $big = $args['big'];
  $icon = $args['icon'];
  $attr = $args['attr'];

  $onlyIcon = (isset($icon) && !isset($text));
  $isBig = (isset($big) && $big);

  if ($onlyIcon) $rootClass .= ' button--onlyIcon';
  if ($isBig) $rootClass .= ' button--size-big';

  $iconAfter = (isset($iconAfter) && $iconAfter);

  $rootClass .= ' button--' . (isset($theme) && $theme != '' ? $theme : 'default');
  if (isset($attr)) $rootAttr .= $attr;
?>

<?php if (isset($url)) : ?>
<a href="<?= $url ?>" class="button<?= $rootClass ?>"<?= $rootAttr ?>>
<?php else : ?>
<button class="button<?= $rootClass ?>"<?= $rootAttr ?>>
<?php endif; ?>
  <?php if (isset($icon) && !$onlyIcon && !$iconAfter) : ?>
  <span class="button__icon button__icon--before icon-<?= $icon ?>"></span>
  <?php endif; ?>
  <?php if ($onlyIcon) : ?>
  <span class="button__icon icon-<?= $icon ?>"></span>
  <?php else: ?>
  <span class="button__text"><?= $text ?></span>
    <?php if(isset($textToggle)): ?>
      <span class="button__textToggle"><?= $textToggle ?></span>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (isset($icon) && !$onlyIcon && $iconAfter) : ?>
  <span class="button__icon button__icon--after icon-<?= $icon ?>"></span>
  <?php endif; ?>
<?php if (isset($url)) : ?>
</a>
<?php else : ?>
</button>
<?php endif; ?>