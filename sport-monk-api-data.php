<?php
/*
* Plugin Name: Sport-Monk-Api-Data
* Plugin URI: https://brrd.in.th
* Description: Sport-Monk-Api-Data
* Version: 1.0
* Author: brrd.in.th
* Author URI: https://brrd.in.th
* @package @sport-monk-api-data
*/
defined('ABSPATH') OR die("Access denied!");
/* DEFINED CONSTANT */
define('SMAD_BASE_PATH', plugin_dir_path(__FILE__));
define('SMAD_BASE_URL', plugin_dir_url(__FILE__));
/*include core files*/
include_once(SMAD_BASE_PATH . 'admin/setting.php');
include_once(SMAD_BASE_PATH . 'inc/smad-api.php');
/*get api setting details*/
add_action('init', 'smad_initialize');
function smad_initialize()
{
	$token = '';
	$token_name = '';
	$token_url = '';
	if(get_option('smad_appname') != '')
	{
		$token_name = get_option('smad_appname');
	}
	if(get_option('smad_apikey') != '')
	{
		$token = get_option('smad_apikey');
	}
	if(get_option('smad_apiurl') != '')
	{
		$token_url = get_option('smad_apiurl');
	}
	/*define api constant*/
	define('ACCESS_TOKEN',$token);
	define('ACCESS_TOKEN_NAME',$token_name);
	define('API_URL',$token_url);	
}


add_action('smad_update_data', 'smad_update_data_callback');
function smad_update_data_callback()
{
	/*$get_all_league = smad_get_all_league();*/
	/*leage data*/
	/**
	Array
	(
		[success] => 1
		[result] => Array
			(
				[0] => stdClass Object
					(
						[league_key] => 110
						[league_name] => 1. HNL
						[country_key] => 31
						[country_name] => Croatia
					)
			)
	)
	**/
	/** get all matches by date filter**/
	/*$get_all_matches = smad_get_matches();*/
	/**
	Array
	(
    	[success] => 1
    	[result] => Array
        (
            [0] => stdClass Object
                (
                    [event_key] => 139391
                    [event_date] => 2019-02-11
                    [event_time] => 20:45
                    [event_home_team] => Basford
                    [home_team_key] => 11191
                    [event_away_team] => Witton
                    [away_team_key] => 2796
                    [event_halftime_result] => 1 - 1
                    [event_final_result] => 3 - 1
                    [event_status] => Finished
                    [country_name] => ENGLAND
                    [league_name] => Northern Premier League
                    [league_key] => 156
                    [league_round] => Round 15
                    [league_season] => 2018/2019
                    [event_live] => 0
                    [goalscorers] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [time] => 8
                                    [home_scorer] => 
                                    [score] => 0 - 1
                                    [away_scorer] => Jones W.
                                )

                            [1] => stdClass Object
                                (
                                    [time] => 30
                                    [home_scorer] => Watson N.
                                    [score] => 1 - 1
                                    [away_scorer] => 
                                )

                            [2] => stdClass Object
                                (
                                    [time] => 80
                                    [home_scorer] => Carr L.
                                    [score] => 2 - 1
                                    [away_scorer] => 
                                )

                            [3] => stdClass Object
                                (
                                    [time] => 89
                                    [home_scorer] => Watson N.
                                    [score] => 3 - 1
                                    [away_scorer] => 
                                )

                        )

                    [substitutes] => Array
                        (
                        )

                    [cards] => Array
                        (
                        )

                    [lineups] => stdClass Object
                        (
                            [home_team] => stdClass Object
                                (
                                    [starting_lineups] => Array
                                        (
                                        )

                                    [substitutes] => Array
                                        (
                                        )

                                    [coaches] => Array
                                        (
                                        )

                                )

                            [away_team] => stdClass Object
                                (
                                    [starting_lineups] => Array
                                        (
                                        )

                                    [substitutes] => Array
                                        (
                                        )

                                    [coaches] => Array
                                        (
                                        )

                                )

                        )

                    [statistics] => Array
                        (
                        )

                )
		)
	)		
	**/
	/*after event dsfsdfsdfsd sdfsdfsdf*/
	print_r($get_all_matches);
	die("end hua");
	/*echo $key.' '.$value['name'];
	foreach($get_seasons['data'] as $key => $value){
		$arr = explode('/', $value['name']);
		unset($arr[0]);
		$repl = implode('/', $arr);
		
		$insert_taxonomy = smad_add_leagues_data($value['name'], $repl, 'sp_season');	
	}*/
	
	//$create_taxonomy = create_custom_taxonomy_for_sportsmonks($texo_name, $texo_slug, $post_type);
	//$get_all_league = smad_get_all_league();
	//$get_vanue_by_season_id = smad_get_vanue_by_season_id(12963); //$season_id
	//$get_seasons_with_fixtures = smad_get_season(12963);
	//$fixtures = smad_get_fixtures_by_session();
	//$get_livescore = smad_get_livescors();
	//$get_player_details = smad_get_player_details($player_id);
	//$get_standings_by_session_id = smad_get_standings_by_session_id($session_id);
	
	//$get_team_by_seasons = smad_get_teams_by_season(12963);
	//$team_squad_by_team_and_session = smad_get_team_squad_by_team_and_season(12963, 258);
	
	//$fixtures = smad_get_fixtures();
	
}

/* Getting League */
function smad_get_all_league()
{
	$end_point = API_URL . '?met=Leagues&APIkey=' . ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $leagues_result = smad_get_curl_data($end_point);
}

/*get all season*/
/*function smad_get_all_seasons()
{
	$end_point = API_URL . 'seasons?api_token='.ACCESS_TOKEN;//.'&include=results';
	return $player = smad_get_curl_data($end_point);
}*/
/*get season*/
/*function smad_get_season($season_id)
{
	$end_point = API_URL . 'seasons/' . $season_id . '?api_token='.ACCESS_TOKEN . '&include=fixtures';
	return $player = smad_get_curl_data($end_point);
}*/

/*get fixtures(events or matches) by date*/
function smad_get_matches()
{
	$event_start = get_option('smad_event_start');
	$event_start = date('Y-m-d', strtotime($event_start));
	$event_end = date('Y-m-d', strtotime($event_start . ' +1 day'));
	$end_point = API_URL . '?met=Fixtures&APIkey='.ACCESS_TOKEN.'&from='. $event_start .'&to='.$event_end;
	return $result = smad_get_curl_data($end_point);
}
/*get livescore*/
function smad_get_livescors()
{
	$end_point = API_URL . 'livescores?api_token='.ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $result = smad_get_curl_data($end_point);
}
/*get player details*/
function smad_get_player_details($player_id = 0)
{
	$end_point = 'players/' . $player_id.'?api_token='.ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $player = smad_get_curl_data($end_point);
}
/*get liveStandings by session id*/
function smad_get_standings_by_session_id($session_id = 0)
{
	$end_point = 'standings/season/' . $session_id.'?api_token='.ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $player = smad_get_curl_data($end_point);
}




/*get team by season*/
function smad_get_teams_by_season($season_id)
{
	$end_point = API_URL . 'teams/season/'. $season_id . '?api_token='.ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $player = smad_get_curl_data($end_point);
}
/*get team squad using session id and team id*/
function smad_get_team_squad_by_team_and_season($season_id, $team_id)
{
	$end_point = API_URL . 'squad/season/'. $season_id .'/team/'. $team_id . '?api_token='.ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $player = smad_get_curl_data($end_point);
}

/* Get vanue/Grounds */
function smad_get_vanue_by_season_id($season_id)
{
	$end_point = API_URL . 'venues/season/'.$season_id.'?api_token='.ACCESS_TOKEN;
	/*get player data by sports monk api*/
	return $player = smad_get_curl_data($end_point);
}
/*get player list*/
/*function smad_get_player_list()
{
	$end_point = 'players/' . $player_id;
	return $player = smad_get_curl_data($end_point);
}
https://brrd.in.th/wp-content/plugins/sport-monk-api-data/lib/smad-cron.php 
*/
 
//create a custom taxonomy name it "type" for your posts
function inserting_data_in_custom_taxonomy($texo_name, $texo_slug, $taxo_type) {
	wp_insert_term(
	  $texo_name, // the term 
	  $taxo_type, // the taxonomy
	  array(
		'description'=> $texo_name,
		'slug' => $texo_slug,
		'parent'=> $parent_term['term_id']  // get numeric term id
	  )
	);
}

function smad_add_leagues_data($texo_name, $texo_slug, $taxo_type) {
	/*$APIkey=!_your_account_APIkey_!;
$countryId = 135;

$curl_options = array(
  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Leagues&APIkey=$APIkey&countryId=$countryId",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CONNECTTIMEOUT => 5
);

$curl = curl_init();
curl_setopt_array( $curl, $curl_options );
$result = curl_exec( $curl );

$result = (array) json_decode($result);

var_dump($result);*/
	
	/*wp_insert_term(
	  $texo_name, // the term 
	  $taxo_type, // the taxonomy
	  array(
		'description'=> $texo_name,
		'slug' => $texo_slug,
		'parent'=> $parent_term['term_id']  // get numeric term id
	  )
	);*/
}