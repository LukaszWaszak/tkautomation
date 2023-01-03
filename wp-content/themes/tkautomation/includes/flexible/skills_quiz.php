<?php
  $rootClass = '';
  $widget = $section['widget_frame'];
?>

<section class="section skillsQuiz">
  <div class="container">
    <div class="skillsQuiz__wrapper">
    <?php get_template_part('/includes/components/skillsTest', null, [
      'widget' => $widget
    ]) ?>
    </div>
  </div>
</section>