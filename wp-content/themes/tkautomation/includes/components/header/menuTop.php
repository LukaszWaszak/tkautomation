<?php
  $items = $args['items'];
  $pageID = $args['pageID'];
  $categories = $args['categories'];
?>
<div class="menuTop">
  <div class="container">
    <div class="menuTop__inner">
    <?php foreach($items as $key => $item):
      $activeCat = false;
      $link = $item['url'];
      $id = url_to_postid($link);
      $category = wp_get_post_terms($id, 'audience');

      if (!is_null($category) && !is_null($categories)) {
        $category = array_map(function($item) {
          return $item->term_id;
        }, $category);

        $activeCat = array_intersect($category, $categories);
      }
    ?>
      <div class="menuTop__item <?= ($pageID == $link->ID || $activeCat) ? 'menuTop__item--active' : '' ?>">
        <a
          href="<?= $link ?>"
          class="link link--small"
        >
          <?= $item['name']; ?>
        </a>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>