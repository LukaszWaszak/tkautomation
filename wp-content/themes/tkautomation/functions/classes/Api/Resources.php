<?php

  namespace ThemeClasses\Api;

  class Resources extends \WP_REST_Controller {

    static protected $postTypeName = 'Resource';
    static protected $postTypeSlug = 'resource';
    static protected $routeSlug = 'resources';

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
      $results = [];

      $types = apply_filters('getTermsValues', 'resource_type');

      if (isset($params['type'])) {
        $types = $params['type'];
      }

      $args = [
        'post_type' => static::$postTypeSlug,
      ];

      if (isset($params['per_page'])) {
        $args['posts_per_page'] = intval($params['per_page']);
      }
      if (isset($params['paged'])) {
        $args['paged'] = intval($params['paged']);
      }
      if (isset($params['search'])) {
        $args['s'] = $params['search'];
      }
      if (isset($params['sort'])) {
        if ($params['sort'] == 'asc') {
          $args['orderby'] = 'title';
          $args['order'] = 'ASC';
        } else if ($params['sort'] == 'desc') {
          $args['orderby'] = 'title';
          $args['order'] = 'DESC';
        } else if ($params['sort'] == 'newest') {
          $args['orderby'] = 'date';
          $args['order'] = 'DESC';
        } else if ($params['sort'] == 'oldest') {
          $args['orderby'] = 'date';
          $args['order'] = 'ASC';
        }
      }

      foreach($types as $key=>$type) {
        $term = get_term($type);
        $args['tax_query'] = [
          'relation' => 'AND',
        ];

        array_push($args['tax_query'], array(
          'taxonomy' => 'resource_type',
          'terms' => $term
        ));

        if (isset($params['target'])) {
          array_push($args['tax_query'], array(
            'taxonomy' => 'audience',
            'terms' => $params['target']
          ));
        }

        if (isset($params['topic'])) {
          array_push($args['tax_query'], array(
            'taxonomy' => 'topic',
            'terms' => $params['topic']
          ));
        }

        $query = new \WP_Query($args);
        $resources = $query->posts;
        $items = [];

        foreach($resources as $key => $item) {
          $item = $this->getResourceDetails($item);
          $items[] = $item;
        }

        if (count($items) > 0) {
          array_push($results, [
            'resourceType' => $term->name,
            'items' => $items,
            'total_pages' => $query->max_num_pages,
            'total_records' => $query->found_posts,
          ]);
        }
      }

      $data = [
        'results' => $results,
      ];

      return new \WP_REST_Response($data, 200);
    }

    public static function getResourceDetails($item) {
      $url = get_the_permalink($item->ID);
      $thumbnail = get_the_post_thumbnail_url($item->ID);
      $title = get_the_title($item->ID);
      $type = get_the_terms($item->ID, 'resource_type');

      return [
        'id' => $item->ID,
        'url' => $url,
        'title' => $title,
        'thumbnail' => $thumbnail,
        'type' => $type,
      ];
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