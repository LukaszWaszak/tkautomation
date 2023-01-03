<?php
  $postID = get_the_ID();
  $category = get_the_terms($postID, 'category');
  $advancement = get_the_terms($course->ID, 'advancement');
  $lessonsCount = get_field('course_lesson_count', $postID);
  $courseType = get_the_terms($postID, 'course-type');

  $items = [
    [
      'icon' => get_template_directory_uri().'/public/images/camera.svg',
      'name' => __('Forma kursu', 'tutlo'),
      'value' => $courseType[0]->name
    ],
    [
      'icon' => get_template_directory_uri().'/public/images/lessons_icon.svg',
      'name' => __('Liczba lekcji', 'tutlo'),
      'value' => $lessonsCount
    ],
    [
      'icon' => get_template_directory_uri().'/public/images/group_icon.svg',
      'name' => __('Dla kogo?', 'tutlo'),
      'value' => $category[0]->name
    ],
    [
      'icon' => get_template_directory_uri().'/public/images/advance_icon.svg',
      'name' => __('Poziom zaawansowania', 'tutlo'),
      'value' => $advancement[0]->name
    ]
  ];
?>

<section class="section section--padding-none courseDetails">
  <div class="container">
    <div class="courseDetails__wrapper">
      <div class="courseDetails__list">
      <?php foreach($items as $key => $item): ?>
        <div class="courseDetails__item">
          <div class="courseDetails__itemIcon">
            <div class="courseDetails__itemIconWrapper">
              <div class="courseDetails__itemIconInner">
              <?php get_template_part('/includes/components/image/imageBox', null, [
                'image' => [
                  'url' => $item['icon'],
                  'alt' => ''
                ]
              ]) ?>
              </div>
            </div>
          </div>
          <div class="courseDetails__itemData">
            <div class="courseDetails__itemName">
              <p class="p"><?= $item['name'] ?></p>
            </div>
            <div class="courseDetails__itemValue">
              <h5><?= $item['value'] ?></h5>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>