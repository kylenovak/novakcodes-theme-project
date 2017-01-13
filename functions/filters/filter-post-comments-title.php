<?php

// Modify the speak your mind title in comments.
function sp_comment_form_defaults( $defaults ) {
	$defaults['title_reply'] = __( 'Post Comment' );
	return $defaults;
}
add_filter( 'comment_form_defaults', 'sp_comment_form_defaults' );
