<?php /* Template Name: Contact */ ?>

<?php get_header();  ?>

<div class="wrapper">

  <div class="content">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <h1 class="contactHeader"><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <div class="rocketsBackground"></div>

    <?php endwhile; // end the loop?>
  </div> <!-- /,content -->

</div>

<?php get_footer(); ?>