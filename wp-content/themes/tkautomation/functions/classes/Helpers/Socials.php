<?php
  namespace ThemeClasses\Helpers;

  class Socials {
    public function __construct() {
      $this->lang = pll_current_language();
      $this->jsonDir = THEME_DIR.'assets/json/';

      add_filter('getSocialPosts', [$this, 'getSocialPosts'], 10, 0);
      add_filter('getSocialSourceData', [$this, 'getSocialSourceData'], 10, 1);
    }

    public function getSocialPosts() {
      $results = [];
      $youtube = $this->getYoutube();
      $instagram = $this->getInstagram();

      $results = array_merge($youtube, $instagram);
      usort($results, [$this, 'compareDates']);

      return $results;
    }

    private function getYoutube() {
      $results = [];
      $dir = $this->jsonDir.'youtube_videos.json';

      if (!file_exists($dir)) return $results;
      $results = file_get_contents($dir);

      if ($results != false) {
        $results = json_decode($results);

        if (is_array($results) && count($results)) {
          foreach($results as $key => $item) {
            $item->type = 'youtube';
          }
        }
      }

      return $results;
    }

    private function getInstagram() {
      $results = [];
      $dir = $this->jsonDir.'instagram_posts.json';

      if (!file_exists($dir)) return $results;
      $results = file_get_contents($dir);

      if ($results != false) {
        $results = json_decode($results);

        if (is_array($results) && count($results)) {
          foreach($results as $key => $item) {
            $item->type = 'instagram';
          }
        }
      }

      return $results;
    }

    public function getSocialSourceData($type) {
      $data = [];

      if ($type == 'instagram') {
        $data = [
          'thumbnail' => (function_exists('get_field')) ? get_field('instagram_channel_image', 'options') : '',
          'profile_name' => (function_exists('get_field')) ? get_field('instagram_channel_name', 'options') : '',
          'logo' => THEME_URL.'/assets/images/instagram.png',
        ];
      } else if ($type == 'youtube') {
        $data = [
          'thumbnail' => (function_exists('get_field')) ? get_field('youtube_channel_thumbnail', 'options') : '',
          'profile_name' => (function_exists('get_field')) ? get_field('youtube_channel_name', 'options') : '',
          'logo' => THEME_URL.'/assets/images/YouTube_logo.png',
        ];
      } else {
        $data = [
          'thumbnail' => '',
          'profile_name' => '',
          'logo' => '',
        ];
      }

      return $data;
    }

    public function compareDates($item1, $item2) {
      $date1 = strtotime($item1->date);
      $date2 = strtotime($item2->date);

      return $date2 <=> $date1;
    }
  }
