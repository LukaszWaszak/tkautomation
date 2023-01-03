<?php

  namespace ThemeClasses\PostType;

  class Resources
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      // $labels = [
      //   'name'                  => __('Materiały do nauki', 'tutlo'),
      //   'singular_name'         => __('Materiały do nauki', 'tutlo'),
      //   'menu_name'             => __('Materiały do nauki', 'tutlo'),
      //   'name_admin_bar'        => __('Materiały do nauki', 'tutlo'),
      //   'add_new'               => __('Dodaj materiał', 'tutlo'),
      //   'add_new_item'          => __('Dodaj materiał', 'tutlo'),
      //   'new_item'              => __('Dodaj materiał', 'tutlo'),
      //   'edit_item'             => __('Edytuj materiał', 'tutlo'),
      //   'view_item'             => __('Pokaż materiał', 'tutlo'),
      //   'all_items'             => __('Wszystkie materiały', 'tutlo'),
      //   'search_items'          => __('Wyszukaj materiały', 'tutlo'),
      //   'parent_item_colon'     => __('Nadrzędny materiał:', 'tutlo'),
      //   'not_found'             => __('Nie znaleziono materiałów', 'tutlo'),
      //   'not_found_in_trash'    => __('Brak materiałów w koszu', 'tutlo'),
      //   'archives'              => __('Archiwum materiałów', 'tutlo'),
      //   'filter_items_list'     => __('Filtruj materiały', 'tutlo'),
      //   'items_list_navigation' => __('Nawigacja materiałów', 'tutlo'),
      //   'items_list'            => __('Lista materiałów', 'tutlo'),
      // ];

      // $args = [
      //   'labels'             => $labels,
      //   'public'             => true,
      //   'publicly_queryable' => true,
      //   'show_ui'            => true,
      //   'show_in_menu'       => true,
      //   'show_in_nav_menus'  => true,
      //   'query_var'          => true,
      //   'rewrite'            => ['slug' => 'materialy'],
      //   'capability_type'    => 'post',
      //   'has_archive'        => true,
      //   'hierarchical'       => false,
      //   'menu_position'      => null,
      //   'menu_icon'          => 'dashicons-list-view',
      //   'supports'           => ['title', 'thumbnail', 'editor'],
      //   'exclude_from_search' => false,
      //   'taxonomies' => ['category', 'post_tag']
      // ];

      // register_post_type('resource', $args);
    }
  }
