<?php
  namespace ThemeClasses\Settings;

  class Upload {
    public function __construct() {
      add_filter('upload_mimes', [$this, 'setMimeTypes']);
    }

    public function setMimeTypes($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
  }