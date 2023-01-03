<?php
  $hero = get_field('blog_hero', $post->ID);
?>

<section class="section blogHero" data-section>
  <div class="container">
    <div class="blogHero__wrapper">
      <div class="blogHero__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $hero['header'],
        'headerTag' => 'h3',
        'subtitle' => $hero['subtitle'],
        'text' => $hero['text'],
        'isTextBig' => true
      ]); ?>
      </div>
      <div class="blogHero__form">
        <div class="blogHero__formWrapper">
          <div class="blogHero__formHeader">
            <p class="p p--big"><?= $hero['form']['title'] ?></p>
          </div>
          <div class="blogHero__formInner">
          <?= do_shortcode($hero['form']['shortcode']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>