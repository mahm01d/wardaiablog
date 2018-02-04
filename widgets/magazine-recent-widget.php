<?php 

class magazine_recent_widget extends WP_Widget {

	function magazine_recent_widget() {
		parent::WP_Widget(false, $name = 'Magazine Recent posts widget', array('description' => __('Displays recent posts.', 'baskerville') ));	
	}
	
	function widget($args, $instance) {
			// Outputs the content of the widget
		extract($args); // Make before_widget, etc available.
		
		$widget_title = apply_filters('widget_title', $instance['widget_title']);
		$fli_id = $instance['id'];
		$fli_number = $instance['number'];
		$unique_id = $args['widget_id'];
		$terms = get_the_terms($GLOBALS['post']->ID, 'post_series');
		#don't show this widget if it is part of a post series
		if (!(is_array($terms))){
		echo $before_widget;

		?>
			<h3 class="widget-title">Recent Posts</h3>
			<?php
			$args = array( 'numberposts' => '4',  'post_status' => 'publish');
			$recent_posts = wp_get_recent_posts( $args );
			$recentcount = 0;
			foreach( $recent_posts as $recent ){
				if ($GLOBALS['post']->ID != $recent["ID"]){
					if ($recentcount >= 3) {
						break;
					} else {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'single-post-thumbnail' );
						echo '<a href="' . get_permalink($recent["ID"]) . '"><div>
							<div class="related-thumb" style="background-image: url('.$image[0].')">
							</div><div class="related-title">'.$recent["post_title"].'</div></div></a>';
						$recentcount = $recentcount+1;
					}
				}
			}
			?>
	<?php echo $after_widget; 
		}
	}
	
	
	function update($new_instance, $old_instance) {
	
		//update and save the widget
		return $new_instance;
		
	}
	
	function form($instance) {
	
	}
}
register_widget('magazine_recent_widget'); ?>
