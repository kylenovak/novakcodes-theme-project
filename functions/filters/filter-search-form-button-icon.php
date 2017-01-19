<?php

// Customize search form input button text.
function my_search_button_text( $text ) {
	return esc_attr( '&#xf002;' );
}
add_filter( 'genesis_search_button_text', 'my_search_button_text' );
