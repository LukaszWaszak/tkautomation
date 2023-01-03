<?php
  namespace ThemeClasses\Helpers;

  class Post {
    public function __construct() {
      add_filter('getPopularPosts', [$this, 'getPopularPosts'], 10, 1);
      add_filter('getPostDetails', [$this, 'getPopularDetails'], 10, 1);
    }

    public function getPopularPosts($id) {
      $popular = get_field('blog_popular', $ID);

      if (is_null($popular)) return [];
      $results = [];

      foreach($popular as $key => $item) {
        $details = static::getPopularDetails($item);
        $results[] = $details;
      }

      return $results;
    }

    public static function getPopularDetails($post) {
      $id = $post->ID;
      $thumbnailID = get_post_thumbnail_id($id);
      $thumbnail = wp_get_attachment_image_src($thumbnailID, 'post-thumbnail');
      $thumbnailAlt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', TRUE);

      return [
        'title' => $post->post_title,
        'url' => get_permalink($id),
        'image' => [
          'url' => ($thumbnail != false) ? $thumbnail[0] : '',
          'alt' => $thumbnailAlt
        ]
      ];
    }
  }