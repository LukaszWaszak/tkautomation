<?php
  $rootClass = '';

  $settings = $section['settings'];
  $padding = $settings['padding'];
  $settingsWithBg = $settings['with_background'];

  $header = $section['header'];
  $slides = $section['slider'];
  $image = $section['image'];
  $button = $section['button'];
  $navOnTop = $section['nav_on_top'];

  $rootClass .= ($navOnTop) ? ' imageCardsSlider--navOnTop' : '';
  $rootClass .= (isset($padding) && !is_null($padding) && $padding != 'default') ? ' section--padding-'.$padding : '';
?>

<section class="section imageCardsSlider <?= $rootClass ?>" data-section>
  <div class="container">
    <div class="imageCardsSlider__wrapper">
      <div class="imageCardsSlider__image">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $image
      ]) ?>
      </div>
      <div class="imageCardsSlider__content" data-cards-slider>
        <div class="imageCardsSlider__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $header,
          'headerTag' => (!$navOnTop) ? 'h3' : 'h4'
        ]) ?>
        <?php if ($navOnTop): ?>
        <div class="imageCardsSlider__nav">
          <div class="imageCardsSlider__navButton">
          <?php get_template_part('/includes/components/buttons/navButton', null, [
            'icon' => 'arrow-left',
            'attr' => 'data-cards-slider-prev'
          ]) ?>
          </div>
          <div class="imageCardsSlider__navButton">
          <?php get_template_part('/includes/components/buttons/navButton', null, [
            'icon' => 'arrow-right',
            'attr' => 'data-cards-slider-next'
          ]) ?>
          </div>
        </div>
        <?php endif; ?>
        </div>
        <div class="imageCardsSlider__slider swiper-container" data-cards-slider-container>
          <div class="imageCardsSlider__sliderInner swiper-wrapper">
          <?php foreach($slides as $key => $item): ?>
            <div class="imageCardsSlider__sliderSlide swiper-slide" data-cards-slider-slide>
            <?php get_template_part('/includes/components/cards/iconTextCard', null, [
              'icon' => $item['icon'],
              'title' => $item['title'],
              'text' => $item['text']
            ]) ?>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
        <?php if (!$navOnTop): ?>
        <div class="imageCardsSlider__bottom">
          <?php if (!is_null($button) && $button['text'] != ''): ?>
            <div class="imageCardsSlider__button">
            <?php get_template_part('/includes/components/button', null, [
              'text' => $button['text'],
              'url' => $button['link']
            ]) ?>
            </div>
          <?php endif; ?>
          <div class="imageCardsSlider__nav">
            <div class="imageCardsSlider__navButton">
            <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-left',
              'attr' => 'data-cards-slider-prev'
            ]) ?>
            </div>
            <div class="imageCardsSlider__navButton">
            <?php get_template_part('/includes/components/buttons/navButton', null, [
              'icon' => 'arrow-right',
              'attr' => 'data-cards-slider-next'
            ]) ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>