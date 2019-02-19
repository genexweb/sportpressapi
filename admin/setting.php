<?php
/**
* save api setting details
* @package sport-monk-api-data/admin
**/
defined('ABSPATH') OR die('Access denied!');

/* Adding setting Menus in Admin panel */
add_action( 'admin_menu', 'smad_setting_admin_menu' );
function smad_setting_admin_menu() 
{
	add_menu_page('Sport Monks Api Setting', 'Sport Monks Api Setting', 'manage_options', 'smad-setting', 'sport_monk_api_admin_setting_page' );
}

function sport_monk_api_admin_setting_page(){
	
	if(isset($_POST['submit_setting']))
	{
		$event_start = $_POST['event_start'];
		$apikey = $_POST['apikey'];
		$apiurl = $_POST['apiurl'];
		update_option('smad_event_start', $event_start);
		update_option('smad_event_end', $event_end);
		update_option('smad_apikey', $apikey);
		update_option('smad_apiurl', $apiurl);
	}
	
	$event_start = get_option('smad_event_start');
	$apikey = get_option('smad_apikey');
	$apiurl = get_option('smad_apiurl');
?>
	<form method="post" action="">
		<table width="600" height="300px" border="1" align="center">
	  		<tr>
				<td colspan="2" align="center"><h2>Sport Monks Api Configration</h2></td>
			</tr>
            <tr>
                <td>Events Start Date </td>
                <td>
                	<input type="text" name="event_start" id="event_start" value="<?php if(!empty($event_start)){ echo $event_start;}?>" />
                </td>
            </tr>
            <tr>
                <td>Api Key</td>
                <td>
                	<input type="text" name="apikey" id="apikey" value="<?php if(!empty($apikey)){ echo $apikey;}?>" size="50px" />
                </td>
            </tr>
            <tr>
                <td>Api URL</td>
                <td><input type="text" name="apiurl" id="apiurl" value="<?php if(!empty($apiurl)){ echo $apiurl;}?>" size="50px" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit_setting" value="Save" id="submit_setting" /></td>
			</tr>
		</table>
	</form>
<?php
}