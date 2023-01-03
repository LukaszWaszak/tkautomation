<?php
$isBreadcrumbs = get_field('breadcrumbs_visible', get_the_ID());
get_header(); ?>

<main class="sections sections--moreSpaceAbove" id="content">

  <?php
    if ($isBreadcrumbs) {
      get_template_part('includes/sections/breadcrumbs');
    }

    get_template_part('includes/sections/articleHero');
    get_template_part('includes/sections/articleContent');
    get_template_part('/includes/flexible/_core');
  ?>

</main>

<?php get_footer();
