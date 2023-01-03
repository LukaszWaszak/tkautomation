<?php
$rootClass = '';

$settings = $section['settings'];
$padding = $settings['padding'];
$sectionPadding = (isset($padding) && !is_null($padding) && $padding != 'default') ? 'section--padding-'.$padding : '';

$title = $section['title'];
$desc = $section['description'];
$slider = $section['slider'];
$sliderPhotos = $slider['slider_photos'];


$rootClass .= ($sectionPadding != '') ? ' '.$sectionPadding : '';
?>

<section class="section companyBigPhotoSlider <?= $rootClass ?>" data-section>
  <div class="container">
  <div class="companyBigPhotoSlider__wrapper">
    <div class="companyBigPhotoSlider__header">
  <div class="companyBigPhotoSlider__title">
  <h4><?=$title?></h4>
  </div>
  <div class="companyBigPhotoSlider__desc">
    <p><?= $desc ?></p>
  </div>
  </div>
    <div class="companyBigPhotoSlider__slide">
      <div class="companyBigPhotoSlider__Photos">
        <?php if($sliderPhotos):?>
      <?php get_template_part('/includes/components/sliders/companyBigSlider', null, [
          'image' => $sliderPhotos
        ]) ?>
        <?php else:?>
        <?php endif;?>
      </div>
    </div>
  </div>
  </div>
</section>