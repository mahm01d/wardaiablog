<?php get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

?>

<div class="wrapper section medium-padding">

	<div class="page-title section-inner">

<?php
	echo "<h3>";
	echo $term->name; // will show the name
	echo "</h3>";
	echo 'This is series here on Fedora Magazine ';
	echo $term->description; // will show the slug
?>
	</div> <!-- /page-title -->

	<div class="content section-inner">

		<?php if ( have_posts() ) : ?>

			<div class="posts">

				<?php rewind_posts(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="post-container">

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php get_template_part( 'content', get_post_format() ); ?>

							<div class="clear"></div>

						</div> <!-- /post -->

					</div>

				<?php endwhile; ?>

			</div> <!-- /posts -->

			<?php if ( $wp_query->max_num_pages > 1 ) : ?>

				<div class="archive-nav">

					<?php echo get_next_posts_link( '&laquo; ' . __('Older posts', 'baskerville')); ?>

					<?php echo get_previous_posts_link( __('Newer posts', 'baskerville') . ' &raquo;'); ?>

					<div class="clear"></div>

				</div> <!-- /post-nav archive-nav -->

				<div class="clear"></div>

			<?php endif; ?>

		<?php endif; ?>

	</div> <!-- /content -->

</div> <!-- /wrapper -->

<?php get_footer(); ?>
