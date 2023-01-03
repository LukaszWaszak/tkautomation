<?php
$rootClass = '';

$settings = $section['settings'];
$padding = $settings['padding'];
$sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

$title = $section['title'];
$cards = $section['rules_cards']['rules_card'];

$rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';

?>

<section class="section checkRules <?= $rootClass ?>" data-section>
  <div class="container">
  <div class="checkRules__wrapper">
  <div class="checkRules__header">
    <h5><?= $title?></h5>
  </div>
  <div class="checkRules__cards">
    <?php if($cards):?>  
      <?php foreach($cards as $card):?>
        <div class="checkRules__card">
        <?php $icon = $card['rules_image']?>
          <?php $iconUrl = $icon['url'];?>
          <?php $link = $card['link']?>
            <?php get_template_part('./includes/components/cards/checkRulesCard', null, [
              
              'icon' => $iconUrl,
              'title' => $card['rules_title'],
              'link' => $card['link_to_website']['url']
              ])?>
    </div>
    <?php endforeach;?>
    <?php endif;?>
  </div>
  </div>
  </div>
</section>