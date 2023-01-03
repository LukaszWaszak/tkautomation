<?php
  namespace ThemeClasses\Helpers;

  class Teacher {
    public function __construct() {
      add_filter('getSpeakerStatus', [$this, 'getSpeakerStatus'], 10, 1);
    }

    public function getSpeakerStatus($id) {
      $status = get_field('speaker_status', $id);
      $statusLabel = static::getStatusLabel($status);

      $statusDetails = [
        'code' => $status,
        'label' => $statusLabel,
      ];

      return $statusDetails;
    }

    public static function getStatusLabel($status) {
      switch($status) {
        case 'available':
          return __('Dostępny', 'tutlo');
          break;
        case 'busy':
          return __('Zajęty', 'tutlo');
          break;
        default:
          return '';
          break;
      }
    }
  }