<?php
  $header = $section['header'];
  $content = $section['content'];
?>
<div class="summary" id="summary">
  <div class="summary__wrapper">
    <div class="summary__header">
    <?php get_template_part('/includes/components/text', null, [
      'header' => $header,
      'headerTag' => 'h4'
    ]) ?>
    </div>
    <div class="summary__content">
    <?php get_template_part('/includes/components/flexible/text_editor', null, [
      'editor' => $content
    ]) ?>
    </div>
  </div>
</div>