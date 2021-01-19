<?php /* Template Name: Home */ ?>

<?php get_header();  ?>

<div class="wrapper">

  <div class="content">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

      <!-- Hero section -->
      <div class="hero">
        <h1 class="homeHeader"><?php the_field('main_header'); ?></h1>
        <p><?php the_field('header_description'); ?></p>
        <?php
          $link = get_field('hero_link');
          if( $link ) { ?>
            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
        <?php } ?>
        <div class="heroImageContainer">
          <?php
            $image = get_field('background_image');
            if( $image ) { ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php } ?>
        </div>
      </div>

      <!-- About section -->
      <div class="about">
        <div class="homeText">
          <h2><?php the_field('about_header'); ?></h2>
          <p><?php the_field('about_description'); ?></p>
          <?php
            $link = get_field('about_link');
            if( $link ) { ?>
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
          <?php } ?>
        </div>
        <div class="homeImageContainer">
          <?php
            $image = get_field('about_image');
            if( $image ) { ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php } ?>
        </div>
      </div>

      <!-- Featured Employee section -->
      <div class="featured">
        <?php $employee = get_field('featured_employee'); ?>
        <div class="homeImageContainer">
          <?php echo wp_get_attachment_image(
              get_post_thumbnail_id($employee->ID),
              'square-large'
          );?>
        </div>
        <div class="homeText">
          <?php if($employee->post_title): ?>
            <h3><?php the_field('section_title'); ?></h3>
            <h2><?php echo $employee->post_title; ?></h2>
          <?php endif; ?>
          <p><?php echo wp_trim_words($employee->post_content, 50); ?></p>
        </div>
      </div>

    <?php endwhile; // end the loop?>
  </div> <!-- /,content -->

</div>

<?php get_footer(); ?>