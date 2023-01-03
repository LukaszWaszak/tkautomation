<?php
  namespace ThemeClasses\Taxonomy;

  class ResourceType {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Rodzaj materiału'),
        'singular_name'     => __('Rodzaj materiału'),
        'search_items'      => __('Wyszukaj rodzaj materiału'),
        'all_items'         => __('Wszystkie rodzaje materiału'),
        'parent_item'       => __('Nadrzędny rodzaj materiału'),
        'parent_item_colon' => __('Nadrzędny rodzaj materiału:'),
        'edit_item'         => __('Edytuj rodzaj materiału'),
        'update_item'       => __('Zaktualizuj rodzaj materiału'),
        'add_new_item'      => __('Dodaj rodzaj materiału'),
        'new_item_name'     => __('Nowy rodzaj materiału'),
        'menu_name'         => __('Rodzaj materiału'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'resource-type'],
      ];

      register_taxonomy('resource_type', ['resource'], $args);
    }
  }