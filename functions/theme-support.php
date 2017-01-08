<?php

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

// Add a meta viewport tag to the Head tag.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

add_theme_support( 'genesis-structural-wraps', array( 'header', 'subnav', 'inner', 'footer-widgets', 'footer', 'sidebar' ) );
