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

  if ($onlyIcon) $rootClass .= ' navButton--onlyIcon';
  if ($isBig) $rootClass .= ' navButton--size-big';

  $iconAfter = (isset($iconAfter) && $iconAfter);

  $rootClass .= ' navButton--' . (isset($theme) && $theme != '' ? $theme : 'default');
  if (isset($attr)) $rootAttr .= $attr;
?>

<?php if (isset($url)) : ?>
<a href="<?= $url ?>" class="navButton<?= $rootClass ?>"<?= $rootAttr ?>>
<?php else : ?>
<button class="navButton<?= $rootClass ?>"<?= $rootAttr ?>>
<?php endif; ?>
  <?php if(isset($icon)): ?>
    <span class="navButton__icon icon-<?= $icon ?>"></span>
  <?php endif; ?>
<?php if (isset($url)) : ?>
</a>
<?php else : ?>
</button>
<?php endif; ?>