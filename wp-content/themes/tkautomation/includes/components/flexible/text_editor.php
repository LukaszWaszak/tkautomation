<?php
  $editor = $section['editor'];

  $editor = (is_null($section)) ? $args['editor'] : $editor;
?>

<div class="textEditor textEditor--list-normal">
  <article class="textEditor__content">
    <?= $editor ?>
  </article>
</div>