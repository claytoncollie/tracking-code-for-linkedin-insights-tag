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

add_action( 'wp_footer', 'tracking_code_for_linkedin_insights_tag_do_the_script', 99, 0 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_code_for_linkedin_insights_tag_do_the_script() {
	/**
	 * Filter the partner_id variable to support other methods of setting this value.
	 *
	 * @param string $partner_id The Linkedin Insights Tag partner ID.
	 * @return string
	 * @since 1.0.0
	 */
	$partner_id = apply_filters( 'tracking_code_for_linkedin_insights_tag_id', get_option( 'tracking_code_for_linkedin_insights_tag', '' ) );

	if ( '' === $partner_id ) {
		return;
	}

	printf(
		// phpcs:disable
		'
		<script type="text/javascript">
		_linkedin_partner_id = "%1$s";
		window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
		window._linkedin_data_partner_ids.push(_linkedin_partner_id);
		</script><script type="text/javascript">
		(function(){var s = document.getElementsByTagName("script")[0];
		var b = document.createElement("script");
		b.type = "text/javascript";b.async = true;
		b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
		s.parentNode.insertBefore(b, s);})();
		</script>
		<noscript>
		<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=%1$s&fmt=gif" />
		</noscript>
		',
		// phpcs:enable
		esc_attr( $partner_id )
	);
}
