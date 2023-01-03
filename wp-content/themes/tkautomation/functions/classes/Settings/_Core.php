<?php
  namespace ThemeClasses\Settings;

  class _Core
  {

    public function __construct()
    {
      // new Env(); // getting vars from global .env file
      new Gutenberg();
      new Menu();
      new Options();
      new Theme();
      new Redirect();
      new Upload();
      new Admin();
      new Acf();
    }
  }