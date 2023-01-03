<?php
  $header = $section['header'];
  $settings = $section['settings'];
  $withBg = $settings['with_background'];

  $socials = get_field('socials', 'options');
  $facebook = $socials['facebook'];
  $youtube = $socials['youtube'];
  $instagram = $socials['instagram'];
  $linkedin = $socials['linkedin'];

  $socialLinks = [
    'facebook' => $facebook,
    'youtube' => $youtube,
    'instagram' => $instagram,
    'linkedin' => $linkedin
  ];

  // $posts = apply_filters('getSocialPosts', null);
?>

<section class="section socialMediaPosts" data-section <?= ($withBg) ? 'data-bg-to-footer' : '' ?> >
  <div class="container">
    <div class="socialMediaPosts__wrapper" data-cards-slider>
      <div class="socialMediaPosts__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h3'
      ]); ?>
      </div>
      <div class="socialMediaPosts__bar">
        <div class="socialMediaPosts__icons">
        <?php foreach($socialLinks as $key => $item): ?>
          <div class="socialMediaPosts__social">
          <?php get_template_part('/includes/components/link', null, [
            'icon' => $key,
            'url' => $item,
            'theme' => 'roundPurple',
            'onlyIcon' => true
          ]); ?>
          </div>
        <?php endforeach; ?>
        </div>
        <div class="socialMediaPosts__nav">
          <div class="socialMediaPosts__navButton">
            <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-left',
              'attr' => 'data-cards-slider-prev'
            ]) ?>
            </div>
            <div class="socialMediaPosts__navButton">
            <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-right',
              'attr' => 'data-cards-slider-next'
            ]) ?>
            </div>
        </div>
      </div>
      <div class="socialMediaPosts__posts">
        <div class="socialMediaPosts__slider">
          <div class="socialMediaPosts__sliderContainer swiper-container" data-cards-slider-container>
            <div class="socialMediaPosts__sliderWrapper swiper-wrapper">
            <?php //foreach($posts as $key => $item): ?>
              <div class="socialMediaPosts__slide swiper-slide" data-cards-slider-slide>
              <?php get_template_part('/includes/components/cards/socialPostCard', null, [
                'date' => $item->date,
                'thumbnail' => $item->thumbnail,
                'description' => $item->description,
                'url' => $item->url,
                'type' => $item->type
              ]); ?>
              </div>
            <?php  //endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>