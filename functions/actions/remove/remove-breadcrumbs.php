<?php

// Remove the breadcrumbs from their default location.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
