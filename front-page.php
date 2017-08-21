<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

		<?php
		$args = array(
			'post_type' => 'servicos',
			'post_status' => 'publish',
			'posts_per_page' => 3
		);
		$services = new WP_Query( $args );
		if ( $services->have_posts() ) : ?>

			<section class="services">

				<h2 class="entry-title">Praesent consequat at nunc non vehicul</h2>
				<h4 class="entry-title">Lipsum consequat at nunc</h4>

				<?php while ( $services->have_posts() ) : $services->the_post(); ?>

					<div class="each col-sm-4">
						<a href="<?php the_permalink(); ?>">
							<div class="thumb">
								<?php if ( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail( 'thumbnail' ); ?>
								<?php else: ?>
									<img src="<?php echo esc_url( 'http://via.placeholder.com/200' ); ?>" alt="<?php the_title(); ?>">
								<?php endif ?>
							</div><!-- thumb -->
							<div class="desc">
								<h3><?php the_title(); ?></h3>
								<span><?php echo em_get_excerpt( get_the_content(), '100' ); ?></span>
							</div><!-- desc -->
						</a>
					</div><!-- each -->
			
				<?php endwhile; ?>

			</section><!-- services -->

		<?php endif; ?>

		<?php
	  	$transient_sticky_posts = get_transient( 'transient_sticky_posts' );
	  	if ( $transient_sticky_posts === false ) {
	  		$sticky = get_option( 'sticky_posts' );
	  		if ( $sticky ) :
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => 5,
					'post__in'  => $sticky
				);
				$sticky_posts = new WP_Query( $args );
			endif;
			$transient_sticky_posts = set_transient( 'transient_sticky_posts', $sticky_posts, 7 * DAY_IN_SECONDS );
		}

		if ( $transient_sticky_posts->have_posts() ) : ?>

			<section class="sticky-posts row">

				<div class="loop">
					<?php while ( $transient_sticky_posts->have_posts() ) : $transient_sticky_posts->the_post(); ?>

						<div class="each col-sm-12 nopadding">

							<?php if ( has_post_thumbnail() ): ?>
								<div class="thumb col-sm-12 nopadding" <?php em_thumbnail_background( 'full' ); ?>>
									<a href="<?php the_permalink(); ?>"></a>
								</div><!-- thumb -->
							<?php else: ?>
								<div class="thumb col-sm-12 nopadding" style="background-image: url( 'http://via.placeholder.com/720x320' )" >
									<a href="<?php the_permalink(); ?>"></a>
								</div><!-- thumb -->
							<?php endif ?>

							<div class="desc col-sm-12 nopadding">
								<h3><?php the_title(); ?></h3>
								<span><?php echo em_get_excerpt( get_the_content(), '300' ); ?></span>
								<div class="clear"></div>
								<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="button"><?php _e( 'More', 'em' ); ?></a>
							</div><!-- desc -->

						</div><!-- each -->

					<?php endwhile; ?>
				</div><!-- loop -->

			</section><!-- sticky-posts -->

		<?php endif; ?>

		<?php
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 2,
			'post__not_in' => get_option( 'sticky_posts' )
		);
		$tips_articles = new WP_Query( $args );
		if ( $tips_articles->have_posts() ) : ?>

			<section class="tips-articles">

				<h2 class="entry-title"><?php _e( 'Tips and Articles', 'em' ); ?></h2>
				<h4 class="entry-title">Lipsum consequat at nunc</h4>

				<div class="loop">

					<?php $count = 0; ?>

					<?php while ( $tips_articles->have_posts() ) : $tips_articles->the_post(); ?>

						<?php $count++; ?>

						<div class="each col-sm-12 nopadding">
							<a href="<?php the_permalink(); ?>">

								<?php if ( $count == 1 ): ?>

									<div class="desc col-sm-4">
										<h3><?php the_title(); ?></h3>
										<span><?php echo em_get_excerpt( get_the_content(), '180' ); ?></span>
										<div class="clear"></div>
										<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="button"><?php _e( 'More', 'em' ); ?></a>
									</div><!-- desc -->

									<?php if ( has_post_thumbnail() ): ?>
										<div class="thumb col-sm-8" <?php em_thumbnail_background( 'full' ); ?>>
											<a href="<?php the_permalink(); ?>"></a>
										</div><!-- thumb -->
									<?php else: ?>
										<div class="thumb col-sm-8" style="background-image: url( 'http://via.placeholder.com/720x320' )" >
											<a href="<?php the_permalink(); ?>"></a>
										</div><!-- thumb -->
									<?php endif ?>

								<?php else: ?>

									<?php if ( has_post_thumbnail() ): ?>
										<div class="thumb col-sm-4" <?php em_thumbnail_background( 'full' ); ?>>
											<a href="<?php the_permalink(); ?>"></a>
										</div><!-- thumb -->
									<?php else: ?>
										<div class="thumb col-sm-4" style="background-image: url( 'http://via.placeholder.com/320' )" >
											<a href="<?php the_permalink(); ?>"></a>
										</div><!-- thumb -->
									<?php endif ?>

									<div class="desc col-sm-8">
										<h3><?php the_title(); ?></h3>
										<span><?php echo em_get_excerpt( get_the_content(), '420' ); ?></span>
										<div class="clear"></div>
										<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="button"><?php _e( 'More', 'em' ); ?></a>
									</div><!-- desc -->

								<?php endif ?>

							</a>
						</div><!-- each -->

					<?php endwhile; ?>

				</div><!-- loop -->

			</section><!-- tips-articles -->

		<?php endif; ?>

	</main><!-- #content -->

<?php
get_footer();
