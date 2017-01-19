<?php

// Customize search form input box text.
function my_search_text( $text ) {
	return esc_attr( 'Search Novak Codes' );
}
add_filter( 'genesis_search_text', 'my_search_text' );
