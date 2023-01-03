<?php

  namespace ThemeClasses\PostType;

  class Faq
  {
    public function __construct()
    {
      add_action('init', [$this, 'registerPostType']);
    }

    public function registerPostType()
    {
      // $labels = [
      //   'name'                  => __('Najczęściej zadawane pytania', 'tutlo'),
      //   'singular_name'         => __('Najczęściej zadawane pytania', 'tutlo'),
      //   'menu_name'             => __('Najczęściej zadawane pytania', 'tutlo'),
      //   'name_admin_bar'        => __('Najczęściej zadawane pytania', 'tutlo'),
      //   'add_new'               => __('Dodaj pytanie', 'tutlo'),
      //   'add_new_item'          => __('Dodaj pytanie', 'tutlo'),
      //   'new_item'              => __('Dodaj pytanie', 'tutlo'),
      //   'edit_item'             => __('Edytuj pytanie', 'tutlo'),
      //   'view_item'             => __('Pokaż pytanie', 'tutlo'),
      //   'all_items'             => __('Wszystkie pytania', 'tutlo'),
      //   'search_items'          => __('Wyszukaj pytania', 'tutlo'),
      //   'parent_item_colon'     => __('Nadrzędne pytanie:', 'tutlo'),
      //   'not_found'             => __('Nie znaleziono pytań', 'tutlo'),
      //   'not_found_in_trash'    => __('Brak pytań w koszu', 'tutlo'),
      //   'archives'              => __('Archiwum pytań', 'tutlo'),
      //   'filter_items_list'     => __('Filtruj pytania', 'tutlo'),
      //   'items_list_navigation' => __('Nawigacja pytań', 'tutlo'),
      //   'items_list'            => __('Lista pytań', 'tutlo'),
      // ];

      // $args = [
      //   'labels'             => $labels,
      //   'public'             => true,
      //   'publicly_queryable' => true,
      //   'show_ui'            => true,
      //   'show_in_menu'       => true,
      //   'show_in_nav_menus'  => true,
      //   'query_var'          => true,
      //   'rewrite'            => ['slug' => 'faq'],
      //   'capability_type'    => 'post',
      //   'has_archive'        => true,
      //   'hierarchical'       => false,
      //   'menu_position'      => null,
      //   'menu_icon'          => 'dashicons-list-view',
      //   'supports'           => ['title', 'editor'],
      //   'exclude_from_search' => false,
      //   'taxonomies' => []
      // ];

      // register_post_type('faq', $args);
    }
  }
