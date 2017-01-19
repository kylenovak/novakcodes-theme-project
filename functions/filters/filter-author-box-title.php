<?php

add_filter( 'genesis_author_box_title', 'custom_author_box_title' );
function custom_author_box_title() {
	return '<strong>About the Author</strong>';
}
