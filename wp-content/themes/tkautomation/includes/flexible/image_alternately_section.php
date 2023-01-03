<?php
  $rootClass = '';

  $header = $section['header'];
  $subtitle = $section['subtitle'];
  $text = $section['text'];
  $button = $section['button'];
  $cards = $section['step_cards'];
  $hiddenButton =$section['hidden_button'];
  $numbers = $section['show_numbers'];
  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : ''
?>

<section id="oferta" class="section imageAlternatelySection <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="imageAlternatelySection__wrapper">
  
    <div class="imageAlternatelySection__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'headerTag' => 'h4',
          'subtitle' => $subtitle,
          'text' => $text,
          'isTextBig' => true
        ]) ?>
        <?php if(!$hiddenButton):?>
        <div class="imageAlternatelySection__more">
        <?php get_template_part('/includes/components/button', null, [
          'url' => $button['link'],
          'text' => $button['text']
        ]) ?>
        </div>
        <?php else:?>
          <?php endif;?>
      </div>
      <div class="imageAlternatelySection__cards">
      <?php foreach($cards as $key => $card): ?>
        <div class="imageAlternatelySection__card">
        <?php get_template_part('/includes/components/cards/imageDotCard', null, [
          'image' => $card['image'],
          'header' => $card['header'],
          'text' => $card['text'],
          'reversed' => ($key % 2),
          // 'numbers' => $numbers,
          // 'numberValue' => $key+1
        ]) ?>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>