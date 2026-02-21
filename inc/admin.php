<?php
/**
 * Admin facing features.
 *
 * @package Tracking_Code_For_Linkedin_Insights_Tag
 */

namespace Tracking_Code_For_Linkedin_Insights_Tag;

use function Tracking_Code_For_Linkedin_Insights_Tag\get_the_id;
use const Tracking_Code_For_Linkedin_Insights_Tag\CONFIG_NAME;
use const Tracking_Code_For_Linkedin_Insights_Tag\FILTER_NAME;
use const Tracking_Code_For_Linkedin_Insights_Tag\OPTION_NAME;

add_action( 'admin_init', __NAMESPACE__ . '\register_setting' );
/**
 * Register the settings field for the partner ID.
 *
 * @return void
 *
 * @since 1.0.0
 */
function register_setting() : void {
	\add_settings_field(
		'tracking_code_for_linkedin_insights_tag_id_field',
		esc_html__( 'LinkedIn Insights Tag', 'tracking-code-for-linkedin-insights-tag' ),
		__NAMESPACE__ . '\input_field',
		'general',
		'default',
		array(
			'id'          => OPTION_NAME,
			'name'        => OPTION_NAME,
			'value'       => get_the_id(),
			'description' => esc_html__( 'Enter your LinkedIn Insights Tag partner ID eg. 1234567', 'tracking-code-for-linkedin-insights-tag' ),
			'disabled'    => defined( CONFIG_NAME ) || has_filter( FILTER_NAME ) ? 'disabled' : '',
		)
	);

	\register_setting(
		'general',
		OPTION_NAME,
		array(
			'type'              => 'string',
			'description'       => esc_html__( 'LinkedIn Insights Tag partner ID', 'tracking-code-for-linkedin-insights-tag' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		)
	);
}

/**
 * WordPress admin input field.
 *
 * @param array<string> $args The field settings.
 *
 * @return void
 *
 * @since 1.0.0
 */
function input_field( array $args ) : void {
	$args = wp_parse_args(
		$args,
		array(
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'description' => '',
			'disabled'    => '',
		)
	);

	printf(
		'<input type="text" id="%1$s" name="%1$s" value="%2$s" aria-describedby="%3$s-description" class="regular-text ltr" %5$s /><p class="description" id="%3$s-description">%4$s</p>',
		esc_attr( $args['name'] ),
		esc_attr( $args['value'] ),
		esc_attr( $args['id'] ),
		esc_html( $args['description'] ),
		esc_html( $args['disabled'] )
	);
}
