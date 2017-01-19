<?php

// Register a new sidebar.
genesis_register_sidebar( array(
  'id' => 'custom-posts-sidebar',
  'name' => 'Custom Posts Sidebar',
  'description' => 'This is the custom posts sidebar widget area.' )
);

/**
 * Remove the default sidebar, and add the custom posts sidebar.
 */
function custom_posts_sidebar_logic() {
  // Only show this sidebar on book review pages.
  if ( 'book_review' === get_post_type() && !is_search() && !is_author() ) {
      remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
      add_action( 'genesis_after_content', 'get_custom_posts_sidebar' );
  }
}
add_action( 'get_header', 'custom_posts_sidebar_logic' );

/**
 * Retrieve the custom posts sidebar (i.e. sidebar-custom-posts.php).
 */
function get_custom_posts_sidebar() {
    get_sidebar( 'custom-posts' );
}
