<?php

// Import Genesis framework functions so we can use them right away.
require_once( TEMPLATEPATH . '/lib/init.php' );

// Remove the genesis favicon from getting added to the header.
remove_action( 'wp_head', 'genesis_load_favicon' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

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
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );

// Add a favicon to the header section.
function my_favicon() {
  $favicon_location = get_stylesheet_directory_uri() . '/images/favicon.ico';
  echo '<link rel="shortcut icon" type="image/x-icon" href="' . $favicon_location . '" />';
}
add_action( 'wp_head', 'my_favicon') ;

// Filter the post entry header info.
function sp_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	return $post_info;
}
add_filter( 'genesis_post_info', 'sp_post_info_filter' );

// Filter the post entry default before text.
function post_meta_filter($post_meta) {
  if ( !is_page() ) {
      $post_meta = '[post_categories before=""] [post_tags before="Keywords: "]';
      return $post_meta;
  }
}
add_filter( 'genesis_post_meta', 'post_meta_filter' );

//* Modify the Genesis content limit read more link
function sp_read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">[Continue Reading]</a>';
}
add_filter( 'get_the_content_more_link', 'sp_read_more_link' );


add_theme_support( 'genesis-responsive-viewport' );
//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );


//* Change the footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
  $home_link = '<a href="https://www.kylejnovak.com" target="_blank">Kyle J. Novak</a>';
  $wordpress_link = '<a href="https://www.wordpress.org" title="Wordpress" target="_blank">Wordpress</a>';
  $genesis_link = '<a href="https://www.studiopress.com/themes/genesis" title="Genesis Framework" target="_blank">Genesis Framework</a>';
	$creds = 'Copyright [footer_copyright] ' . $home_link . ' &middot; Powered by ' . $wordpress_link . ' &middot; Built on the ' . $genesis_link;
	return $creds;
}
