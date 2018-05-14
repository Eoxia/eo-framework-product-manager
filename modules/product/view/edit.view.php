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
				<input type="text" class="form-field" name="title" />
			</label>
		</div>
	</td>
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="price_ttc" />
				<span class="form-field-label-next">$</span>
			</label>
		</div>
	</td>
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="weight" />
				<span class="form-field-label-next">KG</span>
			</label>
		</div>
	</td>
	<td>
		<div class="form-element">
			<label class="form-field-container">
				<input type="text" class="form-field" name="color" />
			</label>
		</div>
	</td>
	<td>
		<input type="hidden" name="action" value="create_product" />
		<?php wp_nonce_field( 'create_product' ); ?>
		<div class="wpeo-button button-square-40 action-input"
			data-parent="wpeo-form"><i class="button-icon fas fa-plus"></i></div>
	</td>
</tr>
