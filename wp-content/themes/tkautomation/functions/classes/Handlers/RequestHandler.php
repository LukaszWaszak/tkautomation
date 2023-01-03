<?php
  namespace ThemeClasses\Handlers;

  class RequestHandler {
    public function __construct() {
      $this->request = null;
    }

    public function handleRequest($url) {
      $result = [];
      $this->request = curl_init();

      if (!$this->request) return $result;

      curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->request, CURLOPT_URL, $url);
      $result=curl_exec($this->request);
      curl_close($this->request);

      return json_decode($result);
    }
  }