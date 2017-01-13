<?php

/**
 * Filter the except length to n words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function custom_excerpt_more( $more ) {
    return ' ... <a class="more-link" href="' . get_permalink() . '">[Read More]</a>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );
