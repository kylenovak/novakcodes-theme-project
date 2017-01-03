<?php

// Import Genesis framework functions so we can use them right away.
require_once(TEMPLATEPATH . '/lib/init.php');

// Remove the genesis favicon from getting added to the header.
remove_action('wp_head', 'genesis_load_favicon');

// Put style sheets and scripts in the correct order and place.
function my_enqueue_styles() {
  $parent_style = 'parent-style';
  // Add the Genesis parent style sheet.
  wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
  // Add the child style sheet.
  wp_enqueue_style('child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array($parent_style),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

// Add a favicon to the header section.
function my_favicon() {
  $favicon_location = get_stylesheet_directory_uri() . '/images/favicon.ico';
  echo '<link rel="shortcut icon" type="image/x-icon" href="' . $favicon_location . '" />';
}
add_action('wp_head', 'my_favicon');
