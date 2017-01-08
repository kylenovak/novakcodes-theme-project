<?php

// Register a new sidebar.
genesis_register_sidebar( array(
  'id' => 'home-sidebar-subscribe',
  'name' => 'Home Sidebar Subscribe',
  'description' => 'This is the home sidebar subscribe widget area.' )
);

/**
 * Add the home sidebar subscribe to the homepage.
 */
function home_sidebar_subscribe_logic() {
    if ( is_home() ) {
        add_action( 'genesis_after_header', 'get_home_sidebar_subscribe' );
    }
}
add_action( 'get_header', 'home_sidebar_subscribe_logic' );

/**
 * Retrieve the home sidebar (i.e. sidebar-home-subscribe.php).
 */
function get_home_sidebar_subscribe() {
    get_sidebar( 'home-subscribe' );
}
