<?php

// Modify the author says text in the comments.
function sp_comment_author_says_text() {
	return '';
}
add_filter( 'comment_author_says_text', 'sp_comment_author_says_text' );
