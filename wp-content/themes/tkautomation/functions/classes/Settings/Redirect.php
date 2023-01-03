<?php
  namespace ThemeClasses\Settings;

  class Redirect {
    public function __construct() {
      add_action('template_redirect', [$this, 'removeAudienceCatPages']);
    }

    public function removeAudienceCatPages() {
      global $wp_query;

      $query = $wp_query->query;
      $cat = $query['category_name'];
      $lang = $query['lang'];

      $categories = ['dla-dzieci', 'for-kids'];

      if( is_category() && in_array($cat, $categories)) {
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit();
      }
    }
  }