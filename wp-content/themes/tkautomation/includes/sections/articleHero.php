<?php
  $ID = $post->ID;
  $author = apply_filters('getUserData', $post->post_author);
  $title = get_the_title($ID);
  $categories = get_the_terms($ID, 'category');
  $publishDate = get_the_date('d.m.Y', $ID);
  $readTime = get_field('article_read_time', $ID);

  $imageID = get_post_thumbnail_id( $post->ID );
  $imageUrl = wp_get_attachment_image_src( $imageID, '');
  $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
?>

<section class="section articleHero" data-section>
  <div class="container">
    <div class="articleHero__top">
      <div class="articleHero__publishDate">
        <p class="p"><?= __('Opublikowano', 'tutlo') ?> <?= $publishDate ?></p>
      </div>
      <div class="articleHero__title">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $title,
        'headerTag' => 'h4'
      ]); ?>
      </div>
      <div class="articleHero__details">
        <div class="articleHero__detail">
          <div class="articleHero__detailLabel">
            <p class="p"><?= __('Kategorie', 'tutlo') ?>:</p>
          </div>
          <?php foreach($categories as $key => $item): ?>
            <div class="articleHero__detailValue">
              <p class="p"><?= $item->name ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="articleHero__detail">
          <div class="articleHero__detailLabel">
            <p class="p"><?= __('Czas czytania', 'tutlo') ?>:</p>
          </div>
          <div class="articleHero__detailValue">
            <p class="p"><?= $readTime ?></p>
          </div>
        </div>
        <div class="articleHero__detail">
          <div class="articleHero__detailLabel">
            <p class="p"><?= __('Autor', 'tutlo') ?>:</p>
          </div>
          <div class="articleHero__detailValue">
            <p class="p"><?= $author['name'] ?> <?= $author['surname'] ?></p>
          </div>
        </div>
      </div>
      <div class="articleHero__thumbnail">
        <div class="articleHero__thumbnailInner">
        <?php get_template_part('/includes/components/image/imageBox', null, [
          'image' => [
            'url' => $imageUrl[0],
            'alt' => $imageAlt
          ]
        ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
