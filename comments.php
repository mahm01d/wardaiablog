<?php if ( post_password_required() )
	return;
?>

	<?php if ( have_comments() ) : ?>

		<div class="comments">

			<a name="comments"></a>

			<div class="comments-title-container">

				<h2 class="comments-title fleft">

					<?php echo count($wp_query->comments_by_type['comment']) . ' ';
					echo _n( 'Comment' , 'Comments' , count($wp_query->comments_by_type['comment']), 'baskerville' ); ?>

				</h2>

				<?php if ( comments_open() ) : ?>

					<h2 class="add-comment-title fright"><a href="#respond"><?php _e('Add yours', 'baskerville') . ' &rarr;'; ?></a></h2>

				<?php endif; ?>

				<div class="clear"></div>

			</div> <!-- /comments-title-container -->

			<ol class="commentlist">
			    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'baskerville_comment' ) ); ?>
			</ol>

			<?php if (!empty($comments_by_type['pings'])) : ?>

				<div class="pingbacks">

					<div class="pingbacks-inner">

						<h3 class="pingbacks-title">

							<?php echo count($wp_query->comments_by_type['pings']) . ' ';
							echo _n( 'Pingback', 'Pingbacks', count($wp_query->comments_by_type['pings']), 'baskerville' ); ?>

						</h3>

						<ol class="pingbacklist">
						    <?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'baskerville_comment' ) ); ?>
						</ol>

					</div>

				</div>

			<?php endif; ?>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

				<div class="comment-nav-below" role="navigation">

					<div class="post-nav-older fleft"><?php previous_comments_link( '&laquo; ' . __( 'Older Comments', 'baskerville' ) ); ?></div>

					<div class="post-nav-newer fright"><?php next_comments_link( __( 'Newer Comments', 'baskerville' ) . ' &raquo;' ); ?></div>

					<div class="clear"></div>

				</div> <!-- /comment-nav-below -->

			<?php endif; ?>

		</div><!-- /comments -->

	<?php endif; ?>

	<?php if ( ! comments_open() && !is_page() ) : ?>

		<p class="nocomments"><?php _e( 'Comments are closed.', 'baskerville' ); ?></p>

	<?php endif; ?>

	<?php $comments_args = array(

		'comment_notes_before' =>
			'<p class="comment-notes">' . __( 'Your email address will not be published.', 'baskerville' ) . '</p>',

		'comment_notes_after' =>
			'<p class="comment-notes-after">All Comments are moderated. It may take some time for your first post to get through the queue. If your posts seem to never show up, please <a href="https://admin.fedoraproject.org/mailman/listinfo/marketing">contact us directly</a>. Please follow the <a href="https://getfedora.org/code-of-conduct">Fedora Code of Conduct</a> when commenting. Also note that Fedora Magazine is <strong>not a help forum</strong>. If you need help with an issue or want to discuss it, consult <a href="https://fedoraproject.org/wiki/Communicating_and_getting_help">this wiki page</a> for help on where to do that.</p>',

		'comment_field' =>
			'<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="6" required>' . '</textarea></p>',

		'fields' => apply_filters( 'comment_form_default_fields', array(

			'author' =>
				'<p class="comment-form-author">' .
				'<input id="author" name="author" type="text" placeholder="' . __('Name','baskerville') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />' . '<label for="author">Author</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',

			'email' =>
				'<p class="comment-form-email">' . '<input id="email" name="email" type="text" placeholder="' . __('Email','baskerville') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /><label for="email">Email</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',

			'url' =>
			'<p class="comment-form-url">' . '<input id="url" name="url" type="text" placeholder="' . __('Website','baskerville') . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">Website</label></p>')
		),
	);

	comment_form($comments_args);
	?>
