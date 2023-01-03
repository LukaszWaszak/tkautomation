<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $rootClass = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $title = $section['title'];
  $subTitle = $section['sub_title'];
  $desc = $section['description'];
  $buttonText = $section['button_text'];
  $buttonLink = $section['button_link'];
  $partnersLogo = $section['images_partners'];
  ?>

<section id="firmy" class="section ourPartners <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="ourPartners__wrapper">
      <div class="ourPartners__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $title,
          'headerTag' => 'h4',
          'subtitle' => $subtitle,
          'subtitleTag' => 'h5',
          'text' => $desc,
        ]); ?>
        <?php if($buttonText):?>
        <?php get_template_part('/includes/components/button', null, [
          'text' => $buttonText,
          'url' => $buttonLink
        ]) ?>
        <?php else:?>
        <?php endif;?>
      </div>
      <div class="ourPartners__partners">
      <?php if($partnersLogo):?>
      <?php foreach($partnersLogo as $logo):?>
        <?php $logourl = $logo['partner_logo']['url'];?>
        <div class="ourPartners__partner">
        <img src="<?= $logourl ?>" alt="">
              </div>

        <?php endforeach;?>
        <?php else:?>
          <?php endif;?>
      </div>
    </div>
  </div>
</section>