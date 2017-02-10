<?php

add_filter( 'genesis_comment_list_args', 'childtheme_comment_list_args' );
/**
 * Change size of comment avatars.
 *
 * Value is side length of square avatar, in pixels.
 *
 * @author ipstenu
 * @link   http://www.studiopress.com/forums/topic/change-gravatar-size/
 *
 * @param array $args Existing comment settings.
 *
 * @return array Amended comment settings.
 */
function childtheme_comment_list_args( $args ) {
    $args['avatar_size'] = 60;
	return $args;
}
