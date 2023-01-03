<?php

$id = get_the_ID();

$isBreadcrumbs = get_field('breadcrumbs_visible', $id);

get_header(); ?>

<main class="sections <?= $isBanner || $isHeroImage ? 'sections--moreSpaceAbove' : '' ?>" id="content">

  <?php
    if ($isBreadcrumbs) {
      get_template_part('includes/sections/breadcrumbs');
    }

    get_template_part('includes/flexible/_core');
  ?>

</main>

<?php get_footer();
