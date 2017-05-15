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

add_image_size( 'project-item-size', 400, 250, true );
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

/**
 * Custom Single Project Background Image
 */
function my_styles_method() {
    if(!is_single()){
        return;
    }
    $url = CFS()->get( 'background_image' );//This is grabbing the background image via Custom Field Suite Plugin
    $mobile = wp_get_attachment_image_src($url, 'mobile-size');
    $tablet = wp_get_attachment_image_src($url, 'tablet-size');
    $desktop = wp_get_attachment_image_src($url, 'desktop-size');
    $custom_css = "
        .project-hero {
          background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({$mobile[0]}) no-repeat top center;
          background-size: cover;
        }
        @media (min-width: 600px) {
          .project-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({$tablet[0]}) no-repeat top center;
            background-size: cover;
          }
        }
        @media (min-width: 1024px) {
          .project-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({$desktop[0]}) no-repeat center;
            background-size: cover;
            background-attachment: fixed;
          }
        }
    ";
    wp_add_inline_style( 'jonathan-funk-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );

// add category nicenames in body and post class
function category_id_class( $classes ) {
	global $post;
	foreach ( ( get_the_category( $post->ID ) ) as $category ) {
		$classes[] = $category->category_nicename;
	}
	return $classes;
}
add_filter( 'post_class', 'category_id_class' );
add_filter( 'body_class', 'category_id_class' );

add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
  return $title;
});
