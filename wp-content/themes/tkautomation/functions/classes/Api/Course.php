<?php

  namespace ThemeClasses\Api;

  class Course extends \WP_REST_Controller {

    static protected $postTypeName = 'Course';
    static protected $postTypeSlug = 'course';
    static protected $routeSlug = 'courses';

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

      $args['tax_query'] = [
        'relation' => 'AND',
      ];

      if (isset($request['per_page']) && isset($request['page'])) {
        $args['posts_per_page'] = $request['per_page'];
        $args['paged'] = $request['page'];
      }

      if (isset($params['category'])) {
        array_push($args['tax_query'], array(
          'taxonomy' => 'audience',
          'terms' => $params['category']
        ));
      }

      if (isset($params['tag'])) {
        array_push($args['tax_query'], array(
          'taxonomy' => 'post_tag',
          'terms' => $params['tag']
        ));
      }

      if (isset($params['level'])) {
        array_push($args['tax_query'], array(
          'taxonomy' => 'advancement',
          'terms' => $params['level']
        ));
      }

      $query = new \WP_Query($args);
      $courses = $query->posts;

      $results = [];
      foreach($courses as $key => $course) {
        $url = get_the_permalink($course->ID);
        $thumbnail = get_the_post_thumbnail_url($course->ID);
        $advancement = get_the_terms($course->ID, 'advancement');
        $advancementColor = (!is_null($advancement)) ? get_field('advancement_color', $advancement[0]) : '';
        $lessonsCount = get_field('course_lesson_count', $course->ID);

        $courseType = get_the_terms($course->ID, 'course-type');

        $tags = get_the_tags($course->ID);

        $course->thumbnail = $thumbnail;
        $course->url = $url;
        $course->tag = ($tags) ? [
          'color' => get_field('tag_color', $tags[0]),
          'name' => $tags[0]->name
        ] : '';
        $course->advancement = (!is_null($advancement)) ? [
          'color' => $advancementColor,
          'name' =>  $advancement[0]->name
        ] : '';
        $course->courseType = (!is_null($courseType)) ? $courseType[0] ->name : '';
        $course->lessonsCount = $lessonsCount;

        array_push($results, $course);
      }

      $data = [
        'total_pages' => $query->max_num_pages,
        'total_records' => $query->found_posts,
        'results' => $results
      ];

      return new \WP_REST_Response($data, 200);
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
  }