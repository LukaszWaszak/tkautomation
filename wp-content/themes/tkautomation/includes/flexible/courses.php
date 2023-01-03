<?php

  $variant = $section['variant'];
  $perPage = $section['per_page'];
  $useLevels = $section['use_levels'];
  $header = $section['header'];
  $tag = $section['tag'];
  $tags = $section['filter_tags'];
  $categories = $section['categories'];

  $filterAll = $section['filter_all'];

  $text = $section['text'];
  $button = $section['button'];

  $categoriesList = [];
  foreach($categories as $key => $cat) {
    $category = get_term($cat);

    array_push($categoriesList, [
      'id' => $category->term_id,
      'name' => $category->name
    ]);
  }

  $tagsObj = apply_filters('getTermsObjectsDetails', 'post_tag', $tags);

  $levelList = [];

  $courses = apply_filters('getCoursesByCategories', $categories);
  $apiURL = $baseURL.'/wp-json/api/v1/';
  $locale = [
    "notFound" => __('Nie znaleziono kursów', 'tutlo'),
    "type" => __('Typ kursu', 'tutlo'),
    "lessons" => __('Liczba lekcji', 'tutlo'),
    "more" => __('Dowiedz się więcej', 'tutlo'),
    'levelLabel' => __('Poziom zaawansowania', 'tutlo'),
    'level' => __('Wybierz poziom', 'tutlo'),
    'all' => __('Wszystkie', 'tutlo'),
    'page' => __('Strona', 'tutlo'),
    'pageOf' => __('z', 'tutlo')
  ];

  if (!is_null($useLevels) && $useLevels) {
    $levels = $section['level'];

    if (!is_null($levels)) {
      foreach($levels as $key => $lvl) {
        $level = get_term_by('id', $lvl, 'advancement');

        array_push($levelList, [
          'id' => $level->term_id,
          'name' => $level->name
        ]);
      }
    }
  }
?>

<section class="section courses" data-section>
  <div class="container">
    <div class="courses__top">
      <?php if (!is_null($tag) && $tag != ''): ?>
      <div class="courses__tag">
      <?php get_template_part('/includes/components/tag', null, [
        'text' => $tag
      ]) ?>
      </div>
      <?php endif; ?>
      <div class="courses__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => (is_null($variant) || $variant == 'default') ? 'h3' : 'h4',
        'text' => $text,
        'isTextBig' => true
      ]) ?>
      </div>
    </div>
    <div class="courses__list" data-vue-component>
      <?php if (is_null($variant) || $variant == 'default'): ?>
        <v-courses-slider
          :api='<?= json_encode($apiURL) ?>'
          :tags='<?= json_encode($tagsObj) ?>'
          :categories='<?= json_encode($categoriesList) ?>'
          :locale='<?= json_encode($locale) ?>'
          :button='<?= json_encode($button) ?>'
        >
        </v-courses-slider>
      <?php endif; ?>
      <?php if ($variant == 'list'): ?>
        <v-courses-list
          :api='<?= json_encode($apiURL) ?>'
          :filter-all='<?= json_encode($filterAll) ?>'
          :tags='<?= json_encode($tagsObj) ?>'
          :categories='<?= json_encode($categoriesList) ?>'
          :per-page='<?= json_encode(intval($perPage)) ?>'
          :levels='<?= json_encode($levelList) ?>'
          :locale='<?= json_encode($locale) ?>'
          :button='<?= json_encode($button) ?>'
        >
        </v-courses-list>
      <?php endif; ?>
    </div>
  </div>
</section>