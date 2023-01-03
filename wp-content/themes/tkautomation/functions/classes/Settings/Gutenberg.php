<?php
  namespace ThemeClasses\Settings;

  class Gutenberg {
    public function __construct()
    {
      $this->disableGutenberg();
    }

    private function disableGutenberg() {
      add_filter( 'use_block_editor_for_post', '__return_false' );

      add_filter( 'use_widgets_blog_editor', '__return_false' );

      add_action( 'wp_enqueue_scripts', function() {
          wp_dequeue_style( 'wp-block-library' );
          wp_dequeue_style( 'wp-block-library-theme' );
          wp_dequeue_style( 'global-styles' );
      }, 20 );
    }
  }