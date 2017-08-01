<?php
// Functions da Galáxia
// Funções que uso em todos os meus projetos

/**
 * Function em_get_excerpt
 *
 * @since  0.0.1
 *
 * @param  string $content with text to excerpt.
 * @param  string $limit number of the limit.
 * @param  string $after with element to print in end excerpt.
 *
 * @return string
 */
 
function em_get_excerpt( $content = '', $limit = '', $after = '' ){
	
	if ( $limit ) {
		$l = $limit;
	} else {
		$l = '140';
	}
 
	if ( $content ) {
		$excerpt = $content;
	} else {
		$excerpt = get_the_content();
	}
 
	$excerpt = preg_replace( " (\[.*?\])",'', $excerpt );
	$excerpt = strip_shortcodes( $excerpt );
	$excerpt = strip_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, $l );
	$excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
	$excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );
	
	if ( $after ) {
		$a = $after;
	} else {
		$a = '...';
	}
 
	$excerpt = $excerpt . $a;
	return $excerpt;

}

/**
 * Function em_transient
 *
 * @since  0.0.1
 *
 * @param  string $transient with name to transient.
 * @param  string $default value to use if transient not exist.
  *
 * @return string
 */
function em_transient( $transient, $default = "" ) {
	$get_transient = get_transient( 'em_' . $transient );
	if ( ! empty( $get_transient ) ) {
		return $get_transient;
	} else {
		return $default;
		set_transient( 'em_' . $transient, $default, WEEK_IN_SECONDS );
	}
}