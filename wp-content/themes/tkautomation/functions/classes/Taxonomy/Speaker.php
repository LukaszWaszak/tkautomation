<?php
  namespace ThemeClasses\Taxonomy;

  class Speaker {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Rodzaj'),
        'singular_name'     => __('Rodzaj'),
        'search_items'      => __('Wyszukaj rodzaj'),
        'all_items'         => __('Wszystkie rodzaje'),
        'parent_item'       => __('Nadrzędny rodzaj'),
        'parent_item_colon' => __('Nadrzędny rodzaj:'),
        'edit_item'         => __('Edytuj rodzaj'),
        'update_item'       => __('Zaktualizuj rodzaj'),
        'add_new_item'      => __('Dodaj rodzaj'),
        'new_item_name'     => __('Nowy rodzaj'),
        'menu_name'         => __('Rodzaj'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'speaker'],
      ];

      register_taxonomy('speaker', ['teacher'], $args);
    }
  }