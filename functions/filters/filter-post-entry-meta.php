<?php

// Filter the post entry default before text.
function post_meta_filter($post_meta) {
  if ( !is_page() ) {
      $post_meta = '[post_categories before=""] [post_tags before="Keywords: "]';
      return $post_meta;
  }
}
add_filter( 'genesis_post_meta', 'post_meta_filter' );
