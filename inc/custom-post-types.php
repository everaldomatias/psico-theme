<?php
if ( ! function_exists( 'em_add_cpt' ) ) {
	add_action( 'init', 'em_add_cpt' );
	/**
	 * Register a book post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	function em_add_cpt() {
		$labels = array(
			'name'               => _x( 'Services', 'post type general name', 'em' ),
			'singular_name'      => _x( 'Service', 'post type singular name', 'em' ),
			'menu_name'          => _x( 'Services', 'admin menu', 'em' ),
			'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'em' ),
			'add_new'            => _x( 'Add New', 'book', 'em' ),
			'add_new_item'       => __( 'Add New Service', 'em' ),
			'new_item'           => __( 'New Service', 'em' ),
			'edit_item'          => __( 'Edit Service', 'em' ),
			'view_item'          => __( 'View Service', 'em' ),
			'all_items'          => __( 'All Services', 'em' ),
			'search_items'       => __( 'Search Services', 'em' ),
			'parent_item_colon'  => __( 'Parent Services:', 'em' ),
			'not_found'          => __( 'No books found.', 'em' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'em' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'em' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'servico' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'			 => 'dashicons-portfolio',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		// Registra o CPT Serviços
		register_post_type( 'servicos', $args );

		$labels = '';
		$args = '';

		$labels = array(
			'name'               => _x( 'Sliders', 'post type general name', 'em' ),
			'singular_name'      => _x( 'Slider', 'post type singular name', 'em' ),
			'menu_name'          => _x( 'Sliders', 'admin menu', 'em' ),
			'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'em' ),
			'add_new'            => _x( 'Add New', 'book', 'em' ),
			'add_new_item'       => __( 'Add New Slider', 'em' ),
			'new_item'           => __( 'New Slider', 'em' ),
			'edit_item'          => __( 'Edit Slider', 'em' ),
			'view_item'          => __( 'View Slider', 'em' ),
			'all_items'          => __( 'All Sliders', 'em' ),
			'search_items'       => __( 'Search Sliders', 'em' ),
			'parent_item_colon'  => __( 'Parent Sliders:', 'em' ),
			'not_found'          => __( 'No books found.', 'em' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'em' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'em' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'slider' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'			 => 'dashicons-slides',
			'supports'           => array( 'title', 'thumbnail' )
		);

		// Registra o CPT Sliders
		register_post_type( 'slider', $args );

	}
}

// Include the Odin_Metabox class.

function em_custom_metaboxes() {

    $em_custom_metaboxes_services = new Odin_Metabox(
        'meta_services', // Slug/ID of the Metabox (Required)
        'Ícone destacado', // Metabox name (Required)
        'servicos', // Slug of Post Type (Optional)
        'side', // Context (options: normal, advanced, or side) (Optional)
        'default' // Priority (options: high, core, default or low) (Optional)
    );

    $em_custom_metaboxes_services->set_fields(
        array(
            // Icon field.
            array(
                'id'          => 'icon_services', // Required
                'label'       => __( 'Imagem', 'em' ), // Required
                'type'        => 'image', // Required
                // 'default'     => '', // Optional (image attachment id)
                'description' => __( 'Ícone para exibição na Home', 'em' ), // Optional
            ),
        )
    );
}

add_action( 'init', 'em_custom_metaboxes', 1 );