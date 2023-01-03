<?php
  namespace ThemeClasses\Handlers;
  use ThemeClasses\Handlers\RequestHandler;

  class Flexible {
    public function __construct() {
      $this->requestHandler = new RequestHandler();
      $this->lang = pll_current_language();
      $this->jsonDir = THEME_DIR.'assets/json/';

      add_action('acf/save_post', [$this, 'onFlexibleUpdate'], 12, 1);
    }

    public function onFlexibleUpdate($postId) {
      $sections = get_field('sections', $postId);
      var_dump($sections);
      $this->contactInviteUpdate($sections, $postId);

      return $value;
    }

    private function contactInviteUpdate($data, $postId) {
      $apiKey = (function_exists('get_field')) ? get_field('google_api_key', 'option') : null;
      $apiBaseUrl = 'https://maps.googleapis.com/maps/api/place/details/json?fields=formatted_address,international_phone_number,url,rating,name,url,geometry/location';

      $contactInvites = array_filter($data, function($item) {
        return $item['acf_fc_layout'] == 'contact_invite';
      });

      foreach($contactInvites as $key => $item) {
        $field = $this->setContactMapData($item, $apiKey, $apiBaseUrl, $postId);
        var_dump($field);

        update_field('sections_contact_invite', $field, $postId);
      }
    }

    public function setContactMapData($item, $apiKey, $apiUrl, $postId) {
      if ($item['show_map'] && !is_null($apiKey)) {
        $placeID = $item['map']['place_id'];
        $url = $apiUrl.'&place_id='.$placeID.'&language='.$this->lang.'&key='.$apiKey;
        $results = $this->requestHandler->handleRequest($url);

        if ($results != false) {
          $place = $results->result;

          $item['map']['address'] = $place->formatted_address;
          $item['map']['url'] = $place->url;
        }
      }

      return $item;
    }
  }
