<?php
/**
@package my-recent-custom-posts

Plugin Name: My Recent Custom Posts
Description: Show the most recent custom posts in a widget
Version: 1.0
Author: Kyle Novak
Author URI: https://www.kylejnovak.com
*/

/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 */
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function prefix_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'my-recent-custom-posts-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'my-recent-custom-posts-style' );
}


class My_Recent_Custom_Posts extends WP_Widget {
	function __construct() {
		parent::__construct(
			'my_recent_custom_posts', // Base ID
			'My Recent Custom Posts', // Name
			array( 'description' => __( 'Displays custom posts. Outputs the post thumbnail, title and date' ) )
		);
	}
	// Override
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['postType'] = strip_tags( $new_instance['postType'] );
    $instance['taxonomy'] = strip_tags( $new_instance['taxonomy'] );
		$instance['numberOfPosts'] = strip_tags( $new_instance['numberOfPosts'] );
    $instance['width'] = strip_tags( $new_instance['width'] );
    $instance['height'] = strip_tags( $new_instance['height'] );
		return $instance;
	}
	// Override
	function form($instance) {
		if( $instance) {
			$title = esc_attr( $instance['title'] );
			$postType = esc_attr( $instance['postType'] );
      $taxonomy = esc_attr( $instance['taxonomy'] );
			$numberOfPosts = esc_attr( $instance['numberOfPosts'] );
      $width = esc_attr( $instance['width'] );
      $height = esc_attr( $instance['height'] );
		} else {
			$title = '';
			$postType = '';
      $taxonomy = '';
			$numberOfPosts = '';
      $width = '';
      $height = '';
		}
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />

				<label for="<?php echo $this->get_field_id('postType'); ?>">Custom Post Type (defaults to Post)</label>
				<input class="widefat" id="<?php echo $this->get_field_id('postType'); ?>" name="<?php echo $this->get_field_name('postType'); ?>" type="text" value="<?php echo $postType; ?>" />

        <label for="<?php echo $this->get_field_id('taxonomy'); ?>">Taxonomy</label>
				<input class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>" type="text" value="<?php echo $taxonomy; ?>" />
      </p>
			<p>
				<label for="<?php echo $this->get_field_id('numberOfPosts'); ?>">Number of Posts</label>
				<select id="<?php echo $this->get_field_id('numberOfPosts'); ?>"  name="<?php echo $this->get_field_name('numberOfPosts'); ?>">
					<?php for($x = 1; $x <= 10; $x++): ?>
						<option <?php echo $x == $numberOfPosts ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
					<?php endfor;?>
				</select>
			</p>
      <h3>Thumbnail Dimensions</h3>
      <p>
        <label for="<?php echo $this->get_field_id('width'); ?>">Width</label>
        <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />

        <label for="<?php echo $this->get_field_id('height'); ?>">Height</label>
        <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
      </p>
		<?php
	}
	// Override
	function widget($args, $instance) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);
		$postType = $instance['postType'];
    $taxonomy = $instance['taxonomy'];
		$numberOfPosts = $instance['numberOfPosts'];
    $width = $instance['width'];
    $height = $instance['height'];

    if ( ( is_home() || 'book_review' === get_post_type() && ( is_single() || is_tax( $taxonomy ) ) ) && !is_search() && !is_author() ) {
  		echo $before_widget;
  		if ( $title ) {
  			echo $before_title . $title . $after_title;
  		}
  		$this->getCustomPosts( $postType, $taxonomy, $numberOfPosts, $width, $height );
  		echo $after_widget;
    }
	}

	function getCustomPosts($postType, $taxonomy, $numberOfPosts, $width, $height) { //html
		global $post;

		$posts = new WP_Query();
		$posts->query('post_type=' . $postType . '&posts_per_page=' . $numberOfPosts );

		if ( $posts->found_posts > 0 ) {
			echo '<ul class="my_recent_custom_posts">';

			while ( $posts->have_posts() ) {
        $posts->the_post();

				$image = get_the_post_thumbnail( $post->ID, array( $width, $height ) );

        $postItem = '';
				$postItem .= '<li><a href="' . get_permalink() . '">' . $image . get_the_title() . '</a>';
        $postItem .= '<span class="terms">In ' . get_the_term_list( $post->ID, $taxonomy ) . '</span>';
				$postItem .= '<span>' . get_the_date() . '</span></li>';

				echo $postItem;
			}

			echo '</ul>';

			wp_reset_postdata();
		}
	}
} //end class My_Recent_Custom_Posts

add_action('widgets_init', 'register_my_recent_custom_posts');
function register_my_recent_custom_posts() {
    register_widget('My_Recent_Custom_Posts');
}
