<?php
  $header = $args['header'];
  $subtitle = $args['subtitle'];
  $text = $args['text'];
  $isTextBig = $args['isTextBig'];

  $headerTag = 'h1';
  $headerTag = (isset($args['headerTag']) && $args['headerTag'] != '') ?$args['headerTag'] : $headerTag;

  $subtitleTag = 'h5';
  $subtitleTag = (isset($args['subtitleTag']) && $args['subtitleTag'] != '') ?$args['subtitleTag'] : $subtitleTag;

  $textTag = 'p';
  $textTag = (isset($args['textTag']) && $args['textTag'] != '') ?$args['textTag'] : $textTag;

  $textClass = '';
  $textClass = (isset($isTextBig) && $isTextBig) ? $textTag.' '.$textTag.'--big' : '';
?>

<div class="text">
  <?php if (!is_null($header)): ?>
    <div class="header__bg">
    <div class="text__header">
      <<?= $headerTag ?>><?= $header ?></<?= $headerTag ?>>
    </div>
    </div>
  <?php endif; ?>
  <?php if (!is_null($subtitle)): ?>
    <div class="text__subtitle">
      <<?= $subtitleTag ?>><?= $subtitle ?></<?= $subtitleTag ?>>
    </div>
  <?php endif; ?>
  <?php if (!is_null($text)): ?>
  <div class="text__text">
    <<?= $textTag ?> class="<?= $textClass ?>"><?= $text ?></<?= $textTag ?>>
  </div>
  <?php endif;?>
</div>