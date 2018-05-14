<?php
/**
 * Handle product
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
class Product_Class extends \eoxia\Post_Class {

	/**
	 * Model name @see ../model/*.model.php.
	 *
	 * @var string
	 */
	protected $model_name = '\my_plugin\Product_Model';

	/**
	 * Post type
	 *
	 * @var string
	 */
	protected $type = 'product';

	/**
	 * La clé principale du modèle
	 *
	 * @var string
	 */
	protected $meta_key = 'product';

	/**
	 * La route pour accéder à l'objet dans la rest API
	 *
	 * @var string
	 */
	protected $base = 'product';

	/**
	 * La taxonomy lié à ce post type.
	 *
	 * @var string
	 */
	protected $attached_taxonomy_type = '';

	/**
	 * Création du produit
	 *
	 * @return void
	 */
	protected function construct() {}

	public function display() {
		$products = $this->get();

		\eoxia\View_Util::exec( 'my-plugin', 'product', 'list', array(
			'products' => $products,
		) );
	}
}

Product_Class::g();
