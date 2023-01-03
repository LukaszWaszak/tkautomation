<?php
  namespace ThemeClasses\Handlers;
  use ThemeClasses\Handlers\RequestHandler;

  class Map {
    public function __construct() {
      $this->requestHandler = new RequestHandler();
      $this->lang = pll_current_language();
      $this->jsonDir = THEME_DIR.'assets/json/';

      add_action('acf/save_post', [$this, 'onMapUpdate'], 12, 1);
    }

    public function onMapUpdate($postId) {
      $mapPoints = get_field('map_points', $postId);
      if (!isset($mapPoints)) return;

      $this->handleSave($mapPoints, $postId);

      return $value;
    }

    private function handleSave($data, $postId) {
      $apiKey = (function_exists('get_field')) ? get_field('google_api_key', 'option') : null;
      $apiBaseUrl = 'https://maps.googleapis.com/maps/api/place/details/json?fields=formatted_address,international_phone_number,url,rating,name,url,geometry/location';
      $fieldValues = [];

      foreach($data as $key => $item) {
        $placeID = $item['place_id'];
        $url = $apiBaseUrl.'&place_id='.$placeID.'&language='.$this->lang.'&key='.$apiKey;
        $results = $this->requestHandler->handleRequest($url);
        $result = [];

        if ($results != false) {
          $place = $results->result;

          $name = $place->name;
          $address = $place->formatted_address;
          $contact = $place->international_phone_number;
          $lat = $place->geometry->location->lat;
          $lng = $place->geometry->location->lng;
          $rating = $place->rating;
          $placeUrl = $place->url;

          $result['place_id'] = $placeID;
          $result['one_line_summary'] = $item['one_line_summary'];
          $result['photo'] = $item['photo'];
          $result['name'] = $name;
          $result['address'] = $address;
          $result['contact'] = $contact;
          $result['coordinates']['latitude'] = $lat;
          $result['coordinates']['longitude'] = $lng;
          $result['rating'] = $rating;
          $result['place_url'] = $placeUrl;

          array_push($fieldValues, $result);
        }
      }

      update_field('map_points_hidden', $fieldValues, $postId);
    }
  }
