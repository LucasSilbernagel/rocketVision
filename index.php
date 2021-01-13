<?php //index.php is the last resort template, if no other templates match ?>

<!-- I'm using this as the blog archive page. -->

<?php get_header(); ?>

<div class="wrapper">

  <div class="rocketsBackground"></div>

  <h1>Blog</h1>

  <!-- Category selector -->
  <?php $categories = get_categories();
  if($categories):?>
      <form class="categoriesForm" id="categoriesForm" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <select name="cat" id="cat"">
          <option value="Categories">Categories</option>
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category ->term_id ?>"><?php echo $category->name; ?></option>
        <?php endforeach; ?>
        </select>
      </form>
  <?php endif; ?> 

  <div class="content">





      <?php get_template_part( 'loop', 'index' );	?>
  </div> <!--/.content -->

</div> 

<?php get_footer(); ?>