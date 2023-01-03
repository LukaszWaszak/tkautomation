<?php
  $rootClass = '';

  $image = $args['image'];
  $theme = $args['theme'];
  $autoHeight = $args['autoHeight'];


  $rootClass .= (isset($theme) && $theme != '') ? ' imageBox--'.$theme : '';
  $rootClass .= (isset($autoHeight) && $autoHeight) ? ' imageBox--autoHeight' : '';
?>

<div class="imageBox <?= $rootClass ?>">
  <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" />
</div>