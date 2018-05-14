<?php
/**
 * Main view of "Hello_World" module.
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

<div class="wrap wpeo-wrap">
	<h1>Hello World</h1>

	<div class="wpeo-button button-main action-attribute"
		data-action="create_product"
		data-nonce="<?php echo esc_attr( wp_create_nonce( 'create_product' ) ); ?>">
		<?php esc_html_e( 'Create product', 'my-plugin' ); ?>
	</div>

	<?php Product_Class::g()->display(); ?>
</div>
