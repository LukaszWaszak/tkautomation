<?php /* Template Name: Blog - Strona zbiorcza */
  get_header();

  $isBreadcrumbs = get_field('breadcrumbs_visible', get_the_ID());
?>
<main class="sections" id="content">
  <?php
    if ($isBreadcrumbs) {
      get_template_part('includes/sections/breadcrumbs');
    }
  ?>

  <?php
    get_template_part('/includes/sections/blogHero');
    get_template_part('/includes/sections/blogPosts');
    get_template_part('/includes/flexible/_core');
  ?>
</main>
<div data-vue-component>
  <v-popup></v-popup>
</div>
<?php
  get_footer();