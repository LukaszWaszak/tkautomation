<?php
  namespace ThemeClasses\Taxonomy;

  class Advancement {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Poziom zaawansowania'),
        'singular_name'     => __('Poziom zaawansowania'),
        'search_items'      => __('Wyszukaj poziom zaawansowania'),
        'all_items'         => __('Wszystkie poziom zaawansowania'),
        'parent_item'       => __('Nadrzędny poziom zaawansowania'),
        'parent_item_colon' => __('Nadrzędny poziom zaawansowania:'),
        'edit_item'         => __('Edytuj poziom zaawansowania'),
        'update_item'       => __('Zaktualizuj poziom zaawansowania'),
        'add_new_item'      => __('Dodaj poziom zaawansowania'),
        'new_item_name'     => __('Nowy poziom zaawansowania'),
        'menu_name'         => __('Poziom zaawansowania'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'advancement'],
      ];

      register_taxonomy('advancement', ['course'], $args);
    }
  }