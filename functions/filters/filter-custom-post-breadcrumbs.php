<?php

// Add custom breadcrumbs for a custom post type.
function book_review_breadcrumbs( $crumb, $args ) {
	// Only modify the breadcrumb if in the 'book_review' post type
	if( 'book_review' !== get_post_type() )
		return $crumb;

	// Grab terms
	$terms = get_the_terms( get_the_ID(), 'genre' );
	if( empty( $terms ) || is_wp_error( $terms ) )
		return $crumb;

	// Only use one term
	$term = array_shift( $terms );

  $crumb_wrap_open = '<span class="breadcrumb-link-wrap" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
  $crumb_wrap_close = '</span>';

	// Build the breadcrumb
	$crumb = $crumb_wrap_open . '<a href="' . get_post_type_archive_link( 'book_review' ) . '">Book Reviews</a>' . $crumb_wrap_close . $args['sep'];
  $crumb .= $crumb_wrap_open . '<a href="' . get_term_link( $term, 'genre' ) . '">' . $term->name . '</a>' . $crumb_wrap_close . $args['sep'];
  $crumb .= get_the_title();

	return $crumb;
}
add_filter( 'genesis_single_crumb', 'book_review_breadcrumbs', 10, 2 );
