<?php
  namespace ThemeClasses\Taxonomy;

  class Topic {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Temat'),
        'singular_name'     => __('Temat'),
        'search_items'      => __('Wyszukaj temat'),
        'all_items'         => __('Wszystkie tematy'),
        'parent_item'       => __('Nadrzędny temat'),
        'parent_item_colon' => __('Nadrzędny temat:'),
        'edit_item'         => __('Edytuj temat'),
        'update_item'       => __('Zaktualizuj temat'),
        'add_new_item'      => __('Dodaj temat'),
        'new_item_name'     => __('Nowy temat'),
        'menu_name'         => __('Temat'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'topic'],
      ];

      register_taxonomy('topic', ['resource'], $args);
    }
  }