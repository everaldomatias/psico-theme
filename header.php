<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a id="skippy" class="sr-only sr-only-focusable" href="#content">
		<div class="container">
			<span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span>
		</div>
	</a>

	<div class="top">
		<div class="container-fluid">
			<div id="btn-toggle" data-toggle="offcanvas" data-target="#menu-toggle" aria-expanded="false" aria-controls="collapseExample" data-canvas="">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div><!-- btn-toggle -->
		</div><!-- container-fluid -->
		<div class="navmenu-fixed-left offcanvas" id="menu-toggle">
			<?php
			  	if ( has_custom_logo() ) {
			  		odin_the_custom_logo();
			  	}
			?>
			<nav role="navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => '',
							'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Odin_Bootstrap_Nav_Walker()
						)
					);
				?>
			</nav>
		</div><!-- #menu-toggle -->
	</div><!-- top -->

	<header id="header" role="banner">
		<div class="container-fluid nopadding">
			<div class="page-header">

				<?php odin_the_custom_logo(); ?>

				<div class="clear"></div>

				<?php if ( is_home() ) : ?>
					<div class="col-sm-4 nopadding side hidden">
						<div class="col-sm-12 nopadding about">
							<div class="in">

								<?php
									$about = em_transient( 'about_transient', get_page_by_path( 'sobre', OBJECT ) );
									if ( ! empty( $about ) ) : ?>
									
									<h2><?php echo apply_filters( 'the_title', $about->post_title ); ?></h2>
									<?php echo apply_filters( 'the_content', em_get_excerpt( $about->post_content, '200' ) ); ?>
									<a href="<?php echo esc_url( get_permalink( $about->ID ) ); ?>" class="button"><?php _e( 'More', 'em' ); ?></a>

								<?php else: ?>

									<h2>Sobre</h2>
									<span>A página "Sobre" não existe ainda!</span>
										
								<?php
									// endif ( $about )
									endif; ?>

							</div><!-- in -->
						</div><!-- about -->
						<div class="col-sm-12 nopadding online-service">
							<div class="in">

								<?php
									$online_service = em_transient( 'online_service_transient', get_page_by_path( 'atendimento-online', OBJECT ) );
									if ( ! empty( $online_service ) ) : ?>
									
									<h2><?php echo apply_filters( 'the_title', $online_service->post_title ); ?></h2>
									<?php echo apply_filters( 'the_content', em_get_excerpt( $online_service->post_content, '200' ) ); ?>
									<a href="<?php echo esc_url( get_permalink( $online_service->ID ) ); ?>" class="button"><?php _e( 'More', 'em' ); ?></a>

								<?php else: ?>

									<h2>Atendimento Online</h2>
									<span>A página "Atendimento Online" não existe ainda!</span>
										
								<?php
									// endif ( $online_service )
									endif; ?>

							</div><!-- in -->
						</div><!-- online-service -->
					</div><!-- side -->
					<div class="col-sm-12 nopadding principal-slider">
						<?php
						$args = array(
							'post_type'			=> 'slider',
							'post_status'		=> 'publish',
							'posts_per_page'	=> 5,
							'orderby'			=> 'rand'
						);
						$slider = new WP_Query( $args );
						if ( $slider->have_posts() ) : ?>

							<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
								<div class="each" <?php em_thumbnail_background( 'full' ); ?>></div><!-- each -->
							<?php endwhile; ?>

						<?php else: ?>

							<div class="each" style="background-image: url( 'http://via.placeholder.com/760' )" ></div><!-- each -->

						<?php endif; ?>

					</div><!-- principal-slider -->
					<div class="clear"></div>
				<?php endif; ?>

			</div><!-- .page-header-->

		</div><!-- .container-->
	</header><!-- #header -->

	<div id="wrapper" class="container-fluid nopadding">
		<?php if ( ! is_home() && has_post_thumbnail() ) : ?>
			<?php if ( is_single() || is_page() ) : ?>		
				<div class="the-post-thumbnail" <?php em_thumbnail_background( 'full' ); ?>></div><!-- the-post-thumbnail -->
			<?php endif; ?>
		<?php endif; ?>
		<div class="inner">
