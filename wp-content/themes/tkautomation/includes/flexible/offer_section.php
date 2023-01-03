<?php
  $rootClass = '';

  $header = $section['header'];
  $text = $section['text'];
  $image = $section['image'];
  $mainButton = $section['main_button'];
  $secondaryButton = $section['secondary_button'];
  $cards = $section['offer_cards'];
  $cardsActive = $cards['active'];


  $settings = $section['settings'];
  $padding = $settings['padding'];

  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section id="onas" class="section offerSection <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="offerSection__top">
      <div class="offerSection__head">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'text' => $text,
          'headerTag' => 'h3',
          'isTextBig' => true
        ]); ?>
        <div class="offerSection__buttons">
        <?php if(!is_null($mainButton)): ?>
          <div class="offerSection__button">
          <?php get_template_part('/includes/components/button', null, [
            'text' => $mainButton['text'],
            'url' => $mainButton['link'],
          ]); ?>
          </div>
        <?php endif; ?>
        <?php if(!is_null($secondaryButton)): ?>
          <div class="offerSection__button">
          <?php get_template_part('/includes/components/link', null, [
            'text' => $secondaryButton['text'],
            'url' => $secondaryButton['link'],
            'theme' => 'underline',
            'size' => 'big'
          ]); ?>
          </div>
        <?php endif; ?>
        </div>
      </div>
      <div class="offerSection__image">
        <div class="offerSection__imageInner">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => $image
        ]) ?>
        </div>
      </div>
    </div>
    <?php if ($cardsActive && !is_null($cards['cards']) && count($cards['cards']) > 0): ?>
      <div class="offerSection__bottom">
        <div class="offerSection__bottomHead">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $cards['header'],
          'headerTag' => 'h5',
        ]) ?>
        </div>
        <div class="offerSection__cards">
        <?php foreach($cards['cards'] as $key => $item): ?>
          <div class="offerSection__card">
          <?php get_template_part('/includes/components/cards/imageTextCard', null, [
            'image' => $item['image'],
            'text' => $item['text'],
            'url' => $item['link']
          ]) ?>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>