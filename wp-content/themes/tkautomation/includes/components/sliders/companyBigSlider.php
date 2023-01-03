<?php
  $images = $args['image'];
?>

<div class="companyBigSlider">
  <div class="companyBigSlider_wrapper">
          <div class="companyBigSlider__bigPhoto">
    <img data-bigPhoto-slider src="" alt="">
    </div>
    </div>
    <div class="companyBigSlider__smallPhotosContainer">
      <div class="companyBigSlider__smallPhotosWrapper swiper mySwiper" thumbsSlider="">
        <div class="companyBigSlider__smallPhotos swiper-wrapper" >
        <?php foreach($images as $image):?>
          <div class="companyBigSlider__smallPhoto swiper-slide">
            <img data-smallPhotos-slider src="<?= $image['url']?>" alt="">
          </div>
          <?php endforeach; ?>
        </div>
        <div class="companyBigSlider__smallPhotosContainer__arrowPrev swiper-button-prev">
    <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-left',
              'attr' => 'data-smallphotos-slider-prev'
            ]) ?>
      </div>
      <div class="companyBigSlider__smallPhotosContainer__arrowNext swiper-button-next">
    <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-right',
              'attr' => 'data-smallphotos-slider-next'
            ]) ?>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>