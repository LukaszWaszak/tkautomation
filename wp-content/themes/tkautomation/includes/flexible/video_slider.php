<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

  $title = $section['title'];
  $slidesGroup = $section['slides_group'];
  $slides = $slidesGroup['slides'];

  $rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';
?>

<section class="section videoSlider <?= $rootClass ?>" data-section>
<div class="videoSliderBg">
</div>

  <div class="container">
    <div class="videoSlider__wrapper">
      <div class="videoSlider__header">
        <h4><?= $title?></h4>
      </div>
      <div class="videoSlider__slider">
        <?php if($slides):?>
          <?php get_template_part('/includes/components/sliders/videoSliderCard', null, [
          'slides' => $slides
        ]) ?>
        <?php else:?>
          <?php endif;?>
</div>
</div>
</div>
</section>