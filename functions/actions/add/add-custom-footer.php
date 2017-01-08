<?php

function get_copyright_year_text() {
  $start_year = 2017; // Year site was launched.
  $current_year = date('Y');

  $year_text = $current_year;
  if ($current_year > $start_year) {
    $year_text = $start_year . ' - ' . $current_year;
  }

  return $year_text;
}

function get_footer_text() {
  $home_link = '<a href="https://www.kylejnovak.com" target="_blank">Kyle J. Novak</a>';
  $wordpress_link = '<a href="https://www.wordpress.org" title="Wordpress" target="_blank">Wordpress</a>';
  $genesis_link = '<a href="https://www.studiopress.com/themes/genesis" title="Genesis Framework" target="_blank">Genesis Framework</a>';

  $footer_text = 'Copyright &#x000A9; ' . get_copyright_year_text();
  $footer_text .= ' ' . $home_link;
  $footer_text .= ' &middot; Powered by ' . $wordpress_link ;
  $footer_text .=  ' &middot; Built on the ' . $genesis_link;

  return $footer_text;
}

// Customize the site footer.
function my_custom_footer() { ?>
  <footer class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <div class="wrap">
      <p>
        <?= get_footer_text(); ?>
      </p>
    </div>
  </footer>
<?php }
add_action( 'genesis_footer', 'my_custom_footer' );
