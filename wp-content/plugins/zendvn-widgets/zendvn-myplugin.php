<?php
/*
 Plugin Name: ZendVN MyPlugin
Plugin URI: http://www.zend.vn
Description: Tim hieu ve qua trinh chuan xay dung Plugin 10.
Author: ZendVN group
Version: 1.0
Author URI: http://www.zend.vn
*/

define('ZENDVN_MP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ZENDVN_MP_IMAGES_URL', ZENDVN_MP_PLUGIN_URL . 'images');
define('ZENDVN_MP_CSS_URL', ZENDVN_MP_PLUGIN_URL . 'css');
define('ZENDVN_MP_JS_URL', ZENDVN_MP_PLUGIN_URL . 'js');

define('ZENDVN_MP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ZENDVN_MP_VIEWS_DIR', ZENDVN_MP_PLUGIN_DIR . '/views');
define('ZENDVN_MP_INCLUDES_DIR', ZENDVN_MP_PLUGIN_DIR . '/includes');
define('ZENDVN_MP_WIDGET_DIR', ZENDVN_MP_PLUGIN_DIR . '/widgets');

if(!is_admin()){
	require_once ZENDVN_MP_PLUGIN_DIR . '/public.php';
	new ZendvnMp();
}else{
	require_once ZENDVN_MP_INCLUDES_DIR . '/html.php';
	require_once ZENDVN_MP_PLUGIN_DIR . '/admin.php';
	new ZendvnMpAdmin();
	
	require_once ZENDVN_MP_WIDGET_DIR . '/db_simple.php';
	new ZendvnMp_Widget_Db_Simple();
	
}
add_action("widgets_init",'zendvn_mp_widget_simple');
function zendvn_mp_widget_simple(){
	// register_widget('Zendvn_Mp_Widget_Simple');
}


