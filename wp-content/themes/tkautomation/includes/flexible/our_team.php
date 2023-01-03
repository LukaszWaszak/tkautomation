<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $data = $section['data_person'];
  $title = $section['title_section'];
  ?>

<section class="section DataPerson<?= $rootClass ?>" data-section>
  <div class="container">
    <div class="DataPerson__wrapper">
      <div class="DataPerson__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $title,
          'headerTag' => 'h4'
        ]); ?>
      </div>
      <div class="DataPerson__tiles">
      <?php if($data):?>
      <?php foreach($data as $person):?>
        <div class="DataPerson__tile">
        <?php get_template_part('/includes/components/cards/PersonTileCard', null, [
          'img' => $person['image_person'],
          'name' => $person['person_name'],
          'desc' => $person['person_desc'],
          'socialIcon' => $person['social_icon'],
          'socialLink' => $person['link_to_social'],
        ]); ?>
              </div>

        <?php endforeach;?>
        <?php else:?>
          <?php endif;?>
      </div>
    </div>
  </div>
</section>