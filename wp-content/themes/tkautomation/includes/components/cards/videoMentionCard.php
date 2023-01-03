<?php
  $name = $args['name'];
  $caption = $args['caption'];
  $preview = $args['preview'];
  $video = $args['video'];

  $videoSrc = '';
  if (!is_null($video)) {
    $videoSrc = ($video['is_external']) ? $video['url'] : $video['file']['url'];
  }
?>
<div class="videoMentionCard" data-video-mention data-video-mention-src="<?= $videoSrc ?>">
  <div class="videoMentionCard__wrapper">
    <div class="videoMentionCard__preview">
      <div class="videoMentionCard__previewInner">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $preview
      ]) ?>
      </div>
      <div class="videoMentionCard__more">
      <?php get_template_part('/includes/components/buttons/videoButton', null, [
        'icon' => 'play-fill',
        'attr' => 'data-video-mention-play',
      ]) ?>
      </div>
    </div>
    <div class="videoMentionCard__author">
      <div class="videoMentionCard__authorName">
        <h5><?= $name ?></h5>
      </div>
      <div class="videoMentionCard__authorCaption">
        <h6><?= $caption ?></h6>
      </div>
    </div>
  </div>
</div>