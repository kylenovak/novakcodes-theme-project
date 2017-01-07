<?php

// Add a favicon to the Head tag.
function my_favicon() {
  $favicon_location = get_stylesheet_directory_uri() . '/images/favicon.ico';
  echo '<link rel="shortcut icon" type="image/x-icon" href="' . $favicon_location . '" />';
}
add_action( 'wp_head', 'my_favicon') ;
