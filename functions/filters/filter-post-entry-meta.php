<?php

// Filter the post entry default before text.
function post_meta_filter($post_meta) {
  if ( !is_page() ) {
      $post_meta = '[post_categories before="Posted Under: "] [post_tags before="Tagged With: "]';
      return $post_meta;
  }
}
add_filter( 'genesis_post_meta', 'post_meta_filter' );
