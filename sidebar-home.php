<div id="home-sidebar" class="sidebar widget-area alt-sidebar">
<?php
    genesis_structural_wrap( 'sidebar' );
    do_action( 'genesis_before_sidebar_widget_area' );
    dynamic_sidebar('home-sidebar');
    do_action( 'genesis_after_sidebar_widget_area' );
    genesis_structural_wrap( 'sidebar', 'close' );
?>
</div>
