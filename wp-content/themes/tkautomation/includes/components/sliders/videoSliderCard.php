<?php
  $slides = $args['slides'];
?>

<div class="videoSliderCard">
 
    <div class="videoSliderCard__slidesContaier">
      <div class="videoSliderCard__slidesWrapper swiper mySwiper" thumbsSlider="">
        <div class="videoSliderCard__slides swiper-wrapper" >
        <?php foreach($slides as $slide):?>
          <div class="videoSliderCard__slide swiper-slide" data-video-videoSlider data-video-videoSlider-src="<?=$slide['video']['url']?>">
            <div class="videoSliderCard__slide__img">
              <img data-videoslider-slider src="<?= $slide['front_image']['url']?>" alt="">
            </div>
            <div class="videoSliderCard__more">
      <?php get_template_part('/includes/components/buttons/videoButton', null, [
        'icon' => 'play-fill',
        'attr' => 'data-video-videoSlider-play'
      ]) ?>
      </div>
            <div class="videoSliderCard__slide__content">
              <div class="videoSliderCard__slide__content__avatar">
              <img src="<?= $slide['avatar']['url']?>" alt="">
              </div>
              <div class="videoSliderCard__slide__content__text">
              <p><?=$slide['author']?></p>
              <p><?=$slide['description']?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="videoSliderCard__slide__arrows">
          <div class="videoSliderCard__slide__arrowPrev swiper-button-prev">
            <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-left',
              'attr' => 'data-videoSlider-slider-prev'
              ]) ?>
      </div>
      <div class="videoSliderCard__slide__arrowNext swiper-button-next">
        <?php get_template_part('/includes/components/buttons/navButton', null, [
          'icon' => 'arrow-right',
          'attr' => 'data-videoSlider-slider-next'
          ]) ?>
      </div>
    </div>
  </div>
    </div>
    </div>
  </div>
</div>