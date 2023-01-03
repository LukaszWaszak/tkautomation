<?php /* Template Name: Strona Główna */
  get_header();

  $isBreadcrumbs = get_field('breadcrumbs_visible', get_the_ID());
?>
<main class="sections" id="content">
  <?php
    if ($isBreadcrumbs) {
      get_template_part('includes/sections/breadcrumbs');
    }
  ?>

  <?php get_template_part('/includes/sections/heroHeader'); ?>
  <?php get_template_part('/includes/flexible/_core'); ?>
</main>
<div data-vue-component>
  <v-popup></v-popup>
</div>
<?php
  get_footer();