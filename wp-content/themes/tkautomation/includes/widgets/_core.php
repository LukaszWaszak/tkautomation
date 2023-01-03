<?php

  /* ---
    Auto-loading Flexible Content Field (ACF)
    --- */

  if ($args) {
    foreach ($args['widgets'] as $index => $widget) {
      if (isset($widget['is_active']) && !$widget['is_active']) continue;

      $path = __DIR__ . '/' . $widget['acf_fc_layout'] . '-widget.php';
      if (file_exists($path)) {
        include $path;
      } else {
        error_log(sprintf(
          'Undefined widget `%s` in Flexible Content Field: %s',
          $widget['acf_fc_layout'],
          PHP_EOL . __FILE__
        ));
      }
    }
  }
