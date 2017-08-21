<?php
	add_action( 'save_post', 'em_save_sticky_posts_transient', 14000 );
	function em_save_sticky_posts_transient( $post_id ) {
		if ( is_sticky( $post_id ) ) {
			delete_transient( 'transient_sticky_posts' );
		}
	}