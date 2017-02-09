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


  wp_enqueue_style( 'dashicons' );

  wp_enqueue_script( 'responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
  $output = array(
  	'mainMenu' => __( '', 'my-theme-text-domain' ),
  	'subMenu'  => __( 'Menu', 'my-theme-text-domain' ),
  );
  wp_localize_script( 'responsive-menu', 'ResponsiveMenuL10n', $output );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );
