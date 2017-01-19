<?php

// Customize the submit button text in comments.
function sp_comment_submit_button( $defaults ) {
  $defaults['title_reply'] = __( 'Post Comment' );
  $defaults['label_submit'] = 'Post Comment';
  $defaults['cancel_reply_link'] = '<i class="fa fa-times" aria-hidden="true"></i>';
  return $defaults;
}
add_filter( 'comment_form_defaults', 'sp_comment_submit_button' );
