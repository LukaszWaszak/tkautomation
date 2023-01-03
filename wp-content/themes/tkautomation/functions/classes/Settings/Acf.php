<?php
  namespace ThemeClasses\Settings;

  class Acf {
    public function __construct() {
      $this->jsonDir = THEME_DIR.'assets/json/';
      $this->lang = pll_current_language();

      add_filter('acf/load_field/name=google_reviews_list', [$this, 'populateGoogleReviews']);
    }

    public function populateGoogleReviews($field) {
      if ($field['type'] !== 'select') return $field;

      if (is_admin()) {
        $screen = get_current_screen();
        if ($screen !== null && $screen->post_type === 'acf-field-group') return $field;
      }

      $field['choices'] = array();

      $dir = $this->jsonDir.'google_reviews_'.$this->lang.'.json';
      if (!file_exists($dir)) return $field;

      $savedReviews = json_decode(file_get_contents($dir));
      $values = [];

      if (is_null($savedReviews)) return $field;

      foreach($savedReviews->reviews as $key => $item) {
        $value = json_encode($item);
        $date = date('d-m-Y', $item->time);
        $label = 'Ocena: '.$item->rating.' | Data: '.$date.' | Autor: '.$item->author_name.' | Treść: '.$item->text;

        $values[$value] = $label;
      }

      if (count($values)) $field['choices'] = $values;
      return $field;
    }
  }