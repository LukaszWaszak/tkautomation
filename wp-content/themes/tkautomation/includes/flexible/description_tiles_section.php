<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $header = $section['header'];
  $headerDesc = $section['header_description'];
  $descTiles = $section['description_tiles'];
  ?>

<section class="section descTile <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="descTile__wrapper">
      <div class="descTile__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'headerTag' => 'h4',
          'text' => $headerDesc,
          'isTextBig' => true,
        ]); ?>
      </div>

      <div class="descTile__tiles">
      <?php if($descTiles):?>
      <?php foreach($descTiles as $tile):?>
        <div class="descTile__tile">
        <?php get_template_part('/includes/components/cards/descTileCard', null, [
          'icon' => $tile['icon_tile'],
          'title' => $tile['title_tile'],
          'desc' => $tile['description_tile']
        ]); ?>
              </div>

        <?php endforeach;?>
        <?php else:?>
          <?php endif;?>
      </div>
    </div>
  </div>
</section>