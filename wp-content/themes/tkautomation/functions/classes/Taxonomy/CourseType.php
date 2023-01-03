<?php
  namespace ThemeClasses\Taxonomy;

  class CourseType {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      $labels = [
        'name'              => __('Typ kursu'),
        'singular_name'     => __('Typ kursu'),
        'search_items'      => __('Wyszukaj typ kursu'),
        'all_items'         => __('Wszystkie typy kursów'),
        'parent_item'       => __('Nadrzędny typ kursu'),
        'parent_item_colon' => __('Nadrzędny typ kursu:'),
        'edit_item'         => __('Edytuj typ kursu'),
        'update_item'       => __('Zaktualizuj typ kursu'),
        'add_new_item'      => __('Dodaj typ kursu'),
        'new_item_name'     => __('Nowy typ kursu'),
        'menu_name'         => __('Typ kursu'),
      ];

      $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'course-type'],
      ];

      register_taxonomy('course-type', ['course'], $args);
    }
  }