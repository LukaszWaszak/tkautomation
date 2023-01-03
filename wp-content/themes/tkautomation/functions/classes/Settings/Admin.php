<?php
  namespace ThemeClasses\Settings;

  class Admin {
    public function __construct() {
      add_action('admin_menu', [$this, 'addMenuPages']);
      add_action('admin_footer', [$this, 'onUpdateReviewsClick']);
      add_action('admin_footer', [$this, 'onUpdateYoutubeClick']);
      add_action('admin_footer', [$this, 'onUpdateInstagramClick']);
    }

    public function addMenuPages() {
      // add_menu_page(
      //   __( 'Google Reviews', 'my-textdomain' ),
      //   __( 'Google Reviews', 'my-textdomain' ),
      //   'manage_options',
      //   'google-reviews',
      //   [$this, 'setGooglePageContent'],
      //   'dashicons-schedule',
      //   58
      // );

      // add_menu_page(
      //   __( 'Social Media', 'my-textdomain' ),
      //   __( 'Social Media', 'my-textdomain' ),
      //   'manage_options',
      //   'social-media',
      //   [$this, 'setSocialMediaSettingsContent'],
      //   'dashicons-schedule',
      //   58
      // );
    }

    public function onUpdateReviewsClick() {
      ?>
        <script type="text/javascript" >
        jQuery('[data-admin-update-reviews]').click(function($) {

          const data = {
            'action': 'googlereviews',
            'fields': 'review,rating,user_ratings_total'
          };

          jQuery.post(ajaxurl, data, function(response) {
            console.log(response);
          });
        });
        </script>
      <?php
    }

    public function onUpdateYoutubeClick() {
      ?>
        <script type="text/javascript" >
        jQuery('[data-admin-update-youtube-posts]').click(function($) {

          const data = {
            'action': 'getytvideos',
          };

          jQuery.post(ajaxurl, data, function(response) {
            console.log(response);
          });
        });
        </script>
      <?php
    }

    public function onUpdateInstagramClick() {
      ?>
        <script type="text/javascript" >
        jQuery('[data-admin-update-instagram-posts]').click(function($) {

          const data = {
            'action': 'getinstagramposts',
          };

          jQuery.post(ajaxurl, data, function(response) {
            console.log(response);
          });
        });
        </script>
      <?php
    }

    public static function setGooglePageContent() {
      ?>
        <section class="adminGoogleReviews">
          <div class="adminGoogleReviews__wrapper">
            <div class="adminGoogleReviews__hint">
              <h2><?= __('W tym widoku mogą państwo zaktualizować opinie dla Tutlo z platformy Google. Prosimy mieć na uwadze, że aktualizacja danych przebiega tylko dla aktualnego języka.', 'tutlo') ?></h2>
              <p><?= __('W celu aktualizacji opinii Google, prosimy kliknąć w poniższy przycisk', 'tutlo') ?></p>
            </div>
            <div class="adminGoogleReviews__update">
              <?php get_template_part('/includes/components/button', null, [
                'text' => __('Zaktualizuj', 'tutlo'),
                'attr' => 'data-admin-update-reviews'
              ]) ?>
            </div>
          </div>
        </section>
      <?php
    }

    public static function setSocialMediaSettingsContent() {
      ?>
        <section class="socialMediaSettings">
          <div class="socialMediaSettings__wrapper">
            <div class="socialMediaSettings__social">
              <div class="socialMediaSettings__socialHead">
                <p><?= __('W celu aktualizacji wpisów Instagram, prosimy kliknąć w poniższy przycisk. Zostanie pobranych 5 najnowszych wpisów', 'tutlo') ?></p>
              </div>
              <div class="socialMediaSettings__socialUpdate">
              <?php get_template_part('/includes/components/button', null, [
                'text' => __('Zaktualizuj', 'tutlo'),
                'attr' => 'data-admin-update-instagram-posts'
              ]) ?>
              </div>
            </div>
            <div class="socialMediaSettings__social">
              <div class="socialMediaSettings__socialHead">
                <p><?= __('W celu aktualizacji wpisów Youtube, prosimy kliknąć w poniższy przycisk. Zostanie pobranych 5 najnowszych wpisów', 'tutlo') ?></p>
              </div>
              <div class="socialMediaSettings__socialUpdate">
              <?php get_template_part('/includes/components/button', null, [
                'text' => __('Zaktualizuj', 'tutlo'),
                'attr' => 'data-admin-update-youtube-posts'
              ]) ?>
              </div>
            </div>
          </div>
        </section>
      <?php
    }
  }