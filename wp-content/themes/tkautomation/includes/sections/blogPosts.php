<?php
  $ID = get_the_ID();
  $targetGroup = wp_get_post_terms($ID, 'audience', [
    'fields' => 'ids'
  ]);

  $targetGroup = (count($targetGroup)) ? $targetGroup[0] : null;

  $category = apply_filters('getTermsObjects', 'category');
  $audience = apply_filters('getTermsObjects', 'audience');
  $popular = apply_filters('getPopularPosts', $ID);

  $blogFilter = get_field('blog_filter', $ID);
  $search = (!is_null($blogFilter)) ? $blogFilter['search'] : null;
  $searchLabel = (!is_null($search)) ? $search['label'] : '';
  $filterNotFound = $blogFilter['not_found'];

  $ebookForm = get_field('blog_ebook_form', $ID);
  $ebook = (!is_null($ebookForm)) ? $ebookForm['e-book'] : null;
  $ebookData = apply_filters('getPostDetails', $ebook);
  $title = $ebookForm['title'];
  $formID = $ebookForm['hubspot_form_id'];
  $portalID = get_field('hubspot_portal_id', 'option');
  $linkButton = $ebookForm['link_button'];
  $downloadButton = $ebookForm['download_button'];

  $ebookFormData = [
    'title' => $title,
    'ebook' => $ebookData,
    'formID' => $formID,
    'portalID' => $portalID,
    'inputs' => [
      'name' => __('Twoje imię', 'tutlo'),
      'email' => __('Twój adres email', 'tutlo')
    ]
  ];

  $apiURL = home_url().'/wp-json/api/v1/';
  $locale = [
    'toggleAll' => __('Wszystkie', 'tutlo'),
    'filter' => __('Filtruj', 'tutlo'),
    'popular' => __('Popularne wpisy', 'tutlo'),
    'readTime' => __('Czas czytania', 'tutlo'),
    'pagination' => [
      'all' => __('Wszystkie', 'tutlo'),
      'page' => __('Strona', 'tutlo'),
      'pageOf' => __('z', 'tutlo')
    ]
  ];
?>

<section class="section section--padding-topNone blogPosts">
  <div class="container">
    <div class="blogPosts__wrapper" data-vue-component>
      <v-blog-posts-filter
        :api='<?= json_encode($apiURL) ?>'
        :search-label='<?= json_encode($searchLabel) ?>'
        :target-group='<?= json_encode($targetGroup) ?>'
        :categories='<?= json_encode($category) ?>'
        :audience='<?= json_encode($audience) ?>'
        :popular='<?= json_encode($popular) ?>'
        :not-found='<?= json_encode($filterNotFound) ?>'
        :ebook-form='<?= json_encode($ebookFormData) ?>'
        :locale='<?= json_encode($locale) ?>'
      >

      </v-blog-posts-filter>
    </div>
  </div>
</section>