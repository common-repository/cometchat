<?php

/**
 *
 *
 * @package cometchat
 */
	if ( ! defined( 'ABSPATH' ) ) exit;

	include_once(ABSPATH.'wp-admin'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'plugin.php');

	if ( !current_user_can( 'activate_plugins' ) ) {
		exit("You don't have permission to access this plugin.");
	}

	$selfhostedcc = $adminpanelurl = $cometchat_dir = $adminpaneliframe = $extraction_path = $cometchatPluginPath = $cometchatLogo = '';

	$cometchatPluginPath = plugin_dir_url( __FILE__ );
	if(!defined('CC_PLUGIN_REFRRER')) define('CC_PLUGIN_REFRRER', $cometchatPluginPath);

	$cometchatLogo = esc_url($cometchatPluginPath.'images/cometchat_logo.png');
	$cometchatDockedLayout = esc_url($cometchatPluginPath.'images/docked_layout.svg');

	if(empty($cc_clientid)){
		$cc_dir_name = getCometChatDirectoryName();
		$siteUrl = get_site_url();
		$adminpanelurl = esc_url($siteUrl.'/'.$cc_dir_name.'/admin/');
		$cometchat_dir = ABSPATH.$cc_dir_name;
	}

	if(!empty($cc_clientid) || !empty($_COOKIE['cc_cloud'])) {
		$cc_client_url = (!empty($_COOKIE['cc_cloud']) && $_COOKIE['cc_cloud'] != 1) ? $_COOKIE['cc_cloud'] : $cc_clientid;
		if($cc_client_url < 50000){
			$adminpanelurl = esc_url("//".$cc_client_url.".cometondemand.net/admin/");
		}else{
			$adminpanelurl = esc_url("https://secure.cometchat.com/licenses/access/".$cc_client_url);
		}
	}

	/** Initial access of CometChat Installation **/
	$isCometReady = get_option('ccintialaccess');

	/** Check if buddypress intalled or not **/
	if(empty($isCometReady) && is_plugin_active('buddypress/bp-loader.php')){
		update_option('show_friends', 'true');
		curlRequestToCometChatAPI('updateUserListSetting', array(
				'setting_key' => 'show_friends',
				'setting_value' => 'true'
			)
		);
	}

	if(!empty($cc_clientid) || !empty($_COOKIE['cc_cloud'])){
		if(empty($isCometReady)){
			include_once(plugin_dir_path(__FILE__).'comet-ready.php');
			add_option('ccintialaccess','1','','no');
		}else{
			include_once(plugin_dir_path(__FILE__).'comet-admin.php');
		}
	}else{
		$dir = plugin_dir_path( __FILE__ ).'installer.php';
		require_once($dir);
	}
?>