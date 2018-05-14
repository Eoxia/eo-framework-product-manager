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

	public function ajax_search_users() {
		$s = ! empty( $_POST['s'] ) ? sanitize_text_field( $_POST['s'] ) : '';
		if ( empty( $s ) ) {
			wp_send_json_error();
		}

		$user_query = new \WP_User_Query( array(
			'role'           => 'administrator',
			'search'         => '*' . $s . '*',
			'search_columns' => array(
				'user_login',
				'user_nicename',
				'user_email',
			),
		) );
		$users      = $user_query->results;

		ob_start();
		foreach ( $users as $user ) :
			?>
			<li data-id="<?php echo esc_attr( $user->ID ); ?>" data-result="<?php echo esc_html( $user->display_name ); ?>" class="autocomplete-result">
				<?php echo get_avatar( $user->ID, 32, '', '', array( 'class' => 'autocomplete-result-image autocomplete-image-rounded' ) ); ?>
				<div class="autocomplete-result-container">
					<span class="autocomplete-result-title"><?php echo esc_html( $user->display_name ); ?></span>
					<span class="autocomplete-result-subtitle"><?php echo esc_html( $user->user_email ); ?></span>
				</div>
			</li>
			<?php
		endforeach;

		wp_send_json_success( array(
			'view' => ob_get_clean(),
		) );
	}
}

new Hello_World_Action();
