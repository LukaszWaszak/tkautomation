<?php
  namespace ThemeClasses\Handlers;
  use ThemeClasses\Handlers\RequestHandler;

  class YoutubeVideos {
    public function __construct() {
      $this->requestHandler = new RequestHandler();
      $this->lang = pll_current_language();
      $this->jsonDir = THEME_DIR.'assets/json/';

      add_action('wp_ajax_getytvideos', array($this, 'getLatestVideos') );
      add_action('wp_ajax_nopriv_getytvideos', array($this, 'getLatestVideos') );
    }

    public function getLatestVideos() {
      $params = $_POST;
      $apiKey = (function_exists('get_field')) ? get_field('google_api_key', 'option') : null;
      $channelID = (function_exists('get_field')) ? get_field('youtube_channel_id', 'option') : null;
      $apiBaseUrl = 'https://www.googleapis.com/youtube/v3/search';

      $data = [];
      $results = [];
      if (is_null($apiKey) || is_null($channelID)) wp_send_json_error($data, 400);

      $url = $apiBaseUrl.'?channelId='.$channelID.'&part=snippet,id&order=date&maxResults=5&key='.$apiKey;
      $results = $this->requestHandler->handleRequest($url);

      if ($results != false) $results = $results->items;
      $dir = $this->jsonDir.'youtube_videos.json';

      if (count($results)) {
        foreach($results as $key => $item) {
          $videoInfo = $item->snippet;
          $videoInfo = static::getResourceData($item->id, $videoInfo);

          $data[] = $videoInfo;
        }
      }

      file_put_contents($dir, json_encode($data));
      wp_send_json_success($data);
      exit;
    }

    public static function getResourceData($id, $snippet) {
      $date = date('d.m.Y', strtotime($snippet->publishedAt));
      $thumbnail = $snippet->thumbnails->high->url;
      $description = $snippet->description;
      $url = 'https://www.youtube.com/watch?v='.$id->videoId;

      return [
        'date' => $date,
        'thumbnail' => $thumbnail,
        'description' => $description,
        'url' => $url,
      ];
    }
  }