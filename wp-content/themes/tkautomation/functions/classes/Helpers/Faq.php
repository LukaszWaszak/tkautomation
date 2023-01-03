<?php
  namespace ThemeClasses\Helpers;

  class Faq {
    public function __construct() {
      add_filter('getFaqQuestionDetails', [$this, 'getFaqQuestionDetails'], 10, 1);
    }

    public function getFaqQuestionDetails($item) {
      $details = static::getDetails($item);

      return $details;
    }

    public static function getDetails($item) {
      $title = get_the_title($item->ID);
      $answer = get_the_content('', false, $item->ID);

      return [
        'id' => $item->ID,
        'title' => $title,
        'answer' => $answer
      ];
    }
  }