<?php

  namespace ThemeClasses\Api;

  class Teacher extends \WP_REST_Controller {

    static protected $postTypeName = 'Teacher';
    static protected $postTypeSlug = 'teacher';
    static protected $routeSlug = 'teachers';

    public function __construct() {
      $this->version = '1';
      $this->namespace = 'api/v' . $this->version;
      $this->base = '/' . static::$routeSlug;

      add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    public function registerRoutes() {
      register_rest_route($this->namespace, $this->base, [
        [
          'methods'             => \WP_REST_Server::READABLE,
          'callback'            => [$this, 'getPosts'],
          'permission_callback' => [$this, 'memberPermissionsCheck'],
          'args'                => [
            'category' => [
              'description'       => 'Post category',
              'required'          => false,
            ],
            'lang' => [
              'description' => 'Language',
              'required' => false,
            ]
          ],
          'show_in_index'       => false,
        ],
      ]);
    }

    public function getPosts($request) {
      $lang = pll_current_language();
      $params = $this->getRequestParams($request);
      $args = [
        'post_type' => static::$postTypeSlug,
      ];

      if (isset($params['category'])) {
        $args['tax_query'] = [
          'relation' => 'OR',
          array(
            'taxonomy' => 'speaker',
            'terms' => $params['category']
          )
        ];
      }

      $query = new \WP_Query($args);
      $teachers = $query->posts;

      $results = [];
      foreach($teachers as $key => $teacher) {
        $item = static::getTeacherDetails($teacher);
        array_push($results, $item);
      }

      return new \WP_REST_Response($results, 200);
    }

    /**
      * Check if a given request has access to member actions
      *
      * @param WP_REST_Request $request Full data about the request.
      * @return WP_Error|bool
      */
      public function memberPermissionsCheck($request) {
        return true;
      }

      /**
    * Get and prepare request params
    *
    * @param WP_REST_Request $request Request object
    * @return WP_Error|object $params
    */
    protected function getRequestParams($request) {
      return $request->get_params();
    }

    public static function getTeacherDetails($teacher) {
      $name = get_the_title($teacher->ID);
      $url = get_the_permalink($teacher->ID);
      $thumbnail = get_the_post_thumbnail_url($teacher->ID);
      $desc = get_field('speaker_description', $teacher->ID);
      $country = get_field('speaker_country', $teacher->ID);
      $bio = get_field('speaker_bio', $teacher->ID);
      $competence = get_field('speaker_competence', $teacher->ID);
      $video = get_field('speaker_video', $teacher->ID);
      $status = apply_filters('getSpeakerStatus', $teacher->ID);

      $type = get_the_terms($teacher->ID, 'speaker');
      $tags = get_the_tags($teacher->ID);

      return [
        'name' => $name,
        'url' => $url,
        'thumbnail' => $thumbnail,
        'description' => $desc,
        'country' => (!is_null($country)) ? $country : '',
        'bio' => (!is_null($bio)) ? $bio : '',
        'competence' => (!is_null($competence)) ? $competence : '',
        'video' => (!is_null($video)) ? $video : '',
        'tags' => ($tags) ? $tags : [],
        'type' => (!is_null($type)) ? $type[0]->name : '',
        'status' => $status,
      ];
    }
  }