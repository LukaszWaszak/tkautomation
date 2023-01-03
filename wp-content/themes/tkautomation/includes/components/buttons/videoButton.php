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

  if ($onlyIcon) $rootClass .= ' videoButton--onlyIcon';
  if ($isBig) $rootClass .= ' videoButton--size-big';

  $iconAfter = (isset($iconAfter) && $iconAfter);

  $rootClass .= ' videoButton--' . (isset($theme) && $theme != '' ? $theme : 'default');
  if (isset($attr)) $rootAttr .= $attr;
?>

<?php if (isset($url)) : ?>
<a href="<?= $url ?>" class="videoButton<?= $rootClass ?>"<?= $rootAttr ?>>
<?php else : ?>
<button class="videoButton<?= $rootClass ?>"<?= $rootAttr ?>>
<?php endif; ?>
  <?php if(isset($icon)): ?>
    <span class="videoButton__icon icon-<?= $icon ?>"></span>
  <?php endif; ?>
<?php if (isset($url)) : ?>
</a>
<?php else : ?>
</button>
<?php endif; ?>