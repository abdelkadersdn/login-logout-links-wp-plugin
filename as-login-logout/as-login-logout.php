<?php

/**
 *
 * Plugin Name:       WordPress Login/Logout Links via Shortcode
 * Plugin URI:        https://www.agillia.fr
 * Description:       This plugin displays admin or user login or logout links anywhere on the page or post via shortcode [as-login-logout]
 * Version:           1.0.0
 * Author:            Abdelkader Soudani
 * Author URI:        https://abdelakder.com.tn
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       abdelkader
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_shortcode('as-login-logout', 'as_display_login_links');

function as_display_login_links() {
	ob_start();

	if(is_user_logged_in()) : 
		// Set the logout URL - below it is set to the root URL
		?>
		<a href="<?php echo wp_logout_url('/'); ?>">
			Logout
		</a>
	
	<?php 
		else : 
		// Set the login URL - below it is set to get_permalink() - you can set that to whatever URL eg '/whatever'
	?>
		<a href="<?php echo wp_login_url(get_permalink()); ?>">
			Login
		</a>
	<?php 
		endif;
	

	return ob_get_clean();
}

