<?php
  $description = $args['description'];
  $name = $args['name'];
  $avatar = $args['avatar'];
  $city = $args['city'];
  $stars = intval($args['stars']);
?>

<div class="reviewCard">
  <div class="reviewCard__wrapper">
    <div class="reviewCard__description">
    <?php get_template_part('/includes/components/text', null, [
      'text' => $description,
    ]) ?>
    </div>
    <div class="reviewCard__bottom">
      <div class="reviewCard__avatar">
      <?php get_template_part('/includes/components/image/imageBox', null, [
        'image' => $avatar
      ]) ?>
      </div>
      <div class="reviewCard__details">
        <div class="reviewCard__person">
          <div class="reviewCard__personName">
            <p class="p p--big"><?= $name ?></p>
          </div>
          <div class="reviewCard__divider"></div>
          <div class="reviewCard__personCity">
            <p class="p"><?= $city ?></p>
          </div>
        </div>
        <div class="reviewCard__stars">
        <?php for($i = 1; $i <= $stars; $i++): ?>
          <div class="reviewCard__star">
          <?php get_template_part('/includes/components/image/imageBox', null, [
            'image' => [
              'url' => THEME_URL.'/public/images/star.svg',
              'alt' => __('Gwiazdka', 'tutlo')
            ]
          ]) ?>
          </div>
        <?php endfor; ?>
        </div>
      </div>
    </div>
  </div>
</div>