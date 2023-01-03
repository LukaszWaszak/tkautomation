<?php
  $rootClass = '';

  $image = $args['image'];
  $header = $args['header'];
  $text = $args['text'];
  $reversed = $args['reversed'] || false;
  $numbers = $args['numbers'] || false;
  $numberValue = $args['numberValue'];
?>

<div class="imageDotCard <?= $rootClass ?>">
  <?php if (!$reversed): ?>
    <div class="imageDotCard__image">
      <div class="imageDotCard__imageWrapper">
        <div class="imageDotCard__imageInner">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
      </div>
    </div>
    <div class="imageDotCard__divider">

    </div>
  <?php endif; ?>
  <div class="imageDotCard__text">
  <?php get_template_part('/includes/components/text', null, [
    'header' => $header,
    'text' => $text,
    'headerTag' => 'h5',
  ]) ?>
  </div>
  <?php if ($reversed): ?>

    <div class="imageDotCard__divider">
    <?php //if(!$numbers):?>
      <!-- <div class="imageDotCard__dot"></div> -->
      <?php //else:?>
       <!-- <div class="imageDotCard__dot"> -->
        <!-- <div class="imageDotCard__dot__value"> -->
         <!-- $numberValue?> -->
        <!-- </div> -->
      <!-- </div> -->
<?php //ndif;?>
    </div> 
    <div class="imageDotCard__image">
      <div class="imageDotCard__imageWrapper">
        <div class="imageDotCard__imageInner">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>