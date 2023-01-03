<?php
  namespace ThemeClasses\PostType;

  class Teacher {
    public function __construct()
    {
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      // $labels = [
      //   'name'                  => __('Nauczyciele', 'tutlo'),
      //   'singular_name'         => __('Nauczyciele', 'tutlo'),
      //   'menu_name'             => __('Nauczyciele', 'tutlo'),
      //   'name_admin_bar'        => __('Nauczyciele', 'tutlo'),
      //   'add_new'               => __('Dodaj nauczyciela', 'tutlo'),
      //   'add_new_item'          => __('Dodaj nauczyciela', 'tutlo'),
      //   'new_item'              => __('Nowy nauczyciel', 'tutlo'),
      //   'edit_item'             => __('Edytuj nauczyciela', 'tutlo'),
      //   'view_item'             => __('Pokaż nauczyciela', 'tutlo'),
      //   'all_items'             => __('Wszyscy nauczyciele', 'tutlo'),
      //   'search_items'          => __('Wyszukaj nauczyciela', 'tutlo'),
      //   'parent_item_colon'     => __('Nadrzędny nauczyciel:', 'tutlo'),
      //   'not_found'             => __('Nie znaleziono nauczyciela', 'tutlo'),
      //   'not_found_in_trash'    => __('Brak nauczycieli w koszu', 'tutlo'),
      //   'archives'              => __('Archiwum nauczycieli', 'tutlo'),
      //   'filter_items_list'     => __('Filtruj nauczycieli', 'tutlo'),
      //   'items_list_navigation' => __('Nawigacja nauczycieli', 'tutlo'),
      //   'items_list'            => __('Lista nauczycieli', 'tutlo'),
      // ];

      // $args = [
      //   'labels'             => $labels,
      //   'public'             => true,
      //   'publicly_queryable' => false,
      //   'show_ui'            => true,
      //   'show_in_menu'       => true,
      //   'show_in_nav_menus'  => true,
      //   'query_var'          => true,
      //   'rewrite'            => ['slug' => 'nauczyciele'],
      //   'capability_type'    => 'post',
      //   'has_archive'        => true,
      //   'hierarchical'       => false,
      //   'menu_position'      => null,
      //   'menu_icon'          => 'dashicons-list-view',
      //   'supports'           => ['title', 'thumbnail'],
      //   'exclude_from_search' => false,
      //   'taxonomies' => ['category', 'post_tag']
      // ];

      // register_post_type('teacher', $args);
    }
  }