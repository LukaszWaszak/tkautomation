<section class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs__wrapper">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
      }
    ?>
    </div>
  </div>
</section>