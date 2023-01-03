<?php
  $rootClass = '';

  $header = $section['header'];
  $cards = $section['cards'];

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $settingsCards = $settings['cards'];
  $settingsWithBg = $settings['with_background'];
  $cardsTheme = $settingsCards['theme'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section cardsLinksSection <?= $rootClass ?>" data-section <?= ($settingsWithBg) ? 'data-bg-to-footer' : '' ?> >
  <div class="container">
    <div class="cardsLinksSection__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
      'headerTag' => 'h5',
    ]); ?>
    </div>
    <div class="cardsLinksSection__cards">
    <?php foreach($cards as $key => $item): ?>
      <div class="cardsLinksSection__card">
      <?php get_template_part('/includes/components/cards/linkCard', null, [
        'icon' => $item['icon'],
        'text' => $item['text'],
        'description' => $item['description'],
        'link' => $item['link'],
        'theme' => $cardsTheme,
      ]) ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>