<?php

  namespace ThemeClasses;

  class Core
  {
    public function __construct()
    {
      new Settings\_Core();
      new PostType\_Core();
      new Taxonomy\_Core();
      new Model\_Core();
      new Api\_Core();
      new Helpers\_Core();
      new Handlers\_Core();
    }
  }

