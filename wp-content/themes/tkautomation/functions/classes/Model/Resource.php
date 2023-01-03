<?php
  namespace ThemeClasses\Model;

  class Resource
  {
    public function __construct()
    {
      add_filter('getRelatedResources', [$this, 'getRelatedResources'], 10, 4);
    }

    public function getRelatedResources($type, $topic, $audience, $exclude) {
      $args = [
        'post_type' => 'resource',
        'posts_per_page' => 4,
        'post__not_in' => [$exclude]
      ];

      $args['tax_query'] = [
        'relation' => 'OR',
      ];

      array_push($type, array(
        'taxonomy' => 'resource_type',
        'terms' => $type
      ));

      if (isset($audience)) {
        array_push($args['tax_query'], array(
          'taxonomy' => 'audience',
          'terms' => $audience
        ));
      }

      if (isset($topic)) {
        array_push($args['tax_query'], array(
          'taxonomy' => 'topic',
          'terms' => $topic
        ));
      }

      $query = new \WP_Query($args);
      $resources = $query->posts;
      $results = [];

      foreach($resources as $key => $item) {
        $item = static::getResourceDetails($item);
        $results[] = $item;
      }

      return $results;
    }

    public static function getResourceDetails($item) {
      $url = get_the_permalink($item->ID);
      $thumbnail = get_the_post_thumbnail_url($item->ID);
      $title = get_the_title($item->ID);

      return [
        'id' => $item->ID,
        'url' => $url,
        'title' => $title,
        'thumbnail' => $thumbnail,
      ];
    }
  }