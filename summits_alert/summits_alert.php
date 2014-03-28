<?php
/*
Plugin Name: Summits Alert
Description: Yell it from the summit! Place a sitewide alert message on your page.
Version: 1.0
Author: Ivan Eisenberg
Author URI: http://thosewhodig.net
*/

function summits_alert_init(){
	
	if(get_option('summits_alert_message') && get_option('summit_alert_message') !== ''){
		
		$css = '<style>.alert {
		padding: 8px 35px 8px 14px;
		color: #c09853;
		text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
		background-color: #fcf8e3;
		border: 1px solid #fbeed5;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		}

		.alert-heading {
		color: inherit;
		}

		.alert .close {
		position: relative;
		top: -2px;
		right: -21px;
		line-height: 18px;
		}

		.alert-success {
		color: #468847;
		background-color: #dff0d8;
		border-color: #d6e9c6;
		}

		.alert-danger,
		.alert-error {
		color: #b94a48;
		background-color: #f2dede;
		border-color: #eed3d7;
		}

		.alert-info {
		color: #3a87ad;
		background-color: #d9edf7;
		border-color: #bce8f1;
		}

		.alert-block {
		padding-top: 14px;
		padding-bottom: 14px;
		}

		.alert-block > p,
		.alert-block > ul {
		margin-bottom: 0;
		}

		.alert-block p + p {
		margin-top: 5px;
		}</style>';

		$output = '<div class="summit-alert-bar" ' . (get_option('summits_alert_center_message') ? ' style="text-align: center"' : '') . '><div class="alert alert-block alert-' . get_option('summits_alert_theme') . '">';
		$output .= '<p>' . stripslashes(get_option('summits_alert_message')) . '</p>';
		$output .= '</div></div>';

		if(get_option('summits_alert_css')){
			echo $css;
		}

		echo $output;	
	}
}

function summits_alert_admin_actions() {
    add_options_page("Summits Alert", "Site Alert", "manage_options", "summits_alert_options", "summits_alert_admin_render");
}

function summits_alert_admin_render(){
	include('summits_admin.php');
}


if(!is_admin()){
	// Frontend
	add_action('setup_theme', 'summits_alert_init');	
} else {
	// Admin
	add_action('admin_menu', 'summits_alert_admin_actions');	
}


?>