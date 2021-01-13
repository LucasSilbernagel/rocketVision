<!-- Custom code block: images-text -->
<?php the_field('text_image'); ?>
<?php $image = get_field('image_text');
if( $image ) {
	  echo wp_get_attachment_image( $image, 'thumbnail');
} ?>