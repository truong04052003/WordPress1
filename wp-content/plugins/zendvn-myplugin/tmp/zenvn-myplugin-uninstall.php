<?php
/*
Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/
register_uninstall_hook(__FILE__, 'zendvn_mp_uninstall');

/*==========================================================
 * Vi du 3
*==========================================================*/
function zendvn_mp_uninstall(){
	global $wpdb;
	//OPTION API
	delete_option('zendvn_mp_version');
	delete_option('zendvn_mp_options');
	
	$table_name =  $wpdb->prefix . 'zendvn_mp_test';
	$sql = 'DROP TABLE IF EXISTS ' . $table_name;
	$wpdb->query($sql);
	
}