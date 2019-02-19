<?php
/**
* This is cron file to update spornt press post data. api setting are managed by sport monk api data plugin setting panel.
* @package: sport-monk-api-data
**/
$current_dir_path = getcwd();
$current_dir_path_arr = explode('wp-content/', $current_dir_path);
/*check base path is not empty or null*/
if(!empty($current_dir_path_arr[0]))
{
	$site_base_path = $current_dir_path_arr[0];
	/*load wordpress core functionality*/
	require_once($site_base_path . "wp-load.php");
	/*check wordpress is loaded*/
	defined("ABSPATH") OR die("Access denied!");
	/**
	* Call cron function. Here we are adding wordrpess action so user can change cron functionality in easy way. not need to change in cron file.
	* @action: dbr_digest_report_notification
	* @parameter: 
	**/
	//smad_get_player_details();
	do_action('smad_update_data');
	
}