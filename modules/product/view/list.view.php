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

<table class="wpeo-table">
	<thead>
		<tr>
			<th><?php esc_html_e( 'Title', 'my-plugin' ); ?></th>
			<th><?php esc_html_e( 'Price TTC', 'my-plugin' ); ?></th>
			<th><?php esc_html_e( 'Weight', 'my-plugin' ); ?></th>
			<th><?php esc_html_e( 'Color', 'my-plugin' ); ?></th>
			<th><?php esc_html_e( 'Actions', 'my-plugin' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ( ! empty( $products ) ) :
			foreach ( $products as $product ) :
				\eoxia\View_Util::exec( 'my-plugin', 'product', 'item', array(
					'product' => $product,
				) );
			endforeach;
		endif;
		\eoxia\View_Util::exec( 'my-plugin', 'product', 'edit', array(
			'product' => $product_schema,
		) );
		?>
	</tbody>
</table>
