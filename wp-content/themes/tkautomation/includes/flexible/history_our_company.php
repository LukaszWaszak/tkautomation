<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $title = $section['section_title'];
  $historyTiles = $section['history_tile'];
  ?>

<section class="section historyTile<?= $rootClass ?>" data-section>
  <div class="container">
    <div class="historyTile__wrapper">
      <div class="historyTile__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $title,
          'headerTag' => 'h4'
        ]); ?>
      </div>
      <div class="historyTile__tiles">
      <?php if($historyTiles):?>
      <?php foreach($historyTiles as $historyTile):?>
        <div class="historyTile__tile">
        <?php get_template_part('/includes/components/cards/historyTile', null, [
          'title' => $historyTile['history_title'],
          'desc' => $historyTile['history_description'],
          'img' => $historyTile['history_image']
        ]); ?>
              </div>

        <?php endforeach;?>
        <?php else:?>
          <?php endif;?>
      </div>
    </div>
  </div>
</section>