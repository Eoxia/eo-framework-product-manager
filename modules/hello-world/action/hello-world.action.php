<?php
/**
 * Action of "Hello_World" module.
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
 * Action of "Hello_World" module.
 */
class Hello_World_Action {

	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @version 0.1.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'callback_admin_menu' ) );

		add_action( 'wp_ajax_search_users', array( $this, 'ajax_search_users' ) );
	}


	/**
	 * Add submenu "Hello Word".
	 *
	 * @since 0.1.0
	 * @version 0.1.0
	 */
	public function callback_admin_menu() {
		add_menu_page( 'Hello World', 'Hello World', 'manage_options', 'hello-world', array( $this, 'callback_add_menu_page' ) );
	}

	/**
	 * Display view of the submenu "Hello World".
	 *
	 * @since 0.1.0
	 * @version 0.1.0
	 */
	public function callback_add_menu_page() {
		\eoxia\View_Util::exec( 'my-plugin', 'hello_world', 'main' );
	}
}

new Hello_World_Action();
