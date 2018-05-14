<?php
/**
 * Action of product module.
 *
 * @author You <you@mail>
 * @since 0.1.0
 * @version 0.1.0
 * @copyright 2017+
 * @package my_plugin
 */

namespace my_plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Action of product module.
 */
class Product_Action {

	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @version 0.1.0
	 */
	public function __construct() {
		add_action( 'wp_ajax_create_product', array( $this, 'callback_create_product' ) );
		add_action( 'wp_ajax_load_edit_mode', array( $this, 'callback_load_edit_mode' ) );
	}

	public function callback_create_product() {
		check_ajax_referer( 'create_product' );

		$title     = ! empty( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
		$price_ttc = ! empty( $_POST['price_ttc'] ) ? floatval( str_replace( ',', '.', $_POST['price_ttc'] ) ) : 00.00;
		$weight    = ! empty( $_POST['weight'] ) ? floatval( str_replace( ',', '.', $_POST['weight'] ) ) : 00.00;
		$color     = ! empty( $_POST['color'] ) ? sanitize_text_field( $_POST['color'] ) : '';

		// Force le nombre flottant à être sans virgule, et 2 décimals.
		$price_ttc = str_replace( ',', '', number_format( $price_ttc, 2 ) );
		$weight    = str_replace( ',', '', number_format( $weight, 2 ) );

		$product = Product_Class::g()->create( array(
			'title'     => $title,
			'price_ttc' => $price_ttc,
			'weight'    => $weight,
			'color'     => $color,
		) );

		ob_start();
		\eoxia\View_Util::exec( 'my-plugin', 'product', 'item', array(
			'product' => $product,
		) );

		wp_send_json_success( array(
			'namespace'        => 'myPlugin',
			'module'           => 'product',
			'callback_success' => 'createdProductSuccess',
			'view'             => ob_get_clean(),
		) );
	}

	public function callback_load_edit_mode() {
		check_ajax_referer( 'load_edit_mode' );

		$id = ! empty( $_POST['id'] ) ? (int) $_POST['id'] : 0;

		if ( empty( $id ) ) {
			wp_send_json_error();
		}

		$product = Product_Class::g()->get( array( 'id' => $id ), true );

		ob_start();
		\eoxia\View_Util::exec( 'my-plugin', 'product', 'edit', array(
			'product' => $product,
		) );
		wp_send_json_success( array(
			'namespace'        => 'myPlugin',
			'module'           => 'product',
			'callback_success' => 'loadedEditModeSuccess',
			'view'             => ob_get_clean(),
		) );
	}
}

new Product_Action();
