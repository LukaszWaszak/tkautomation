<?php
$rootClass = '';

$settings = $section['settings'];
$padding = $settings['padding'];
$sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

$title = $section['title'];
$tiles = $section['advantages_tiles'];


$rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';
?>

<section class="section jobAdvantages <?= $rootClass ?>" data-section>
  <div class="container">
  <div class="jobAdvantages__wrapper">
    <div class="jobAdvantages__header">
      <h4><?=$title?></h4>
    </div>
    <div class="jobAdvantages__tiles">
      <?php if($tiles):?>
      <?php foreach($tiles as $tile):?>
        <?php $icon = $tile['icon']?> 
        <?php $iconUrl = $icon['url']?> 
      <div class="jobAdvantages__tile">
      <?php get_template_part('/includes/components/cards/jobAdvantagesCard', null, [
          'icon' => $iconUrl,
          'title' => $tile['title_advantages'],
          'desc' => $tile['advantages_description']
        ]) ?>
      </div>
      <?php endforeach;?>
      <?php else:?>
      <?php endif;?>
    </div>
  </div>
  </div>
</section>