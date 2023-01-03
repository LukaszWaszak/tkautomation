<?php
$rootClass = '';

$settings = $section['settings'];
$padding = $settings['padding'];
$sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

$title = $section['title'];
$cards = $section['benefits_cards']['benefit_card'];

$rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';

?>

<section class="section otherBenefits <?= $rootClass ?>" data-section>
  <div class="container">
  <div class="otherBenefits__wrapper">
  <div class="otherBenefits__header">
    <h4><?= $title?></h4>
  </div>
  <div class="otherBenefits__tiles">
    <?php if($cards):?>  
      <?php foreach($cards as $card):?>
        <div class="otherBenefits__tile">
        <?php $icon = $card['benefit_icon']?>
          <?php $iconUrl = $icon['url'];?>
            <?php get_template_part('./includes/components/cards/otherBenefitsCard', null, [
              
              'icon' => $iconUrl,
              'title' => $card['benefit_title'],
              'desc' => $card['benefit_description']
              
              ])?>
    </div>
    <?php endforeach;?>
    <?php endif;?>
  </div>
  </div>
  </div>
</section>