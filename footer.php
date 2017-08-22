<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div><!-- .inner -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<div class="container-fluid nopadding">
			<div class="infos col-sm-12">
				<h2 class="entry-title"><?php _e( 'Contact Us', 'em' );	?></h2>
				<h4 class="entry-title"><?php _e( 'We are here to hear you', 'em' );	?></h4>
				<?php
				  	// Verifica se o plugin Contact Form 7 está ativo
					if( defined( 'WPCF7_PLUGIN' ) ){
				  		echo do_shortcode( '[contact-form-7 title="Rodapé Contato"]' );
				  	}
				?>
			</div><!-- infos -->
			<div class="col-sm-12">
				<div class="col-sm-8 menus">
					<?php
						$nav_menu = wp_get_nav_menu_object( 'Navegação' );
						wp_nav_menu(
							array(
								'theme_location' => 'first-footer-menu',
								'depth'          => 1,
								'container'      => false,
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker(),
								'items_wrap'      => '<ul class="col-sm-6"><li class="title"><h4>' . $nav_menu->name . '</h4></li>%3$s</ul>'
							)
						);
					?>
					<?php
						$nav_menu = wp_get_nav_menu_object( 'Institucional' );
						wp_nav_menu(
							array(
								'theme_location' => 'second-footer-menu',
								'depth'          => 1,
								'container'      => 'false',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker(),
								'items_wrap'      => '<ul class="col-sm-6"><li class="title"><h4>' . $nav_menu->name . '</h4></li>%3$s</ul>'
							)
						);
					?>
				</div><!-- menus -->
				<div class="col-sm-4 contacts">
					
					<h4 class="title"><?php echo esc_html( bloginfo( 'name' ) ); ?></h4>
					<span class="name">Ruth Salgado</span>
					<span class="cfp">CFP 112.251.251-11</span>
					<span class="phone">11 94791 0000</span>
					<span class="email">contato@clickpsi.com</span>

				</div><!-- contacts -->
			</div><!-- col-sm-12 -->
			<p class="credits">&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'em' ); ?> | <?php echo sprintf( __( 'Development by <a href="%s" rel="nofollow" target="_blank">Everaldo Matias</a>.', 'em' ), 'http://everaldomatias.github.io/' ); ?></p><!-- credits -->
		</div><!-- .container-fluid -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
