<?php

// Define Actions Directory constants.
define( 'ADD_ACTIONS_DIR', 'add/' );
define( 'REMOVE_ACTIONS_DIR', 'remove/' );

// Include the Remove Actions files.
// NOTE: These have to stay before the Add Actions.
include( REMOVE_ACTIONS_DIR . 'remove-breadcrumbs.php' );
include( REMOVE_ACTIONS_DIR . 'remove-description.php' );
include( REMOVE_ACTIONS_DIR . 'remove-favicon.php' );
include( REMOVE_ACTIONS_DIR . 'remove-site-footer.php' );

// Include the Add Actions files.
include( ADD_ACTIONS_DIR . 'add-breadcrumbs.php' );
include( ADD_ACTIONS_DIR . 'add-current-nav-class.php' );
include( ADD_ACTIONS_DIR . 'add-custom-footer.php' );
include( ADD_ACTIONS_DIR . 'add-custom-post-taxonomies.php' );
include( ADD_ACTIONS_DIR . 'add-custom-post-types.php' );
include( ADD_ACTIONS_DIR . 'add-favicon.php' );
include( ADD_ACTIONS_DIR . 'add-post-featured-image.php' );
include( ADD_ACTIONS_DIR . 'add-post-navigation.php' );
