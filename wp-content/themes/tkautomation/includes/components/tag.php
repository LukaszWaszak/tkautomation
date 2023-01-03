<?php
  $rootClass = '';

  $text = $args['text'];
  $theme = 'default';

  $theme = (isset($args['theme']) && $args['theme'] != '') ? $args['theme'] : $theme;

  $rootClass .= ' tag--theme-'.$theme;
?>
<div class="tag <?= $rootClass ?>">
  <p class="tag__text p p--big">
    <?= $text ?>
  </p>
</div>