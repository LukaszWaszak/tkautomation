<?php /* Template Name: Materiały do nauki */
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
    get_template_part('/includes/sections/resourcesHero');
    get_template_part('/includes/sections/relatedResources');
  ?>
</main>
<div data-vue-component>
  <v-popup></v-popup>
</div>
<?php
  get_footer();