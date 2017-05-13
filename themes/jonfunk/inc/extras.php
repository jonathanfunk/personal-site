<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Jonathan_Funk_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );


//This will add a data attribute of 'data-scroll' to the navigation links
add_filter( 'nav_menu_link_attributes', 'add_data_atts_to_nav', 10, 4 );
    function add_data_atts_to_nav( $atts, $item, $args ) {
    $atts['data-scroll'] = 'true';
    return $atts;
}

add_image_size( 'project-item-size', 400, 400, true );
add_image_size( 'desktop-size', 1600, 1000, true );
add_image_size( 'tablet-size', 640, 400, true );
add_image_size( 'mobile-size', 320, 200, true );

add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'project-item' => __( 'Project Item Size' ),
        'desktop-size' => __( 'Desktop Size' ),
        'tablet-size' => __( 'Tablet Size' ),
        'mobile-size' => __( 'Mobile Size' ),
    ) );
}
