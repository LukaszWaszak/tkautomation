<?php
  $postID = get_the_ID();
  $title = get_the_title($postID);
  $text = get_the_content($postID);
  $thumbnail = get_the_post_thumbnail_url($postID);
  $courseLessons = get_field('course_lessons', $postID);

  $mainButton = $courseLessons['main_button'];
  $secondaryButton = $courseLessons['secondary_button'];
?>

<section class="section section--padding-none courseHero" data-section>
  <div class="container">
    <div class="courseHero__wrapper">
      <div class="courseHero__intro">
        <div class="courseHero__introTag">
        <?php get_template_part('/includes/components/tag', null, [
          'text' => __('Dołącz do kursu', 'tutlo')
        ]) ?>
        </div>
        <div class="courseHero__text">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $title,
          'text' => $text,
          'headerTag' => 'h3',
          'textTag' => 'p',
          'isTextBig' => true
        ]) ?>
        </div>
        <div class="courseHero__thumbnail">
          <div class="courseHero__thumbnailInner">
          <?php get_template_part('/includes/components/image/imageBox', null, [
            'image' => [
              'url' => $thumbnail,
              'alt' => ''
            ]
          ]) ?>
          </div>
        </div>
      </div>
      <div class="courseHero__lessons">
        <div class="courseHero__lessonsTag">
        <?php get_template_part('/includes/components/tag', null, [
          'text' => $courseLessons['title']
        ]) ?>
        </div>
        <div class="courseHero__lessonsList textEditor">
        <?= $courseLessons['list'] ?>
        </div>
        <div class="courseHero__buttons">
          <?php if (!is_null($mainButton) && $mainButton['active']): ?>
            <div class="courseHero__button">
            <?php get_template_part('/includes/components/button', null, [
              'text' => $mainButton['text'],
              'url' => $mainButton['link']['url']
            ]) ?>
            </div>
          <?php endif; ?>
          <?php if (!is_null($secondaryButton) && $secondaryButton['active']): ?>
            <div class="courseHero__button">
            <?php get_template_part('/includes/components/button', null, [
              'text' => $secondaryButton['text'],
              'url' => $secondaryButton['link']['url'],
              'theme' => 'transparent'
            ]) ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>