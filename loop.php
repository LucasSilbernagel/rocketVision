<?php // If there are no posts to display, such as an empty archive page ?>

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

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<ul class="articleContainer">

	<?php while ( have_posts() ) : the_post(); ?>

		<li>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_post_thumbnail('medium'); ?>

				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
					<?php the_title(); ?>
					</a>
				</h2>

				<?php $authName = get_the_author(); ?>
				<p class="dateAuthor"><?php initials($authName); ?> - <?php the_modified_date(); ?></p>

				<p class="articleExcerpt"><?php the_excerpt(); ?></p>

				<a class="readMore" href="<?php the_permalink(); ?>">Read more</a>

			</article><!-- #post-## -->
		</li>

	<?php endwhile; // End the loop. Whew. ?>

</ul>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div class="blogNavContainer">
		<?php njengah_number_pagination(); ?>
	</div>
<?php endif; ?>