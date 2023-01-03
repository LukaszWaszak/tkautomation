<?php
  $ID = $post->ID;
  $tableOfContents = get_field('article_table_of_contents', $ID);
  $intro = apply_filters('the_content', $post->post_content);

  $author = apply_filters('getUserData', $post->post_author);
?>

<section class="section articleContent" data-section>
  <div class="container">
    <div class="articleContent__wrapper">
      <?php if(!is_null($tableOfContents) && $tableOfContents['active']): ?>
      <div class="articleContent__toc">
        <?php get_template_part('/includes/components/toc', null, [
          'table' => $tableOfContents['content']
        ]) ?>
      </div>
      <?php endif; ?>
      <div class="articleContent__content">
        <div class="articleContent__intro">
          <?php get_template_part('/includes/components/flexible/text_editor', null, [
            'editor' => $intro
          ]) ?>
        </div>
        <div class="articleContent__divider"></div>
        <?php get_template_part('/includes/components/flexible/_core'); ?>
        <div class="articleContent__divider articleContent__divider--small"></div>
        <div class="articleContent__bottom">
          <div class="articleContent__author">
          <?php get_template_part('/includes/components/cards/authorCard', null, [
            'image' => $author['avatar'],
            'role' => __('Autor', 'tutlo'),
            'name' => $author['name'].' '.$author['surname']
          ]) ?>
          </div>
          <div class="articleContent__ratings">
          <?php get_template_part('/includes/components/article/articleRating', null, []); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>