<?php
  namespace ThemeClasses\Taxonomy;

  class Helpers {
    public function __construct()
    {
      add_filter('getTermsValues', [$this, 'getTermsValues'], 10, 1);
      add_filter('getTermsObjects', [$this, 'getTermsObjects'], 10, 1);
      add_filter('mapTermsValues', [$this, 'mapTermsValues'], 10, 1);
      add_filter('getTermsObjectsDetails', [$this, 'getTermsObjectsDetails'], 10, 2);
    }

    public function getTermsValues($term) {
      $terms = get_terms(array(
        'taxonomy' => $term,
      ));

      return (is_array($terms)) ? array_map(function($item) {
        return $item->term_id;
      }, $terms) : [];
    }

    public function mapTermsValues($term) {
      return (is_array($term)) ? array_map(function($item) {
        return $item->term_id;
      }, $term) : [];
    }

    public function getTermsObjects($term) {
      $terms = get_terms(array(
        'taxonomy' => $term,
        'exclude' => [1]
      ));

      return (is_array($terms)) ? array_map(function($item) {
        return [
          'term_id' => $item->term_id,
          'name' => $item->name,
          'taxonomy' => $item->taxonomy
        ];
      }, $terms) : [];
    }

    public function getTermsObjectsDetails($term_name, $terms) {
      if (!is_array($terms) || count($terms) == 0) return [];

      $terms = get_terms(array(
        'taxonomy' => $term_name,
        'include' => $terms
      ));

      return (is_array($terms)) ? array_map(function($item) {
        return [
          'term_id' => $item->term_id,
          'name' => $item->name,
          'taxonomy' => $item->taxonomy
        ];
      }, $terms) : [];
    }
  }