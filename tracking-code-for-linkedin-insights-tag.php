<?php
/**
 * Plugin Name:     Tracking Code For Linkedin Insights Tag
 * Plugin URI:      https://github.com/claytoncollie/tracking-code-for-linkedin-insights-tag
 * Description:     Simple, lightweight solution for inserting your Linkedin Insights Tag tracking code.
 * Author:          Clayton Collie
 * Author URI:      https://github.com/claytoncollie
 * Text Domain:     tracking-code-for-linkedin-insights-tag
 * Version:         1.0.0
 *
 * @package         Tracking_Code_For_Linkedin_Insights_Tag
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/inc/admin.php';
require_once __DIR__ . '/inc/public.php';
