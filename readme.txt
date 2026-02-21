=== Tracking Code for LinkedIn Insights Tag ===
Contributors: claytoncollie
Donate link: https://github.com/sponsors/claytoncollie
Tags: linkedin, insights tag, analytics, tracking code, conversion tracking
Requires at least: 5.2
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 2.0.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple, lightweight solution for inserting your LinkedIn Insights Tag tracking code.

== Description ==

Tracking Code For LinkedIn Insights Tag is a simple, lightweight WordPress plugin for inserting your LinkedIn Insights Tag tracking code. The plugin does one thing and one thing only; prints the standard LinkedIn Insights Tag tracking script to the `<body>` of your website. To insert your partner ID, navigate to Settings > General and then scroll to the bottom of the page.

### Composer

`composer require claytoncollie/tracking-code-for-linkedin-insights-tag`

### Definitions

If you want to set the partner ID with a constant in your `wp-config.php` file, use the definition below. When a definition is set, the admin input field will be disabled.

`define( 'TRACKING_CODE_FOR_LINKEDIN_INSIGHTS_TAG_ID', '1234567' );`

### Filters

If you want to set the partner ID without using the wp-admin user interface, use the filter below. When a filter is set, the admin input field will be disabled.

`
add_filter(
	'tracking_code_for_linkedin_insights_tag_id',
	/**
	 * Set LinkedIn Insights Tag partner ID.
	 *
	 * @param string $partner_id Partner ID.
	 *
	 * @return string
	 */
	function ( $partner_id ) {
		return '7654321';
	}
);
`

### Related Plugins

* [Tracking Code for Google Analytics](https://wordpress.org/plugins/tracking-code-for-google-analytics/)
* [Tracking Code for Google Tag Manager](https://wordpress.org/plugins/tracking-code-for-google-tag-manager/)
* [Tracking Code for Pinterest Pixel](https://wordpress.org/plugins/tracking-code-for-pinterest-pixel/)
* [Tracking Code for Twitter Pixel](https://wordpress.org/plugins/tracking-code-for-twitter-pixel/)

### Contributing

While the purpose of this plugin is to be very tightly scoped, issues and pull requests are welcome, but I do not guarantee that everything will be merged or support will be given.

https://github.com/claytoncollie/tracking-code-for-linkedin-insights-tag

== Installation ==

1. Upload `tracking-code-for-linkedin-insights-tag` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to Settings > General > scroll to the bottom of the page
4. Insert your partner ID
5. Save your changes

== Frequently Asked Questions ==

= Why did you build this plugin? =

The plugins I have used in the past to solve this problem have too many features for my liking. This plugin is comprised of two functions. One for registering a settings field on the Options General page. And another for printing the tracking code to the frontend. I want a lightweight solution for the websites that I build without all of the extra bells and whistles. If you are expecting this plugin to do more or grow in the future, please do not use it.

= Where is the tracking code inserted? =

The tracking code is inserted into the `<body>` section.

= Will this plugin slow down my website? =

No. This plugin is intentionally lightweight. All it does is register a settings field, saves to the database, and then inserts the tracking code. Nothing more.

= I found a bug. How do I report it? =

https://github.com/claytoncollie/tracking-code-for-linkedin-insights-tag/issues

= Can I use this plugin with Composer? =

https://packagist.org/packages/claytoncollie/tracking-code-for-linkedin-insights-tag

== Changelog ==

= 2.0.0 =
* Add PHP namespace
* Add wp-config.php definition support for partner ID
* Add filter-based configuration support
* Add disabled input field when definition or filter overrides value
* Add parameter and return type hints to all functions
* Bump minimum PHP version to 7.2
* Bump minimum WordPress version to 5.2
* Bump tested up to WordPress 6.9

= 1.0.0 =
* Initial release
