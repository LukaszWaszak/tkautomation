<?php
  $date = $args['date'];
  $thumbnail = $args['thumbnail'];
  $url = $args['url'];
  $description = $args['description'];
  $type = $args['type'];

  $channelData = apply_filters('getSocialSourceData', $type);
?>

<div class="socialPostCard">
  <div class="socialPostCard__wrapper">
    <div class="socialPostCard__top">
      <div class="socialPostCard__profile">
        <div class="socialPostCard__avatar">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $channelData['thumbnail'],
        ]); ?>
        </div>
        <div class="socialPostCard__data">
          <div class="socialPostCard__author">
            <p class="p p--big"><?= $channelData['profile_name']; ?></p>
          </div>
          <div class="socialPostCard__date">
            <p class="p"><?= $date ?></p>
          </div>
        </div>
      </div>
      <div class="socialPostCard__socialImage">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => [
          'url' => $channelData['logo'],
          'alt' => 'Logo - '.$type
        ]
      ]); ?>
      </div>
    </div>
    <div class="socialPostCard__thumbnail">
      <div class="socialPostCard__thumbnailInner">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => [
          'url' => $thumbnail,
          'alt' => 'Social post'
        ]
      ]) ?>
      </div>
      <div class="socialPostCard__more">
      <?php get_template_part('/includes/components/button', null, [
        'text' => __('Zobacz cały post', 'tutlo'),
        'url' => $url
      ]) ?>
      </div>
    </div>
    <div class="socialPostCard__description">
      <p class="p"><?= $description ?></p>
    </div>
  </div>
</div>