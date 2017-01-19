<?php

// Filter the post entry default before text.
function post_meta_filter($post_meta) {
  if ( 'book_review' == get_post_type() ) {//swap in CPT name
		$post_meta='[post_terms taxonomy="genre" before="Posted Under: "]';//swap in taxonomy and label name
	} elseif ( 'post' == get_post_type() ) {
    $post_meta = '[post_categories before="Posted Under: "] [post_tags before="Tagged With: "]';
  }
  return $post_meta;
}
add_filter( 'genesis_post_meta', 'post_meta_filter' );
