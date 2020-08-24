<?php
/**
 * Plugin Name: JetEngine - Related posts HTML list
 * Plugin URI:  #
 * Description: Adds new callback to Dynamic Field widget, which allows to output related posts lists for the current posts in the Thumbnail + Title format.
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

/**
 * Add "Get thumb and title from related" callback into available callbacks list
 */
function jet_engine_add_rel_callback( $callbacks ) {
	$callbacks['jet_engine_rel_thumb_callback'] = 'Get thumb and title from related posts';
	return $callbacks;
}

/**
 * Return thumbnail and post title for pased related posts list
 */
function jet_engine_rel_thumb_callback( $posts ) {

	if ( empty( $posts ) ) {
		return;
	}

	$result = '';

	foreach ( $posts as $post_id ) {

		if ( ! has_post_thumbnail( $post_id ) ) {
			continue;
		}

		$result .= '<div class="rel-post-wrap">';
		$result .= get_the_post_thumbnail( $post_id, 'full', array( 'alt' => get_the_title( $post_id ) ) );
		$result .= '<div class="rel-post-title">' . get_the_title( $post_id ) . '</div>';
		$result .= '</div>';
	}

	return $result;

}
