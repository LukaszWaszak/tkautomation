<?php
  namespace ThemeClasses\Taxonomy;

  class _Core
  {

    public function __construct()
    {
      new Tags();
      new Category();
      new Advancement();
      new CourseType();
      new Speaker();
      new Topic();
      new ResourceType();
      new Question();
      new Helpers();
    }
  }