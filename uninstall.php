<?php
if (!defined( 'WP_UNINSTALL_PLUGIN' ) ){
	exit();
}

// Delete options from WP_OPTIONS table
delete_option( 'summits_alert_message' );
delete_option( 'summits_alert_theme' );
delete_option( 'summits_alert_css' );
delete_option( 'summits_alert_center_message' );

?>