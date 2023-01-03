<?php

  namespace ThemeClasses\Api;

  class Blog extends \WP_REST_Controller {

    static protected $postTypeName = 'Post';
    static protected $postTypeSlug = 'post';
    static protected $routeSlug = 'blog';

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

      register_rest_route($this->namespace, $this->base.'/rate', [
        [
          'methods'             => \WP_REST_Server::CREATABLE,
          'callback'            => [$this, 'ratePost'],
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
        $args['category__in'] = $params['category'];
        $args['tax_query'] = array(
          'relation' => 'OR',
          array(
            'taxonomy' => 'audience',
            'terms' => $params['category']
          )
        );
      }

      if (isset($params['search'])) {
        $args['s'] = $params['search'];
      }
      if (isset($params['per_page'])) {
        $args['posts_per_page'] = intval($params['per_page']);
      }
      if (isset($params['paged'])) {
        $args['paged'] = intval($params['paged']);
      }

      $query = new \WP_Query($args);
      $posts = $query->posts;

      $results = [];
      foreach($posts as $key => $post) {
        $url = get_the_permalink($post->ID);
        $thumbnail = get_the_post_thumbnail_url($post->ID);
        $readTime = get_field('article_read_time', $post->ID);

        $cats = [];
        $categories = wp_get_post_categories($post->ID);
        $audience = get_the_terms($post->ID, 'audience');

        foreach($categories as $c){
          if ($c != 1) { // skip default category (without category)
            $cat = get_category( $c );
            $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
          }
        }

        foreach($audience as $c){
          $cat = get_term( $c );
          $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
        }

        $post->excerpt = get_the_excerpt($post->ID);
        $post->categories = $cats;
        $post->thumbnail = $thumbnail;
        $post->url = $url;
        $post->date = date('d.m.Y', strtotime($post->post_date));
        $post->readTime = (!is_null($readTime)) ? $readTime : '';

        array_push($results, $post);
      }

      $response = [
        'results' => $results,
        'total_pages' => $query->max_num_pages,
        'total_records' => $query->found_posts,
      ];

      return new \WP_REST_Response($response, 200);
    }

    public function ratePost($request) {
      $postID = $request['postID'];
      $ip = $request['ip'];
      $rate = $request['rate'];

      $rates = get_field('article_ratings', intval($postID));
      $currRate = [
        'ip' => $ip,
        'rate' => $rate
      ];

      if (is_null($rates) || $rates == '') {
        update_field('article_ratings', json_encode([$currRate]), $postID);
      } else {
        $rates = json_decode($rates);
        $rateIndex = array_search($ip, array_column($rates, 'ip'));

        if ($rateIndex >= 0) {
          $rates[$rateIndex] = $currRate;
          update_field('article_ratings', json_encode($rates), $postID);
        } else {
          array_push($rates, $currRate);
          update_field('article_ratings', json_encode($rates), $postID);
        }
      }

      $response = [
        'currRate' => $currRate,
        'rates' => $rates
      ];

      return new \WP_REST_Response($response, 200);
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