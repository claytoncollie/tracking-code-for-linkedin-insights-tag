<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Linkedin_Insights_Tag
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_head', 'tracking_code_for_linkedin_insights_tag_do_the_script', 1, 0 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_code_for_linkedin_insights_tag_do_the_script() {
	/**
	 * Filter the measurement_id variable to support other methods of setting this value.
	 *
	 * @param string $measurement_id The Linkedin Insights Tag measurement ID.
	 * @return string
	 * @since 1.0.0
	 */
	$measurement_id = apply_filters( 'tracking_code_for_linkedin_insights_tag_id', get_option( 'tracking_code_for_linkedin_insights_tag', '' ) );

	if ( '' === $measurement_id ) {
		return;
	}

	printf(
		// phpcs:disable
		'
		<!-- Global site tag (gtag.js) - Linkedin Insights Tag -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=%1$s"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag("js", new Date());
		gtag("config", "%1$s");
		</script>
		',
		// phpcs:enable
		esc_attr( $measurement_id )
	);
}
