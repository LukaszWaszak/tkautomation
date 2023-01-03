<?php
  $lang = pll_current_language();
  $jsonDir = THEME_DIR.'assets/json/';
  $reviewsFile = $jsonDir.'google_reviews_'.$lang.'.json';
  $reviewsData = null;

  if (file_exists($reviewsFile)) {
    $reviewsData = json_decode(file_get_contents($reviewsFile));
  }

  $rootClass = '';
  $settings = $section['settings'];
  $padding = $settings['padding'];

  $reviews = $section['google_reviews_list'];
  $reviews = array_map(function($item) {
    return json_decode($item);
  }, $reviews);

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? ' section--padding-'.$padding : '';
?>

<section class="section googleReviews <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="googleReviews__wrapper">
      <div class="googleReviews__head">
        <div class="googleReviews__text">
        <?php get_template_part('/includes/components/text', null, [
          'header' => __('Opinie Google', 'tutlo'),
          'headerTag' => 'h4'
        ]) ?>
        </div>
        <div class="googleReviews__logo">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'assets/images/google.png',
            'alt' => 'Google Logo'
          ]
        ]) ?>
        </div>
        <div class="googleReviews__rating">
          <div class="googleReviews__ratingStars">
            <?php for($i=0; $i < 5; $i++): ?>
            <div class="googleReviews__ratingStar">
              <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.8095 1.08156L13.7771 7.13729C13.9779 7.75532 14.5539 8.17376 15.2037 8.17376H21.5711C22.0555 8.17376 22.2568 8.79357 21.865 9.07827L16.7137 12.8209C16.1879 13.2029 15.968 13.8799 16.1688 14.498L18.1364 20.5537C18.2861 21.0143 17.7588 21.3974 17.367 21.1127L12.2157 17.3701C11.6899 16.9881 10.978 16.9881 10.4523 17.3701L5.30099 21.1127C4.90914 21.3974 4.3819 21.0144 4.53158 20.5537L6.4992 14.498C6.70001 13.8799 6.48002 13.2029 5.95429 12.8209L0.802982 9.07827C0.411127 8.79357 0.612513 8.17376 1.09688 8.17376H7.46425C8.11409 8.17376 8.69002 7.75532 8.89083 7.13729L10.8585 1.08156C11.0081 0.620904 11.6598 0.620902 11.8095 1.08156Z" stroke="#332C2B"/>
              </svg>
            </div>
            <?php endfor; ?>
          </div>
          <div class="googleReviews__ratingValue">
            <p class="p p--big"><?= $reviewsData->atmosphere->rating ?></p>
          </div>
        </div>
        <div class="googleReviews__overall">
          <p class="p p--big"><?= $reviewsData->atmosphere->ratingsCount ?> <?= __('opinii z Google') ?></p>
        </div>
      </div>
      <div class="googleReviews__main" data-cards-slider>
        <div class="googleReviews__nav">
          <div class="googleReviews__navButton">
          <?php get_template_part('/includes/components/buttons/navButton', null, [
            'icon' => 'arrow-left',
            'attr' => 'data-cards-slider-prev'
          ]) ?>
          </div>
          <div class="googleReviews__navButton">
          <?php get_template_part('/includes/components/buttons/navButton', null, [
            'icon' => 'arrow-right',
            'attr' => 'data-cards-slider-next'
          ]) ?>
          </div>
        </div>
        <div class="googleReviews__slider swiper-container" data-cards-slider-container>
          <div class="googleReviews__sliderInner swiper-wrapper">
          <?php foreach($reviews as $key => $item): ?>
            <div class="googleReviews__slide swiper-slide" data-cards-slider-slide>
            <?php get_template_part('/includes/components/cards/googleReviewCard', null, [
              'text' => $item->text,
              'author' => $item->author_name,
              'rating' => $item->rating,
              'avatar' => $item->profile_photo_url
            ]); ?>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>