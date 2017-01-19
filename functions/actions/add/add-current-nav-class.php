<?php

// Add the 'current-menu-item' class to the current nav item.
function custom_active_item_classes( $classes, $item, $args ) {
	if( ( is_singular( 'post' ) || is_category() || is_tag() || is_author() ) && 'Blog' == $item->title )
		$classes[] = 'current-menu-item';

	if( ( is_singular( 'book_review' ) || is_post_type_archive( 'book_review' ) || is_tax( 'genre' ) ) && 'Book Reviews' == $item->title )
		$classes[] = 'current-menu-item';

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 3 );
