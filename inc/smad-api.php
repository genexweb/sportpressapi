<?php
/**
* This functionality are helped to get sport monk api data
* @package sport-monk-api-data/inc
**/
defined('ABSPATH') OR die('Access denied!');
/**
* It is common function to get data by curl
**/

function smad_get_curl_data($end_point)
{
	$data = '';
	//echo $end_point;
	if(isset($end_point) && $end_point != '')
	{
		$curl_options = array(
		  CURLOPT_URL => $end_point,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);
		
		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );
		
		$result = (array) json_decode($result);
	}
	return $result;
}
/**
* It is common function to update data at endpoint by curl
**/
function smad_update_curl_data()
{

}
/**
* It is common function to delete data at endpoint by curl
**/
function smad_delete_curl_data()
{

}