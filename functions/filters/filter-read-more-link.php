<?php

// Modify the Genesis content limit read more link.
function sp_read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">[Continue Reading]</a>';
}
add_filter( 'get_the_content_more_link', 'sp_read_more_link' );
