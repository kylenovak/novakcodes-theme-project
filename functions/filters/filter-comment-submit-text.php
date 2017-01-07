<?php

// Customize the submit button text in comments.
function sp_comment_submit_button( $defaults ) {
  $defaults['label_submit'] = __( 'Post Comment' );
  return $defaults;
}
add_filter( 'comment_form_defaults', 'sp_comment_submit_button' );
