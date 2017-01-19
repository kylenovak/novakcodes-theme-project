<?php

add_filter( 'genesis_show_comment_date', 'jmw_show_comment_date_with_link' );
/**
 * Show Comment Date with link but without the time
 *
 * Stop the output of the Genesis core comment dates and outputs comments with date and link only.
 * The genesis_show_comment_date filter was introduced in Genesis 2.2 (will not work with older versions)
 *
 * @author Jo Waltham
 * @link http://www.jowaltham.com/customising-comment-date-genesis/
 *
 * @param boolean $comment_date Whether to print the comment date or not
 * @return boolean Whether to print the comment date or not
 */
function jmw_show_comment_date_with_link( $comment_date ) {
  printf('<p %s><time %s>%s</time></p>',
    genesis_attr( 'comment-meta' ),
    genesis_attr( 'comment-time' ),
    esc_html( get_comment_date() )
  );
  // Return false so that the parent function doesn't output the comment date, time and link
  return false;
}
