<?php
  namespace ThemeClasses\Helpers;

  class Variables {
    public function __construct() {
      $tutloWebAppUrl = '';

      $this->setTutloAppUrl();
      $this->setVariables();
    }

    public function setVariables() {
      define('TUTLO_WEB_APP_URL', $this->$tutloWebAppUrl);
    }

    public function setTutloAppUrl() {
      $settingsTutloWebAppUrl = (function_exists('get_field')) ? get_field('tutlo_application_url', 'option') : '';
      $this->$tutloWebAppUrl = 'https://web.tutlo.com/auth/login';

      if (!is_null($settingsTutloWebAppUrl) && $settingsTutloWebAppUrl != '') $this->$tutloWebAppUrl = $settingsTutloWebAppUrl;
    }
  }