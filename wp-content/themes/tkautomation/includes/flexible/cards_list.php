<?php
  $settings = $section['settings'];
  $padding = $settings['padding'];

  $header = $section['header'];
  $list = $section['list'];

  $sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';
?>

<section class="section <?= $sectionPadding ?> cardsList" data-section>
  <div class="container">
    <div class="cardsList__wrapper">
      <div class="cardsList__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4',
      ]) ?>
      </div>
      <div class="cardsList__cards">
      <?php foreach($list as $key => $item):
        get_template_part('/includes/components/cards/iconDetailsCard', null, [
          'icon' => $item['icon'],
          'title' => $item['title'],
          'text' => $item['text']
        ]);
      endforeach; ?>
      </div>
    </div>
  </div>
</section>