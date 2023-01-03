<?php
  $postID = get_the_ID();
  $heroActive = get_field('hero_active', $postID);
  $heroHeader = get_field('hero_header', $postID);
  $heroSubtitle = get_field('hero_subtitle', $postID);
  $heroText = get_field('hero_text', $postID);
  $heroImage = get_field('hero_image', $postID);
  $heroButtons = get_field('hero_buttons', $postID);
  $heroVariant = get_field('hero_variant', $postID);

  $variant = (!is_null($heroVariant) && $heroVariant !== 'default') ? 'heroHeader--'.$heroVariant : '';
?>

<?php if ($heroActive || is_null($heroActive)): ?>
<section class="heroHeader <?= $variant ?>" data-section >
  <div class="heroHeader__bg" style='background-image:url("<?=$heroImage['url']?>"); background-size:cover;'> 
    <div class="heroHeader__inner">
      <div class="container">

      <div class="heroHeader__text">
        <?php get_template_part('/includes/components/text', null, [
          'header' => $heroHeader,
          'subtitle' => $heroSubtitle,
          'text' => $heroText,
          'headerTag' => 'h3',
          'textTag' => ($variant == '') ? 'h5' : 'p',
          'isTextBig' => ($variant != '')
        ]); ?>
        <?php if (!is_null($heroButtons) && $heroButtons): ?>
          <div class="heroHeader__buttons">
          <?php if(isset($heroButtons) && count($heroButtons) > 0):
            foreach($heroButtons as $key => $item): $button = $item['button'];
          ?>
            <div class="heroHeader__button">
            <?php get_template_part('/includes/components/button', null, [
              'text' => $button['text'],
              'url' => $button['link']['url'],
              'big' => ($variant == ''),
              'theme' => ($key == 0) ? 'default' : 'transparent',
              'attr' => 'data-page-nav-replace-main-button'
            ]); ?>
            </div>
          <?php endforeach; endif; ?>
          </div>
        <?php endif; ?>
      </div>
    
    </div>
  </div>
  </div>
</section>
<?php endif; ?>