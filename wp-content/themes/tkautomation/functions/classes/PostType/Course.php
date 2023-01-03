<?php

  namespace ThemeClasses\PostType;

  class Course
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerPostType']);
      add_filter('getCoursesByCategories', [$this, 'getCoursesByCategories']);
    }

    public function registerPostType()
    {
      $labels = [
        'name'                  => __('Nasze kursy', 'tutlo'),
        'singular_name'         => __('Nasze kursy', 'tutlo'),
        'menu_name'             => __('Nasze kursy', 'tutlo'),
        'name_admin_bar'        => __('Nasze kursy', 'tutlo'),
        'add_new'               => __('Dodaj kurs', 'tutlo'),
        'add_new_item'          => __('Dodaj kurs', 'tutlo'),
        'new_item'              => __('Nowy kurs', 'tutlo'),
        'edit_item'             => __('Edytuj kurs', 'tutlo'),
        'view_item'             => __('Pokaż kurs', 'tutlo'),
        'all_items'             => __('Wszystkie kursy', 'tutlo'),
        'search_items'          => __('Wyszukaj kursy', 'tutlo'),
        'parent_item_colon'     => __('Nadrzędny kurs:', 'tutlo'),
        'not_found'             => __('Nie znaleziono kursów', 'tutlo'),
        'not_found_in_trash'    => __('Brak kursów w koszu', 'tutlo'),
        'archives'              => __('Archiwum kursów', 'tutlo'),
        'filter_items_list'     => __('Filtruj kursy', 'tutlo'),
        'items_list_navigation' => __('Nawigacja kursów', 'tutlo'),
        'items_list'            => __('Lista kursów', 'tutlo'),
      ];

      $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'nasze-kursy'],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-list-view',
        'supports'           => ['title', 'thumbnail', 'editor'],
        'exclude_from_search' => false,
        'taxonomies' => ['category', 'post_tag']
      ];

      register_post_type('course', $args);
    }

    public function getCoursesByCategories($categories) {
      $queryArgs = [
        'post_type' => 'course',
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'audience',
            'terms' => $categories
          )
        ),
      ];

      $courses = new \WP_Query($queryArgs);

      return $courses->posts;
    }
  }
