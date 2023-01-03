<?php
  $rootClass = '';

  $postID = get_the_ID();
  $categories = wp_get_post_categories($postID);

  $header = $section['header'];
  $button = $section['button'];
  $maxCount = $section['max_count'];

  $hasActiveButton = (!is_null($button) && $button['active']);

  $args = [
    'post_type' => 'course',
    'posts_per_page' => $maxCount,
    'post__not_in' => array($postID)
  ];

  if (!is_null($categories)) $args['category__in'] = $categories;
  $related = new WP_Query($args);
  $relatedCourses = $related->posts;

  $rootClass .= ($hasActiveButton) ? 'relatedCourses--withButton' : '';
?>

<section class="section relatedCourses <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="relatedCourses__top">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4'
      ]) ?>
      <?php if ($hasActiveButton): ?>
        <div class="relatedCourses__button">
        <?php get_template_part('/includes/components/button', null, [
          'text' => $button['text'],
          'url' => $button['link']
        ]) ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="relatedCourses__list">
    <?php foreach($relatedCourses as $key => $item):
       $url = get_the_permalink($item->ID);
       $title = get_the_title($item->ID);
       $thumbnail = get_the_post_thumbnail_url($item->ID);
       $advancement = get_the_terms($item->ID, 'advancement');
       $advancementColor = (!is_null($advancement)) ? get_field('advancement_color', $advancement[0]) : '';
       $lessonsCount = get_field('course_lesson_count', $item->ID);
       $courseType = get_the_terms($item->ID, 'course-type');
       $tags = get_the_tags($item->ID);
       $tagColor = (!is_null($tags)) ? get_field('tag_color', $tags[0]) : '';
    ?>
      <div class="relatedCourse__item">
      <?php get_template_part('/includes/components/cards/courseCard', null, [
        'url' => $url,
        'image' => $thumbnail,
        'tag' => (!is_null($tags)) ? $tags[0] : null,
        'tagColor' => $tagColor,
        'title' => $title,
        'level' => (!is_null($advancement)) ? $advancement[0] : null,
        'levelColor' => $advancementColor,
        'lessonsCount' => (!is_null($lessonsCount)) ? $lessonsCount : 0,
        'courseType' => (!is_null($courseType)) ? $courseType[0] : null,
      ]) ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>