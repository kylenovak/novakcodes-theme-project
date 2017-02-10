<?php

// Filter the post entry default before text.
function post_meta_filter($post_meta) {
  if ( 'book_review' == get_post_type() ) {//swap in CPT name
		$post_meta='[post_terms taxonomy="genre" before="Posted under: "]';//swap in taxonomy and label name
	} elseif ( 'post' == get_post_type() ) {
    $post_meta = '[post_categories before="Posted under: "] [post_tags before="Tagged with: "]';
  }
  return $post_meta;
}
add_filter( 'genesis_post_meta', 'post_meta_filter' );
