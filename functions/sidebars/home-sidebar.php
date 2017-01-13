<?php

// Register a new sidebar.
genesis_register_sidebar( array(
  'id' => 'home-sidebar',
  'name' => 'Home Sidebar',
  'description' => 'This is the home sidebar widget area.' )
);

/**
 * Remove the default sidebar, and add the home sidebar to the homepage.
 */
function home_sidebar_logic() {
    if ( is_home() ) {
        remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
        add_action( 'genesis_after_content', 'get_home_sidebar' );
    }
}
add_action( 'get_header', 'home_sidebar_logic' );

/**
 * Retrieve the home sidebar (i.e. sidebar-home.php).
 */
function get_home_sidebar() {
    get_sidebar( 'home' );
}
