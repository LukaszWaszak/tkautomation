<?php
  $item = $args['item'];
?>

<div class="stackedReviewCard">
  <div class="stackedReviewCard__wrapper">
    <div class="stackedReviewCard__top">
      <?php if ($item['is_video']): ?>
        <div class="stackedReviewCard__video">
          <div class="stackedReviewCard__videoInner">
            <div class="stackedReviewCard__videoPlay">
            <?php get_template_part('/includes/components/buttons/videoButton', null, [
              'icon' => 'play-fill',
              'attr' => 'data-button-video-popup',
              'url' => $item['video']['url']
            ]) ?>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="stackedReviewCard__text">
          <p class="p"><?= $item['text'] ?></p>
        </div>
      <?php endif; ?>
    </div>
    <div class="stackedReviewCard__bottom">
      <div class="stackedReviewCard__thumbnail">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $item['image']
      ]) ?>
      </div>
      <div class="stackedReviewCard__author">
        <div class="stackedReviewCard__authorName">
          <p class="p p--big"><?= $item['name'] ?></p>
        </div>
        <div class="stackedReviewCard__authorCaption">
          <p class="p"><?= $item['caption'] ?></p>
        </div>
      </div>
    </div>
  </div>
</div>