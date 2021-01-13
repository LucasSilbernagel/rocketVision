<!-- Single blog post -->

<?php get_header(); ?>
<div class="wrapper">
  <div class="content">

  <?php
function initials($authName) 
{
	//if the author name is 0 characters long, stop the function
	if (strlen($authName) == 0) 
        return; 
	// Take the entire author name and split it every time there's a space. Use the 'explode()' function: https://www.w3schools.com/php/func_string_explode.asp and store them in a variable called split 
	$split = explode(" ", $authName);
	//var_dump($split);
	//put the SECOND string in the array (the last name), into a variable called $splitSecond. Remember the FIRST string will be [0] and the second will be [1]
	$splitSecond = $split[1];
	//echo the first name
	echo $split[0];
	//give us a space
	echo " ";
	//if you use [0] on an array (like $split), you'll get the first item/name, BUT if you use [0] with a STRING, it will give you the first LETTER
	echo $splitSecond[0];
	echo ".";
}
?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <div class="singlePost" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="singleBlogTopContainer">

          <div class="postHeaderContainer">

            <p class="postCategory"><?php the_category(); ?></p>
            <h1 class="postTitle"><?php the_title(); ?></h1>

            <?php $authName = get_the_author(); ?>
            <h2 class="postAuthor">By <?php initials($authName); ?></h2>

          </div>

          <div class="postImageContainer">
            <?php echo wp_get_attachment_image(
                get_post_thumbnail_id(), 
                'large', 
                false,
                array('class' => 'featured-image')
            ); ?>
          </div>

        </div>

        <div class="entryContent">
          <?php the_content(); ?>
          <?php wp_link_pages(array(
            'before' => '<div class="page-link"> Pages: ',
            'after' => '</div>'
          )); ?>
        </div><!-- .entry-content -->

      </div><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

  </div> <!-- /.content -->

</div>

<?php get_footer(); ?>