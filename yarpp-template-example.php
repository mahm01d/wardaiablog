<?php 
/*
YARPP Template: Simple
Author: mitcho (Michael Yoshitaka Erlewine)
Description: A simple example YARPP template.
*/

$terms = get_the_terms($GLOBALS['post']->ID, 'post_series');
# don't show this widget if it is part of a post series
if (!(is_array($terms))){
?><h3 class="widget-title">Related Posts</h3>
	<?php if (have_posts()):?>
	<ol>
		<?php while (have_posts()) : the_post(); ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<a href="<?php the_permalink() ?>" rel="bookmark"><div>
			<div class="related-thumb" style="background-image: url('<?php echo $image[0]; ?>')">
			</div>
			<div class="related-title">
				<?php the_title(); ?>
			</div>
		</div></a>
		<?php endwhile; ?>
	</ol>
	<?php else: ?>
	<p>No related posts.</p>
	<?php endif; ?>
<?php } ?>
