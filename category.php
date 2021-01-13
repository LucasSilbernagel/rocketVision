<?php get_header(); ?>

<div class="wrapper">
  <div class="content">
    <h1 class="about-h1"><?php single_cat_title(); ?></h1>
    <?php
      $category_description = category_description();
      if ( ! empty( $category_description ) )
        echo '' . $category_description . '';
        get_template_part( 'loop', 'category' );
      ?>

  </div> <!-- /.content -->

</div>

<?php get_footer(); ?>