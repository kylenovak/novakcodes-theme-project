<?php

// Add the featured image to single posts.
function featured_post_image() {
  if ( ! is_singular( 'post' ) )  return;
	the_post_thumbnail('large');
}
add_action( 'genesis_entry_content', 'featured_post_image', 8 );
