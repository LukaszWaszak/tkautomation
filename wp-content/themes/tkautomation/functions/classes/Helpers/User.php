<?php
  namespace ThemeClasses\Helpers;

  class User {
    public function __construct() {
      add_filter('getUserData', [$this, 'getUserData'], 10, 1);
    }

    public function getUserData($id) {
      $authorData = get_user_meta(intval($id));
      $authorFirstName = (is_array($authorData)) ? $authorData['first_name'] : '';
      $authorLastName = (is_array($authorData)) ? $authorData['last_name'] : '';
      $authorAvatar = get_avatar_url($author);

      return [
        'name' => $authorFirstName[0],
        'surname' => $authorLastName[0],
        'avatar' => $authorAvatar,
      ];
    }
  }