<?php

// Modify breadcrumb arguments.
function sp_breadcrumb_args( $args ) {
	$args['home'] = '<i class="fa fa-home" aria-hidden="true"></i> Home';
	$args['sep'] = ' <i class="fa fa-chevron-right" aria-hidden="true"></i> ';
	$args['list_sep'] = ', '; // Genesis 1.5 and later
	$args['prefix'] = '<div class="breadcrumb-container"><div class="breadcrumb wrap">';
	$args['suffix'] = '</div></div>';
	$args['heirarchial_attachments'] = true; // Genesis 1.5 and later
	$args['heirarchial_categories'] = true; // Genesis 1.5 and later
	$args['display'] = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = '';
	$args['labels']['category'] = ''; // Genesis 1.6 and later
	$args['labels']['tag'] = '';
	$args['labels']['date'] = '';
	$args['labels']['search'] = 'Search for ';
	$args['labels']['tax'] = '';
	$args['labels']['post_type'] = '';
	$args['labels']['404'] = ''; // Genesis 1.5 and later
return $args;
}
add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
