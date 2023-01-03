<?php

  namespace ThemeClasses\Helpers;

  class _Core
  {
    public function __construct()
    {
      new Variables();
      new User();
      new Post();
      new Faq();
      new Teacher();
      new Socials();
    }
  }