<?php
  $rootClass = '';
  $image = $section['image'];


  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section backgroundImageSection <?= $rootClass ?>" data-section>
  <div class="backgroundImage" style="background-image:url('<?= $image['url'] ?>')">
  </div>
</section>