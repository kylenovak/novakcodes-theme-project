<?php

// Modify title text for comments area.
function sp_genesis_title_comments() {
	$title = '<h3>Comments</h3>';
	return $title;
}
add_filter( 'genesis_title_comments', 'sp_genesis_title_comments' );
