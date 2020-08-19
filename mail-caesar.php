<?php
/**
 * Plugin Name:       Mail Caesar!
 * Description:       Send all email sent by WordPress to the site admin.
 * Plugin URI:        https://roytanck.com/2019/10/04/new-wordpress-plugin-mail-caesar/
 * Version:           1.2.1
 * Requires at least: 5.2
 * Author:            Roy Tanck
 * Author URI:        https://roytanck.com/
 * License:           GPL v3
 * Text Domain:       mail-caesar
 * Domain Path:       /languages
 */

// check if called directly
if( !defined( 'ABSPATH' ) ) { exit; }


if( !function_exists('mail_caesar_redirect_email') ) {

	function mail_caesar_redirect_email( $args ) {

		if( is_multisite() ) {
			// Get a list of all network-activated plugins.
			$network_plugins = get_site_option( 'active_sitewide_plugins', null );
			// check if Mail Caesar is in the list.
			if( array_key_exists( 'mail-caesar/mail-caesar.php', $network_plugins ) ) {
				// Get the network admin email address
				$admin_email = sanitize_email( get_site_option( 'admin_email', null ) );
			} else {
				// Get the admin email address from the site's settings.
				$admin_email = sanitize_email( get_option('admin_email') );
			}
		} else {
			// Get the admin email address from the site's settings.
			$admin_email = sanitize_email( get_option('admin_email') );
		}

		// check if the email address is valid
		if( is_email( $admin_email ) && $args['to'] != $admin_email ){
			// Create a string to add the the subject to show the original to address.
			$org_to = is_array( $args['to'] ) ? implode( ', ', $args['to'] ) : $args['to'];
			// Add the new string ot the subject.
			$args['subject'] = $args['subject'] . ' (' . $org_to . ')';
			// Replace the 'to' field, so the mail is delivered to the admin.
			$args['to'] = $admin_email;
		}

		// 'wp_mail' is a filter hook, so we need to return the args array.
		return $args;
	}

	add_filter( 'wp_mail','mail_caesar_redirect_email', 10, 1 );

}

?>
