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

<tr class="wpeo-form">
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="title" value="<?php echo esc_attr( $product->data['title'] ); ?>" />
			</label>
		</div>
	</td>
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="price_ttc" value="<?php echo esc_attr( $product->data['price_ttc'] ); ?>" />
				<span class="form-field-label-next">$</span>
			</label>
		</div>
	</td>
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="weight" value="<?php echo esc_attr( $product->data['weight'] ); ?>" />
				<span class="form-field-label-next">KG</span>
			</label>
		</div>
	</td>
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="color" value="<?php echo esc_attr( $product->data['color'] ); ?>" />
			</label>
		</div>
	</td>
	<td>
		<input type="hidden" name="action" value="create_product" />
		<?php wp_nonce_field( 'create_product' ); ?>

		<?php
		if ( empty( $product->data['id'] ) ) :
			?>
			<div class="wpeo-button button-square-40 action-input"
				data-parent="wpeo-form"><i class="button-icon fas fa-plus"></i></div>
			<?php
		else :
			?>
			<div class="wpeo-button button-square-40 action-input"
				data-parent="wpeo-form"><i class="button-icon fas fa-save"></i></div>
			<?php
		endif;
		?>
	</td>
</tr>
