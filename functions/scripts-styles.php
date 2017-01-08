<?php

// Put style sheets and scripts in the correct order and place.
function my_enqueue_styles() {
  $parent_style = 'parent-style';

  // Add the Genesis parent style sheet.
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

  // Add the child style sheet.
  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get( 'Version' )
  );

  // Add Font Awesome icons.
  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );
