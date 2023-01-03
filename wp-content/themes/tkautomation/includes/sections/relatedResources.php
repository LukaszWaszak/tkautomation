<?php
  $ID = get_the_ID();
  $related = get_field('single_resource_related', $ID);

  $active = $related['active'];
  $header = $related['header'];
  $button = $related['button'];

  $type = get_the_terms($ID, 'resource_type');
  $topic = get_the_terms($ID, 'topic');
  $audience = get_the_terms($ID, 'audience');

  $type = apply_filters('mapTermsValues', $type);
  $topic = apply_filters('mapTermsValues', $topic);
  $audience = apply_filters('mapTermsValues', $audience);

  $posts = apply_filters('getRelatedResources', $type, $topic, $audience, $ID);
?>

<?php if ($related['active']): ?>
  <section class="section relatedResources <?= $rootClass ?>" data-section data-bg-to-footer>
  <div class="container">
    <div class="relatedResources__top">
      <div class="relatedResources__header">
      <?php get_template_part('/includes/components/text', null, [
        'header' => $header,
        'headerTag' => 'h4'
      ]) ?>
      </div>
      <div class="relatedResources__button">
      <?php get_template_part('/includes/components/button', null, [
        'text' => $button['text'],
        'url' => $button['link']
      ]) ?>
      </div>
    </div>
    <div class="relatedResources__list">
    <?php foreach($posts as $key => $item):
    ?>
      <div class="relatedResources__item">
      <?php get_template_part('/includes/components/cards/resourceCard', null, [
        'title' => $item['title'],
        'image' => $item['thumbnail'],
        'url' => $item['url']
      ]); ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>