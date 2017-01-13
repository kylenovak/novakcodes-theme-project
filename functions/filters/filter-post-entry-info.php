<?php

// Filter the post entry header info.
function sp_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link] [post_comments zero="Leave a Comment" one="1 Comment" more="% Comments"] [post_edit]';
	return $post_info;
}
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
