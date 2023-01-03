<?php
  $text = $args['text'];
  $logo = $args['logo'];
?>
<div class="businessReviewCard">
  <div class="businessReviewCard__wrapper">
    <div class="businessReviewCard__text">
      <p class="p p--big"><?= $text ?></p>
    </div>
    <div class="businessReviewCard__logo">
    <?php get_template_part('/includes/components/image/imageBox', null, [
      'image' => $logo
    ]); ?>
    </div>
  </div>
</div>