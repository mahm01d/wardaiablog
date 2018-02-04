<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<meta name="theme-color" content="#294172">

		<title><?php wp_title('|', true, 'right'); ?></title>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/wardaialogo.png" />
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<div class="header-overlay section-inner">
			<a href="/"><div class="header-overlay-inner">

			</div></a>
		</div>
		<div class="header section small-padding bg-dark bg-image">
			<div class="cover"></div>

			<div class="header-search-block bg-graphite hidden">

				<?php get_search_form(); ?>

			</div> <!-- /header-search-block -->

			<div class="header-inner section-inner">
				<a class="socialbuttons facebook" href="https://www.facebook.com/wardaiacom">
					<i class="fa fa-fw fa-facebook" aria-hidden="true"></i>
				</a>
				<a class="socialbuttons instagram" href="https://www.instagram.com/wardaiacom">
					<i class="fa fa-fw fa-instagram" aria-hidden="true"></i>
				</a>
				<a class="socialbuttons twitter" href="https://twitter.com/fedora">
					<i class="fa fa-fw fa-twitter" aria-hidden="true"></i>
				</a>
				<a class="socialbuttons google" href="https://plus.google.com/+fedora/">
					<i class="fa fa-fw fa-google-plus" aria-hidden="true"></i>
				</a>
				<a class="socialbuttons rss" href="feed/">
						<i class="fa fa-fw fa-rss" aria-hidden="true"></i>
				</a>

				<!--<?php if ( get_theme_mod( 'baskerville_logo' ) ) : ?>

					<div class="blog-logo">

				        <a class="logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>' rel='home'>
				        	<img src='<?php echo esc_url( get_theme_mod( 'baskerville_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
				        </a>

					</div>

				<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>

						<h1 class="blog-title">
							<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
						</h1>

						<?php if ( get_bloginfo( 'description' ) ) { ?>

							<h3 class="blog-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h3>

						<?php } ?>

				<?php endif; ?> -->

			</div> <!-- /header-inner -->

		</div> <!-- /header -->

		<!--<div class="navigation section no-padding">

			<div class="navigation-inner section-inner">

				<div class="nav-toggle fleft hidden">

					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>

					<div class="clear"></div>

				</div>

				<ul class="main-menu">

					<?php if ( has_nav_menu( 'primary' ) ) {

						wp_nav_menu( array(

							'container' => '',
							'items_wrap' => '%3$s',
							'theme_location' => 'primary',
							'walker' => new baskerville_nav_walker

						) ); } else {

						wp_list_pages( array(

							'container' => '',
							'title_li' => ''

						));

					} ?>

				 </ul> <!-- /main-menu -->

				 <!--<a class="search-toggle fright" href="#"></a>-->

				 <!--<div class="clear"></div>-->

			<!-- </div> /navigation-inner -->

		<!-- </div>  /navigation -->

		<div class="mobile-navigation section bg-graphite no-padding hidden">

			<ul class="mobile-menu">

				<?php if ( has_nav_menu( 'primary' ) ) {

					wp_nav_menu( array(

						'container' => '',
						'items_wrap' => '%3$s',
						'theme_location' => 'primary',
						'walker' => new baskerville_nav_walker

					) ); } else {

					wp_list_pages( array(

						'container' => '',
						'title_li' => ''

					));

				} ?>

			 </ul> <!-- /main-menu -->

		</div> <!-- /mobile-navigation -->
