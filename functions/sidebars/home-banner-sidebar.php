<?php

// Register a new sidebar.
genesis_register_sidebar( array(
  'id' => 'home-banner-sidebar',
  'name' => 'Home Banner Sidebar',
  'description' => 'This is the home banner sidebar widget area.' )
);

/**
 * Add the sidebar home banner to the homepage.
 */
function home_banner_sidebar_logic() {
    if ( is_home() ) {
        add_action( 'genesis_after_header', 'get_home_banner_sidebar' );
    }
}
add_action( 'get_header', 'home_banner_sidebar_logic' );

/**
 * Retrieve the home sidebar (i.e. sidebar-home-banner.php).
 */
function get_home_banner_sidebar() {
    get_sidebar( 'home-banner' );
}
