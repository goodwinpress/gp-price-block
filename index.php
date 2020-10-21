<?php

/**
 * Plugin Name: GP Price block
 * Plugin URI: https://goodwinpress.ru/plugin-price/
 * Description: Easy way to make fast and handy price lists using Gutenberg editor.
 * Version: 1.0.
 * Author: Alex Goodwin
 * Author URI: https://goodwinpress.ru/
 * Text Domain: gp-price-block
 *
 * @package gp-price-block
 */

defined( 'ABSPATH' ) || exit;

/**
 *  translations
*/
add_action( 'init', 'gp_price_block_load_textdomain' );

function gp_price_block_load_textdomain() {
	load_plugin_textdomain( 'gp-price-block', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets
 */
function gp_price_block_register_block() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	wp_register_script(
		'price-block',
		plugins_url( 'price-block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'price-block.js' )
	);

	wp_register_style(
		'editor',
		plugins_url( 'editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);

	wp_register_style(
		'style',
		plugins_url( 'style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);

register_block_type( 'gp-price-block/price', array(
		'style' => 'style',
		'editor_style' => 'editor',
		'editor_script' => 'price-block',
	) );

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'price-block', 'gp-price-block' );
	}

}
add_action( 'init', 'gp_price_block_register_block' );