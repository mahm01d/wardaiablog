<?php
class magazine_postseries_widget extends WP_Widget {

        function magazine_postseries_widget() {
                parent::WP_Widget(false, $name = 'Magazine postseries widget', array('description' => __('Displays postseries.', 'baskerville') ));
        }

        function widget($args, $instance) {
                $terms = get_the_terms($GLOBALS['post']->ID, 'post_series');
                if (is_array($terms)){
                        extract($args);

                        $fli_id = $instance['id'];
                        $fli_number = $instance['number'];
                        $unique_id = $args['widget_id'];

                        echo $before_widget;
                        ?>
                        <h3 class="widget-title"><?php echo $terms[0]->name?></h3>
                        <?php

			$args = array( 'numberposts' => '50', 'order' => 'ASC', 'tax_query' => array(
                        	array(
                        	        'taxonomy' => 'post_series',
                        	        'terms' => $terms[0]->term_id,
                        	        'operator' => 'IN'
                        	)
        		) );
        		$tax_posts = wp_get_recent_posts( $args );
        		$series_count = 0;
        		$postoutput = "";
        		$currentpostnumber = 0;
        		foreach( $tax_posts as $tax_post ){
        		        $series_count++;
        		        if ($GLOBALS['post']->ID == $tax_post["ID"]){
        		        $currentpostnumber = $series_count;
        		        }
                        	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $tax_post["ID"] ), 'single-post-thumbnail' );
                                $postoutput .= '<a href="' . get_permalink($tax_post["ID"]) . '"><div>
                                      <div class="postseries-thumb" style="background-image: url('.$image[0].')"><span class="postseries-number">'.$series_count.'</span>
                                      </div><div class="related-title">'.$tax_post["post_title"].'</div></div></a>';
        		}
        		?>
        		<p>This is part <?php echo $currentpostnumber?> of a <?php echo $series_count?>-part series here on Fedora Magazine <?php echo $terms[0]->description?><br/><br/></p>
        		<?php
        		echo $postoutput;
                        echo $after_widget;
                }

        }


        function update($new_instance, $old_instance) {
                return $new_instance;
        }

        function form($instance) {

        }
}
register_widget('magazine_postseries_widget'); ?>
