<?php

// Change the footer credits text.
function sp_footer_creds_filter( $creds ) {
  $home_link = '<a href="https://www.kylejnovak.com" target="_blank">Kyle J. Novak</a>';
  $wordpress_link = '<a href="https://www.wordpress.org" title="Wordpress" target="_blank">Wordpress</a>';
  $genesis_link = '<a href="https://www.studiopress.com/themes/genesis" title="Genesis Framework" target="_blank">Genesis Framework</a>';
	$creds = 'Copyright [footer_copyright] ' . $home_link . ' &middot; Powered by ' . $wordpress_link . ' &middot; Built on the ' . $genesis_link;
	return $creds;
}
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
