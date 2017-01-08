<?php

// Import Genesis framework functions so we can use them right away.
require_once( TEMPLATEPATH . '/lib/init.php' );

// Include the Actions files.
require_once( 'functions/actions/init.php' );

// Include the Filters files.
require_once( 'functions/filters/init.php' );

// Include miscellaneous files.
require_once( 'functions/theme-support.php' );
require_once( 'functions/sidebar-home.php' );
require_once( 'functions/sidebar-home-subscribe.php' );
require_once( 'functions/scripts-styles.php' );
//* Add class to .sidebar-wrap
add_filter( 'genesis_attr_content-sidebar-wrap', 'jive_attributes_st_content' );
function jive_attributes_st_content( $attributes ) {
	$attributes['class'] = $attributes['class']. ' wrap';
	return $attributes;
}
