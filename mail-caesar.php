<?php
/**
 * Plugin Name:       Mail Caesar!
 * Description:       Send all email sent by WordPress to the site admin.
 * Version:           1.0
 * Requires at least: 5.2
 * Author:            Roy Tanck
 * Author URI:        https://roytanck.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       all-mail-to-admin
 * Domain Path:       /languages
 */

// check if called directly
if( !defined( 'ABSPATH' ) ){ exit; }


if( !function_exists('mail_caesar_redirect_email') ){

	function mail_caesar_redirect_email( $args ){

		// get the admin email address from the site's settings
		$admin_email = sanitize_email( get_option('admin_email') );

		// check if the email address is valid
		if( is_email( $admin_email ) && $args['to'] != $admin_email ){
			// replace the 'to' field, so the mail is delivered to the admin
			$args['to'] = $admin_email;
		}

		// 'wp_mail' is a filter hook, so we need to return the args array
		return $args;
	}

	add_filter( 'wp_mail','mail_caesar_redirect_email', 10, 1 );

}

?>