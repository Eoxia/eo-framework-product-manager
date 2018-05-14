<?php
/**
 * Define schema of product
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
* Handle product
*/
class Product_Model extends \eoxia\Post_Model {
	public function __construct( $object, $req_method = null ) {

		$this->schema['color'] = array(
			'type'      => 'string',
			'meta_type' => 'single',
			'field'     => '_color',
		);

		$this->schema['weight'] = array(
			'type'      => 'float',
			'meta_type' => 'single',
			'field'     => '_weight',
		);

		$this->schema['price_ttc'] = array(
			'type'      => 'float',
			'meta_type' => 'single',
			'field'     => '_price_ttc',
		);

		parent::__construct( $object, $req_method );
	}
}
