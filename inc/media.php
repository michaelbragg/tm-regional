<?php
/**
 *
 */

function tm_regional_image_size() {

	// Image size for brands page
	add_image_size( 'brands-thumbnail', 450 );

}

add_action( 'after_setup_theme', 'tm_regional_image_size' );
