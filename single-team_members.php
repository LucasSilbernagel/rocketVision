<!-- Page for each individual team member -->
<?php get_header(); ?>

<div class="wrapper">

    <div class="content">

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            
            <?php 
                $job_title = get_field('job_title'); 
                $fav_food = get_field('favourite_pizza_topping');
                $fav_band = get_field('favourite_band');
                $fav_project = get_field('favourite_project'); ?>

            <div class="teammate">
                <div class="teammateTopContainer">
                    <div class="teammateHeaderContainer">
                        <h1 class="teammateName"><?php the_title(); ?></h1>
                        <h2 class="jobTitle"><?php echo $job_title; ?></h2>
                        <h3 class="additionalInfo">Additional information:</h3>
                        <div>
                            <p>Favourite Pizza Topping: <span><?php echo $fav_food; ?></span></p>
                            <p>Favourite Band: <span><?php echo $fav_band; ?></span></p>
                            <p>Favourite Project: <a href="<?php echo $fav_project['url']; ?>"><?php echo $fav_project['title']; ?></a></p>
                        </div>
                    </div>
                    <div class="teammateImageContainer">
                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, array('class' => 'featured-image')); ?>
                    </div>
                </div>
                <div class="teammateBio">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>

    </div> <!-- end of content -->

</div> <!-- end of wrapper -->

<?php get_footer(); ?>