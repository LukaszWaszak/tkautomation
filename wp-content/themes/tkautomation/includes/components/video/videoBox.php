<?php
  $rootClass = '';

  $video = $args['video'];
  $image = $args['image'];
  $theme = $args['theme'];
  $autoHeight = $args['autoHeight'];


  $rootClass .= (isset($theme) && $theme != '') ? ' videoBox--'.$theme : '';
  $rootClass .= (isset($autoHeight) && $autoHeight) ? ' videoBox--autoHeight' : '';
?>

<div class="videoBox <?= $rootClass ?>">
<div class="videoBox__wrapper" data-video-textImage data-video-textImage-src="<?=$video?>">
  <div class="videoBox__img">
    <img src="<?=$image['url']?>" alt="">
  </div>
  <div class="videoBox__more">
      <?php get_template_part('/includes/components/buttons/videoButton', null, [
        'icon' => 'play-fill',
        'attr' => 'data-video-textimage-play'
      ]) ?>
      </div>
</div>
</div>