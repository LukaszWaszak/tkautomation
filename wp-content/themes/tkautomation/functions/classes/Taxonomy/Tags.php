<?php
  namespace ThemeClasses\Taxonomy;

  class Tags {
    public function __construct()
    {
      add_action('init', [$this, 'registerTags']);
    }

    public function registerTags()
    {
      register_taxonomy_for_object_type('post_tag', 'page');
      register_taxonomy_for_object_type('category', 'page');
    }
  }