<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Linkedin_Insights_Tag
 */

namespace Tracking_Code_For_Linkedin_Insights_Tag;

use function Tracking_Code_For_Linkedin_Insights_Tag\get_the_id;

add_action( 'wp_footer', __NAMESPACE__ . '\tracking_script', 99 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_script() : void {
	$partner_id = get_the_id();

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
