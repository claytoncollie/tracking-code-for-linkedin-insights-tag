<?php
/**
 * Plugin Name:     Tracking Code For LinkedIn Insights Tag
 * Plugin URI:      https://github.com/claytoncollie/tracking-code-for-linkedin-insights-tag
 * Description:     Simple, lightweight solution for inserting your LinkedIn Insights Tag tracking code.
 * Author:          Clayton Collie
 * Author URI:      https://github.com/claytoncollie
 * Text Domain:     tracking-code-for-linkedin-insights-tag
 * Version:         2.0.0
 *
 * @package         Tracking_Code_For_Linkedin_Insights_Tag
 */

namespace Tracking_Code_For_Linkedin_Insights_Tag;

const OPTION_NAME = 'tracking_code_for_linkedin_insights_tag';
const FILTER_NAME = 'tracking_code_for_linkedin_insights_tag_id';
const CONFIG_NAME = 'TRACKING_CODE_FOR_LINKEDIN_INSIGHTS_TAG_ID';

require_once __DIR__ . '/inc/tracking-id.php';
require_once __DIR__ . '/inc/admin.php';
require_once __DIR__ . '/inc/public.php';
