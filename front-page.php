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

	</main><!-- #content -->

<?php
get_footer();
