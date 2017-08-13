jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	$(document).ready(function(){
		$('#btn-toggle').click(function(){
			$(this).toggleClass('open');
			$('body').toggleClass('open-menu');
		});
	});

	$(document).ready(function(){
	  	$('.principal-slider').slick({
	  		arrows: false,
	    	dots: false,
			infinite: true,
			speed: 500,
			fade: true,
			cssEase: 'linear'
	  	});
	});

});
