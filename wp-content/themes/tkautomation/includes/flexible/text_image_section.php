<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $header = $section['header'];
  $subtitle = $section['subtitle'];
  $text = $section['text'];
  $image = $section['image'];
  $imageLeft = $section['image_left'];
  $showVideo = $section['show_video'];
  $videoGroup = $section['video'];
  $external = $videoGroup['external'];
  $video = $videoGroup['video'];
  $videoExternal = $videoGroup['video_external'];
  $button = $section['button'];

  $rootClass .= ($imageLeft) ? 'textImageSection--imageLeft' : '';
  $rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';
?>

<section class="section textImageSection <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="textImageSection__wrapper">
      <?php if ($imageLeft): ?>
        <?php if(!$showVideo):?>
        <div class="textImageSection__image">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
        <?php else: ?>
        <?php if($external):?>
        <div class="textImageSection__video">
        <?php get_template_part('/includes/components/video/videoBox', null, [
          'video' => $videoExternal,
          'image' => $image
        ]) ?>
        </div>
        <?php else: ?>
          <div class="textImageSection__video">
        <?php get_template_part('/includes/components/video/videoBox', null, [
          'video' => $video['url'],
          'image' => $image

        ]) ?>
        </div>
      <?php endif; ?>
      <?php endif; ?>
      <?php endif; ?>
      <div class="textImageSection__text">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'subtitle' => $subtitle,
          'text' => $text,
          'headerTag' => 'h4',
          'textTag' => 'p',
          'isTextBig' => true
        ]); ?>
        <?php if (!is_null($button) && $button['active']): ?>
          <div class="textImageSection__button">
          <?php get_template_part('/includes/components/button', null, [
            'text' => $button['text'],
            'url' => $button['link']['url']
          ]) ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!$imageLeft): ?>
        <?php if(!$showVideo):?>
        <div class="textImageSection__image">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
        <?php else: ?>
        <?php if($external):?>
        <div class="textImageSection__video">
        <?php get_template_part('/includes/components/video/videoBox', null, [
          'video' => $videoExternal
        ]) ?>
        </div>
        <?php else: ?>
          <div class="textImageSection__video">
        <?php get_template_part('/includes/components/video/videoBox', null, [
          'video' => $video
        ]) ?>
        </div>
      <?php endif; ?>
      <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>