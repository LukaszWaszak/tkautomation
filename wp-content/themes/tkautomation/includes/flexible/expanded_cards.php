<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];

  $header = $section['header'];
  $text = $section['text'];
  $cards = $section['cards'];

  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section expandedCards <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="expandedCards__wrapper">
      <div class="expandedCards__shapes">
        <div class="expandedCards__shape expandedCards__shape--blue" data-section-shape></div>
        <div class="expandedCards__shape expandedCards__shape--purple" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/elipse_quarter_purple_2.svg'
          ]
        ]) ?>
        </div>
        <div class="expandedCards__shape expandedCards__shape--rose" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/ellipse_rose.svg'
          ]
        ]) ?>
        </div>
        <div class="expandedCards__shape expandedCards__shape--yellow" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/circle_yellow.svg'
          ]
        ]) ?>
        </div>
        <div class="expandedCards__shape expandedCards__shape--lightYellow" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/circle_light_yellow.svg'
          ]
        ]) ?>
        </div>
        <div class="expandedCards__shape expandedCards__shape--pattern" data-section-shape>
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => THEME_URL.'/public/images/pattern_cross_2.svg'
          ]
        ]) ?>
        </div>
      </div>
      <div class="expandedCards__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4',
        'text' => $text,
        'isTextBig' => true
      ]) ?>
      </div>
      <div class="expandedCards__cards">
        <?php foreach($cards as $key => $item): ?>
          <div class="expandedCards__card">
          <?php get_template_part('/includes/components/cards/faqCard', null, [
            'question' => $item['title'],
            'answer' => $item['text'],
            'titleClass' => $item['main_color'],
            'theme' => 'clipped',
            'isTextEditor' => true
          ]); ?>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>