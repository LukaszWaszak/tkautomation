<?php

  namespace ThemeClasses\Api;

  class Faq extends \WP_REST_Controller {

    static protected $postTypeName = 'Faq';
    static protected $postTypeSlug = 'faq';
    static protected $routeSlug = 'faq';

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
      $categories = apply_filters('getTermsValues', 'question-type');

      if (isset($params['category'])) {
        $cat = $params['category'];

        if (is_array($cat)) {
          $categories = $cat;
        } else {
          $categories = [$cat];
        }
      }

      foreach($categories as $key => $cat) {
        $singleCat = get_term($cat);

        $args = [
          'post_type' => 'faq',
          'tax_query' => [
            'relation' => 'AND',
            [
              'taxonomy' => 'question-type',
              'terms' => $cat
            ]
          ]
        ];

        if (isset($params['search'])) {
          $args['s'] = $params['search'];
        }

        $query = new \WP_Query($args);
        $questions = $query->posts;
        $items = [];

        foreach($questions as $key => $item) {
          $item = $this->getFaqQuestionDetails($item);
          $items[] = $item;
        }

        if (count($items) > 0) {
          array_push($results, [
            'faqType' => $singleCat->name,
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

    public static function getFaqQuestionDetails($item) {
      $title = get_the_title($item->ID);
      $answer = get_the_content('', false, $item->ID);

      return [
        'id' => $item->ID,
        'title' => $title,
        'answer' => $answer
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