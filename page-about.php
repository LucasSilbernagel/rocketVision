<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<div class="wrapper">

  <div class="content">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


      <!-- Page header -->
      <h1 class="about-h1"><?php the_title(); ?></h1>

      <!-- Background image holder -->
      <div class="rocketsBackground"></div>


      <!-- Our Beginnings section -->
      <div class="beginnings">
        <div class="beginningsText">
          <h2><?php the_field('beginnings_header'); ?></h2>
          <p><?php the_field('beginnings_first_paragraph'); ?></p>
          <p><?php the_field('beginnings_second_paragraph'); ?></p>
          <p><?php the_field('beginnings_third_paragraph'); ?></p>
        </div>
        <div class="beginningsImageContainer">
          <?php
            $image = get_field('beginnings_image');
            if( $image ) { ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php } ?>
        </div>
      </div>



      <!-- Our Mission section -->
      <div class="mission">
        <h2><?php the_field('mission_header') ?></h2>
        <p><?php the_field('mission_first_paragraph') ?></p>
        <p><?php the_field('mission_second_paragraph') ?></p>
      </div>

    <?php endwhile; // end the loop?>




    <!-- Our Team section -->
    <div class="ourTeamContainer">

      <!-- Section header -->
      <h2 class="about-h2">Our team</h2>

      <?php


      // Leadership team
      $leadership_query = new WP_Query(
        array(
            'post_type' => 'team_members',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'tax_query' => array(
                  array(
                    'taxonomy' => 'team', // what taxonomy are we querying by?
                    'field' => 'slug', // what field is the query? (other options are the term_id or name)
                    'terms'    => 'leadership', // what specific term are we querying by?
                  ))
          )
      );
      // The Loop for leadership
      ?><h3 class="teamHeader">Leadership</h3><?php
      ?><div class="leaderContainer"><?php
        if ( $leadership_query->have_posts() ) { ?>
          <?php while ( $leadership_query->have_posts() ) { 
              $leadership_query->the_post(); ?>
              <div class="personContainer">
                <a href="<?php the_permalink(); ?>">
                  <div class="teammatesImageContainer">
                          <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, array('class' => 'featured-image')); ?>
                        </div>
                        <h3 class="personName"><?php the_title(); ?></h3>
                        <p class="position"><?php the_field('job_title'); ?></p>
                </a>
              </div>
          <?php } ?> </div> <?php
          /* Restore original Post Data */
          wp_reset_postdata();
        } else { ?>
          <!-- no posts found -->
          <p>There are no leaders</p>
      <?php }




      // Development team
      $developers_query = new WP_Query(
          array(
              'post_type' => 'team_members',
              'posts_per_page' => -1,
              'tax_query' => array(
                    array(
                      'taxonomy' => 'team', // what taxonomy are we querying by?
                      'field' => 'slug', // what field is the query? (other options are the term_id or name)
                      'terms'    => 'development-team', // what specific term slug are we querying by?
                    ))
            )
      );
      ?><h3 class="teamHeader">Development Team</h3><?php
      ?><div class="groupContainer"><?php
      // The Loop for developers team
      if ( $developers_query->have_posts() ) { ?>
          <?php while ( $developers_query->have_posts() ) { 
              $developers_query->the_post(); ?>
              <div class="personContainer">
                      <a href="<?php the_permalink(); ?>">
                        <div class="teammatesImageContainer">
                          <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, array('class' => 'featured-image')); ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                      </a>
                    </div>
          <?php } ?> </div> <?php
          /* Restore original Post Data */
          wp_reset_postdata();
      } else { ?>
          <!-- no posts found -->
          <p>There are no developers</p>
      <?php }




      // Design team
      $design_query = new WP_Query(
          array(
              'post_type' => 'team_members',
              'posts_per_page' => -1,
              'tax_query' => array(
                    array(
                      'taxonomy' => 'team', // what taxonomy are we querying by?
                      'field' => 'slug', // what field is the query? (other options are the term_id or name)
                      'terms'    => 'design-team', // what specific term slug are we querying by?
                    ))
            )
      );
      ?><h3 class="teamHeader">Design Team</h3><?php
      ?><div class="groupContainer"><?php
      // The Loop for design team
      if ( $design_query->have_posts() ) { ?>
          <?php while ( $design_query->have_posts() ) { 
              $design_query->the_post(); ?>
              <div class="personContainer">
                      <a href="<?php the_permalink(); ?>">
                        <div class="teammatesImageContainer">
                          <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, array('class' => 'featured-image')); ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                      </a>
                    </div>
          <?php } ?> </div> <?php
          /* Restore original Post Data */
          wp_reset_postdata();
      } else { ?>
          <!-- no posts found -->
          <p>There are no designers</p>
      <?php } ?>

    </div> <!-- ourTeamContainer -->

    <?php the_content(); ?>

  </div> <!-- /,content -->

</div> <!-- wrapper -->

<?php get_footer(); ?>