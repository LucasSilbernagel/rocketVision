<?php /* Template Name: Services */ ?>

<?php get_header();  ?>

<div class="wrapper">

  <div class="content">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <h1 class="services-h1"><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <div class="rocketsBackground"></div>

      <!-- Tabbed section -->
      <div class="tabSection">
        <!-- Services repeater for tab titles -->
        <?php
        // check if the repeater field has rows
        if( have_rows('services') ): ?>
          <ul id="tabs" class="tabLabels">
            <!-- Loop through the rows of data -->
            <?php while ( have_rows('services') ) : the_row();
                // display a sub field value
                $service_title = get_sub_field('service_title');
            ?>
            <li>
              <div class="serviceTitleContainer">
                <a tabindex="0" class="serviceTitle" id="tab<?php echo get_row_index(); ?>"><?php echo $service_title ?></a>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

        <!-- Services repeater for tab content -->
        <?php
        // check if the repeater field has rows
        if( have_rows('services') ): ?>
          <ul id="tabs" class="tabContentContainer">
            <!-- Loop through the rows of data -->
            <?php while ( have_rows('services') ) : the_row();
                // display a sub field value
                $service_title = get_sub_field('service_title');
                $service_description = get_sub_field('service_description');
            ?>
            <li>
              <div class="tabContent" aria-label="<?php echo $service_title ?>" id="tab<?php echo get_row_index(); ?>C">
                <p class="serviceDescription"><?php echo $service_description ?></p>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

      <?php endwhile; // end the loop?>

    </div>


  </div> <!-- /,content -->

</div>

<?php get_footer(); ?>