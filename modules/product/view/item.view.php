<?php
/**
 * Main view of product module.
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
} ?>

<tr>
	<td><?php echo esc_html( $product->data['title'] ); ?></td>
	<td><?php echo esc_html( $product->data['price_ttc'] ); ?>$</td>
	<td><?php echo esc_html( $product->data['weight'] ); ?>KG</td>
	<td><?php echo esc_html( $product->data['color'] ); ?></td>
	<td>
		<div class="action-attribute wpeo-button button-square-40"
			data-action="load_edit_mode"
			data-nonce="<?php echo esc_attr( wp_create_nonce( 'load_edit_mode' ) ); ?>"
			data-id="<?php echo esc_attr( $product->data['id'] ); ?>"><i class="button-icon fas fa-edit"></i></div>
		<div class="wpeo-button button-square-40"><i class="button-icon fas fa-trash"></i></div>
	</td>
</tr>
