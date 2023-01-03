<?php
  namespace ThemeClasses\Handlers;
  use ThemeClasses\Handlers\RequestHandler;

  class InstagramPosts {
    public function __construct() {
      $this->requestHandler = new RequestHandler();
      $this->lang = pll_current_language();
      $this->jsonDir = THEME_DIR.'assets/json/';

      add_action('wp_ajax_getinstagramposts', array($this, 'getLatestPosts') );
      add_action('wp_ajax_nopriv_getinstagramposts', array($this, 'getLatestPosts') );
    }

    public function getLatestPosts() {
      $params = $_POST;
      $apiKey = (function_exists('get_field')) ? get_field('instagram_api_key', 'option') : null;
      $apiBaseUrl = 'https://graph.instagram.com/me/media';

      $data = [];
      $results = [];
      if (is_null($apiKey)) wp_send_json_error($data, 400);

      $url = $apiBaseUrl.'?fields=id,username,media_type,media_url,timestamp,permalink,caption&limit=5&access_token='.$apiKey;
      $results = $this->requestHandler->handleRequest($url);

      if ($results != false) $results = $results->data;
      $dir = $this->jsonDir.'instagram_posts.json';

      if (count($results)) {
        foreach($results as $key => $item) {
          $videoInfo = static::getResourceData($item);
          $data[] = $videoInfo;
        }
      }

      file_put_contents($dir, json_encode($data));
      wp_send_json_success($data);
      exit;
    }

    public static function getResourceData($item) {
      $date = date('d.m.Y', strtotime($item->timestamp));
      $thumbnail = $item->media_url;
      $description = $item->caption;
      $url = $item->permalink;

      return [
        'date' => $date,
        'thumbnail' => $thumbnail,
        'description' => $description,
        'url' => $url,
      ];
    }
  }