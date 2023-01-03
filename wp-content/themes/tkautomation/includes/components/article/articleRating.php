<?php
  $baseURL = pll_home_url($lang = 'pl-PL');
  $postID = get_the_ID();

  $IP = $_SERVER['REMOTE_ADDR'];
  $ratings = get_field('article_ratings', $postID);
  $currentRating = 0;

  if (!is_null($ratings) && $ratings != '') {
    $rates = json_decode($ratings);
    $rateIndex = array_search($ip, array_column($rates, 'ip'));

    if ($rateIndex >= 0) {
      $currentRating = intval($rates[$rateIndex]->rate);
    }
  }

  $apiURL = $baseURL.'wp-json/api/v1/';
  $data = [
    'postID' => $postID,
    'ip' => $IP,
    'apiUrl' => $apiURL
  ];
?>

<div class="articleRating" data-article-rating='<?= json_encode($data) ?>'>
  <div class="articleRating__label">
    <p class="p"><?= __('Oceń artykuł', 'tutlo') ?></p>
  </div>
  <div class="articleRating__rate">
  <?php for($i = 0; $i < 5; $i++): ?>
    <div class="articleRating__star <?= ($i < $currentRating) ? 'active' : '' ?>" data-article-rating-star="<?= $i + 1 ?>">
      <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.8095 1.08156L13.7771 7.13729C13.9779 7.75532 14.5539 8.17376 15.2037 8.17376H21.5711C22.0555 8.17376 22.2568 8.79357 21.865 9.07827L16.7137 12.8209C16.1879 13.2029 15.968 13.8799 16.1688 14.498L18.1364 20.5537C18.2861 21.0143 17.7588 21.3974 17.367 21.1127L12.2157 17.3701C11.6899 16.9881 10.978 16.9881 10.4523 17.3701L5.30099 21.1127C4.90914 21.3974 4.3819 21.0144 4.53158 20.5537L6.4992 14.498C6.70001 13.8799 6.48002 13.2029 5.95429 12.8209L0.802982 9.07827C0.411127 8.79357 0.612513 8.17376 1.09688 8.17376H7.46425C8.11409 8.17376 8.69002 7.75532 8.89083 7.13729L10.8585 1.08156C11.0081 0.620904 11.6598 0.620902 11.8095 1.08156Z" stroke="#332C2B"/>
      </svg>
    </div>
  <?php endfor; ?>
  </div>
</div>