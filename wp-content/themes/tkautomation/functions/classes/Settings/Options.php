<?php

  namespace ThemeClasses\Settings;

  class Options
  {
    public function __construct()
    {
      add_action('init', [$this, 'optionsPage']);
    }

    public function optionsPage()
    {
      if (
        !function_exists('acf_add_options_page')
        || !function_exists('acf_add_options_sub_page')
      ) return false;

      $optionsPage = acf_add_options_page(array(
        'page_title' => __('Opcje strony', 'tutlo'),
        'menu_title' => __('Opcje strony', 'tutlo'),
        'menu_slug'  => 'options',
        'position'   => 50,
        'icon_url'   => 'dashicons-admin-generic',
        'redirect'   => true,
      ));

      $this->addOptions(__('Globalne ustawienia',          'tutlo'), 'global',                         $optionsPage);
      $this->addOptions(__('Kontakt',                      'tutlo'), 'contact',                        $optionsPage);
    }

    public function addOptions($title, $slug, $parent)
    {
      acf_add_options_page(array(
        'page_title'  => $title,
        'menu_title'  => $title,
        'menu_slug'   => $slug,
        'parent_slug' => $parent['menu_slug'],
      ));
    }
  }