<?php

// Remove the genesis favicon from getting added to the Head tag.
remove_action( 'wp_head', 'genesis_load_favicon' );
