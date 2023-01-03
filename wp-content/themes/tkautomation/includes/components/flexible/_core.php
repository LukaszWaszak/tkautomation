<?php
  /* ---
  Auto-loading Flexible Content Field (ACF)
  --- */
  $ID = get_the_ID();
  $sections = get_field('article_content', $ID);

  if ($sections) {
    foreach ($sections as $index => $section) {
      $path = __DIR__ . '/' . $section['acf_fc_layout'] . '.php';
      if (file_exists($path)) {
        include $path;
      } else {
        error_log(sprintf(
          'Undefined section `%s` in Flexible Content Field: %s',
          $section['acf_fc_layout'],
          PHP_EOL . __FILE__
        ));
      }
    }
  }