<?php

// Register a new sidebar.
genesis_register_sidebar( array(
  'id' => 'social-sidebar',
  'name' => 'Social Sidebar',
  'description' => 'This is the social sidebar widget area.' )
);

/**
 * Remove the default sidebar, and add the social sidebar.
 */
function social_sidebar_logic() {
  // Only show this sidebar on Pages and 404 page.
  if ( is_page( 'about' ) || is_page( 'contact' ) || is_page( 'privacy' ) || is_page( 'comment-policy' ) || is_page( 'sitemap' ) || is_404()  || is_search() ) {
      remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
      add_action( 'genesis_after_content', 'get_social_sidebar' );
  }
}
add_action( 'get_header', 'social_sidebar_logic' );

/**
 * Retrieve the social sidebar (i.e. sidebar-social.php).
 */
function get_social_sidebar() {
    get_sidebar( 'social' );
}
