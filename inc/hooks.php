<?php
	add_action( 'save_post', 'em_save_sticky_posts_transient', 14000 );
	function em_save_sticky_posts_transient( $post_id ) {
		if ( is_stick( $post_id ) ) {
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
			$transient_sticky_posts = set_transient( 'transient-sticky-posts', $sticky_posts, 7 * DAY_IN_SECONDS );
		}
	}