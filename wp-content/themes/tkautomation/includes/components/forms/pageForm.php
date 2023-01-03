<?php
  $form = $args['form'];
  $header = $args['header'];
  $subtitle = $args['subtitle'];
?>

<div class="pageForm">
  <div class="pageForm__wrapper">
    <div class="pageForm__circle"></div>
    <div class="pageForm__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
    ]) ?>
    </div>
    <?php if (!is_null($subtitle)): ?>
      <div class="pageForm__subtitle">
        <span><?= $subtitle ?></span>
      </div>
    <?php endif; ?>
    <div class="pageForm__form">
    <?= do_shortcode($form); ?>
    </div>
  </div>
</div>