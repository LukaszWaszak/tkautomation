<?php

  namespace ThemeClasses\Settings;

  class Theme
  {
    public function __construct()
    {
      add_action('wp_loaded', [$this, 'registerScripts']);
      add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
      add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);

      $this->addThemeSupports();
      $this->registerGlobalPaths();
    }

    public function registerScripts()
    {
      $distPath = get_template_directory_uri() . '/public/dist/';

      wp_register_style('frontend_styles',   $distPath . 'main.min.css', [], false, false);
      wp_register_script('frontend_scripts', $distPath . 'main.min.js', [], false, false);
    }

    public function enqueueAdminScripts() {
      $distPath = get_template_directory_uri() . '/public/dist/';

      wp_register_style('admin_styles',   $distPath . 'admin.css', [], false, false);
      wp_enqueue_style('admin_styles');
    }

    public function enqueueScripts()
    {
      wp_enqueue_style('frontend_styles');
      wp_enqueue_script('frontend_scripts');

      wp_localize_script('frontend_scripts', 'mynamespace', array(
        'rootapiurl' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest')
      ));
    }

    private function registerGlobalPaths()
    {
      define('THEME_URL', get_template_directory_uri() . '/');
      define('THEME_DIR', get_template_directory() . DIRECTORY_SEPARATOR);
      define('INCLUDES', THEME_DIR . 'includes' . DIRECTORY_SEPARATOR);
      define('FLEXIBLE', INCLUDES . 'flexible' . DIRECTORY_SEPARATOR);
    }

    public function addThemeSupports() {
      add_theme_support('post-thumbnails');
    }
  }