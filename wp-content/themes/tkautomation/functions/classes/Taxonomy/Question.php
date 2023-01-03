<?php
  namespace ThemeClasses\Taxonomy;

  class Question {
    public function __construct()
    {
      add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerTaxonomy()
    {
      // $labels = [
      //   'name'              => __('Kategoria pytania'),
      //   'singular_name'     => __('Kategoria pytania'),
      //   'search_items'      => __('Wyszukaj kategorię pytania'),
      //   'all_items'         => __('Wszystkie kategorie pytań'),
      //   'parent_item'       => __('Nadrzędna kategoria pytania'),
      //   'parent_item_colon' => __('Nadrzędna kategoria pytania'),
      //   'edit_item'         => __('Edytuj kategorię pytania'),
      //   'update_item'       => __('Zaktualizuj kategorię pytania'),
      //   'add_new_item'      => __('Dodaj kategorię pytania'),
      //   'new_item_name'     => __('Nowa kategoria pytania'),
      //   'menu_name'         => __('Kategoria pytania'),
      // ];

      // $args = [
      //   'hierarchical'      => true,
      //   'labels'            => $labels,
      //   'public'            => true,
      //   'show_ui'           => true,
      //   'show_admin_column' => true,
      //   'query_var'         => true,
      //   'rewrite'           => ['slug' => 'question-type'],
      // ];

      // register_taxonomy('question-type', ['faq'], $args);
    }
  }