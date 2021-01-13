</main>
  <footer>

    <div class="wrapper">

    <div class="footerContainer">

      <p class="footerLogo"><?php the_field('footer_logo', 'option'); ?></p>

      <div class="socialContainer">
        <p class="socialText"><?php the_field('social_text', 'option'); ?></p>

        <!-- Social icons -->
        <?php wp_nav_menu( array(
            'theme_location' => 'social',
            'container_class' => 'socialMenu'
          )); ?>
        </div>

      </div>

    </div>

  </footer>

<?php wp_footer(); ?>



</body>
</html>