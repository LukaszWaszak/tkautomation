<?php
  namespace ThemeClasses\Taxonomy;

  class Category {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      // $labels = [
      //   'name'              => __('Grupa docelowa'),
      //   'singular_name'     => __('Grupa docelowa'),
      //   'search_items'      => __('Wyszukaj grupę docelową'),
      //   'all_items'         => __('Wszystkie grupy docelowe'),
      //   'parent_item'       => __('Nadrzędna grupa docelowa'),
      //   'parent_item_colon' => __('Nadrzędna grupa docelowa:'),
      //   'edit_item'         => __('Edytuj grupę docelową'),
      //   'update_item'       => __('Zaktualizuj grupę docelową'),
      //   'add_new_item'      => __('Dodaj grupę docelową'),
      //   'new_item_name'     => __('Nowa grupa docelowa'),
      //   'menu_name'         => __('Grupa docelowa'),
      // ];

      // $args = [
      //   'hierarchical'      => true,
      //   'labels'            => $labels,
      //   'public'            => true,
      //   'show_ui'           => true,
      //   'show_admin_column' => true,
      //   'query_var'         => true,
      //   'rewrite'           => ['slug' => 'audiences'],
      // ];

      // register_taxonomy('audience', ['post', 'page', 'course', 'teacher', 'resource'], $args);
    }
  }