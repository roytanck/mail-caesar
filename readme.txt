=== Mail Caesar! ===
Contributors: roytanck
Tags: email, development, multisite, email, testing
Requires at least: 5.2
Tested up to: 6.6
Requires PHP: 5.6
Stable tag: 1.2.1
License: GPLv3

Redirect all email sent by WordPress to the admin's email address.

== Description ==

= Redirect all email sent by WordPress to the admin's email address. =

When activated, this plugin will send all email sent by WordPress to the admin email address instead of the intended recipient.

It uses the wp_mail filter to modify the "to" address for all email sent by WordPress. When active, all email sent through WordPress's wp_mail() function is rerouted to the admin email address as configured under "Settings - General".

One of its uses is to allow the creation of new users during testing. WordPress requires user email addresses to be unique, and sends confirmation messages to these addresses. Using this plugin, you can use fake addresses, and still receive the activation links.

== Installation ==

1. Install and activate using the 'Plugins' menu in WordPress 
1. Check that the admin email address is properly configured under 'Settings'

The plugin does not have any settings.

== Frequently Asked Questions ==

= Will the original adressee receive the email? =

No. This plugin replaces the address the email is sent to. No email is sent to the original recipient.

= Will this plugin affect all emails sent from WordPress? =

The plugin uses a filter in WordPress's wp_mail() function. Any mail sent through PHP directly, or through a different email function will not be affected. All notification emails sent by WordPress use wp_mail(). Newsletter plugins often use another way of sending email.

= Should I use this plugin on my live website? =

Probably not. It is intended to be used during testing and for troubleshooting. In most cases you'll want email to be sent to the users requesting them.

== Changelog ==

= 1.2.1 (2020-08-19) =
* Minor bugfixes

= 1.2 (2020-04-03) =
* Added the original recipient's email address to the email's subject

= 1.1 (2020-03-14) =
* Use the network admin email address when network-activated on multisite

= 1.0 (2019-09-30) =
* Initial release
