<?php
  $list = $args['list'];

  $media = $list['media'];
  $companies = $list['companies'];
?>
<section class="section partners">
  <div class="container">
    <div class="partners__wrapper">
      <div class="partners__list">
        <div class="partners__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $media['header'],
          'headerTag' => 'h5'
        ]) ?>
        </div>
        <div class="partners__logos">
        <?php foreach($media['logos'] as $key => $item):
          $logo = $item['logo'];
        ?>
          <div class="partners__item">
          <?php get_template_part('/includes/components/image/imageBox', null, [
            'image' => $logo,
            'theme' => 'grayscale',
            'autoHeight' => true
          ]) ?>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
      <div class="partners__list">
        <div class="partners__header">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $companies['header'],
          'headerTag' => 'h5'
        ]) ?>
        </div>
        <div class="partners__logos">
        <?php foreach($companies['logos'] as $key => $item):
          $logo = $item['logo'];
        ?>
          <div class="partners__item">
          <?php get_template_part('/includes/components/image/imageBox', null, [
            'image' => $logo,
            'theme' => 'grayscale',
            'autoHeight' => true
          ]) ?>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>