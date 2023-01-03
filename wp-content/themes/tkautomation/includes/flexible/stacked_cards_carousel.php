<?php
  $rootClass = '';

  $socials = $section['with_socials'];
  $tag = $section['tag'];
  $header = $section['header'];
  $text = $section['text'];
  $cards = $section['cards'];

  $settings = $section['settings'];
  $padding = $settings['padding'];

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

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section stackedCardsCarousel <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="stackedCardsCarousel__wrapper">
      <div class="stackedCardsCarousel__slider">
      <?php get_template_part('/includes/components/sliders/stackedSlider', null, [
        'items' => $cards
      ]) ?>
      </div>
      <div class="stackedCardsCarousel__content">
        <?php if (!is_null($tag) && $tag != ''): ?>
        <div class="stackedCardsCarousel__tag">
        <?php get_template_part('/includes/components/tag', null, [
          'text' => $tag
        ]) ?>
        </div>
        <?php endif; ?>
        <div class="stackedCardsCarousel__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'headerTag' => 'h4',
          'text' => $text,
          'isTextBig' => true
        ]) ?>
        </div>
        <?php if ($socials): ?>
          <div class="stackedCardsCarousel__socials">
          <?php foreach($socialLinks as $key => $item): ?>
            <div class="stackedCardsCarousel__social">
            <?php get_template_part('/includes/components/link', null, [
              'icon' => $key,
              'url' => $item,
              'theme' => 'roundPurple',
              'onlyIcon' => true
            ]); ?>
            </div>
          <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>