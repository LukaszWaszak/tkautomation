<?php
  namespace ThemeClasses\Handlers;
  use ThemeClasses\Handlers\RequestHandler;

  class GoogleReviews {
    public function __construct() {
      $this->requestHandler = new RequestHandler();
      $this->lang = pll_current_language();
      $this->jsonDir = THEME_DIR.'assets/json/';

      add_action('wp_ajax_googlereviews', array($this, 'getLatestReviews') );
      add_action('wp_ajax_nopriv_googlereviews', array($this, 'getLatestReviews') );
    }

    public function getLatestReviews($params) {
      $params = $_POST;
      $apiKey = (function_exists('get_field')) ? get_field('google_api_key', 'option') : null;
      $placeID = (function_exists('get_field')) ? get_field('google_reviews_settings_place_id', 'option') : null;
      $apiBaseUrl = 'https://maps.googleapis.com/maps/api/place/details/json';

      $data = [];
      $results = [];
      if (is_null($placeID) || is_null($apiKey) || !isset($params['fields'])) wp_send_json_success($results);

      $url = $apiBaseUrl.'?place_id='.$placeID.'&fields='.$params['fields'].'&reviews_sort=newest&language='.$this->lang.'&key='.$apiKey;
      $results = $this->requestHandler->handleRequest($url);

      if ($results != false) {
        $data['atmosphere'] = [
          'rating' => $results->result->rating,
          'ratingsCount' => $results->result->user_ratings_total,
        ];
      }

      $results = ($results != false) ? $results->result->reviews : [];
      $results = array_values(array_filter($results, function($item) {
        return $item->rating > 4;
      }));
      $resultsEncoded = json_encode($results);

      if ($resultsEncoded) {
        $dir = $this->jsonDir.'google_reviews_'.$this->lang.'.json';

        if (file_exists($dir)) {
          $reviews = [];
          $savedReviews = json_decode(file_get_contents($dir));

          if (!is_null($savedReviews)) {
            foreach($results as $key => $item) {
              $checkTime = array_filter($savedReviews->reviews, function($saved) use ($item) {
                return $item->time === $saved->time;
              });

              if (!count($checkTime)) {
                array_push($savedReviews->reviews, $item);
              }
            }

            $data['reviews'] = $savedReviews->reviews;
            file_put_contents($dir, json_encode($data));
          } else {
            $data['reviews'] = $results;
            file_put_contents($dir, json_encode($data));
          }
        } else {
          $data['reviews'] = $results;
          file_put_contents($dir, json_encode($data));
        }
      }

      wp_send_json_success($data);
      exit;
    }
  }