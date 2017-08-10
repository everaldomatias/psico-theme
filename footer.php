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
				<h2 class="entry-title">Contact Us</h2>
				<h4 class="entry-title">Lipsum consequat at nunc</h4>
				<?php
				  	// Verifica se o plugin Contact Form 7 está ativo
					if( defined( 'WPCF7_PLUGIN' ) ){
				  		echo do_shortcode( '[contact-form-7 title="Rodapé Contato"]' );
				  	}
				?>
			</div><!-- infos -->
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Powered by the <a href="%s" rel="nofollow" target="_blank">Odin</a> forces and <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'odin' ), 'http://wpod.in/', 'http://wordpress.org/' ); ?></p>
		</div><!-- .container-fluid -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>
