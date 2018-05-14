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

		Product_Class::g()->create( array(
			'title'     => $title,
			'price_ttc' => $price_ttc,
			'weight'    => $weight,
			'color'     => $color,
		) );

		wp_send_json_success();
	}
}

new Product_Action();
