<?php

// Register a new custom post type.
function book_reviews_custom_post_type() {
  $args = array(
    'labels' => array(
      'name' => 'Book Reviews',
      'singular_name' => 'Book Review',
    ),
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'author',
      'genesis-seo', // Adds SEO Settings for Genesis Framework
      'genesis-layouts', // Adds Layout Settings for Genesis Framework
      'genesis-cpt-archives-settings', // Adds Taxonomies for Genesis Framework
    ),
    'public' => true,
    'has_archive' => true,
    'show_in_menu' => true,
    'exclude_from_search' => false,
    'rewrite' => array( 'slug' => 'book-reviews' ),
    'query_var' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-book',
  );

  register_post_type( 'book_review', $args );
}
add_action( 'init', 'book_reviews_custom_post_type' );
