<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin
{

	public function __construct()
	{
		//echo '<br>' . __METHOD__;
		add_action('admin_init', array($this, 'add_new_option'));
	}
	// đưa mảng vào database của wp 
	public function add_array_option()
	{

		$arrOption = array(
			'course' => 'Wordpress 4.x',
			'author' => 'ZendVN group',
			'website' => 'www.zend.vn'
		);

		add_option('zendvn_mp_wp_course', $arrOption, '', 'yes');
		//zendvn_mp_wp_course là tên của option 
	}
	public function add_new_option()
	{
		add_option('zendvn_mp_wp_version', '4.0', '', 'yes');
		add_option('zendvn_mp_plugin_version', '1.0', '', 'no');
	}
	// lấy giá trị trong bảng wp_options 
	public function get_options()
	{
		$tmp = get_option('zendvn_mp_wp_version_1', '3.0');
		echo '<br/>' . $tmp;

		$arrOption = array(
			'course' => 'Wordpress 4.x',
			'author' => 'ZendVN group',
			'website' => 'www.zend.vn'
		);
		$tmp = get_option('zendvn_mp_wp_course', $arrOption);
		echo '<pre>';
		print_r($tmp);
		echo '</pre>';

		echo '<pre>';
		print_r($tmp);
		echo '</pre>';
	}
	// CẬP NHẬT LẠI GIÁ TRỊ OPTION_VALUE NẰM TRONG BẢNG WP_OPTION 
	public function update_options(){
		update_option('zendvn_mp_wp_version', '4.5');	
		$arrOption = array(
				'course' => 'Wordpress 4.5',
				'author' => 'ZendVN group',
				'website' => 'www.zend.vn'
			);
		update_option('zendvn_mp_wp_course', $arrOption);
	}
	//CẬP NHẬT 1 GIÁ TRỊ TRONG OPTION_VALUE CỦA OPTION NAME là zendvn_mp_wp_course
	public function update_options2(){
		$old_options = get_option('zendvn_mp_wp_course');
		$old_options['course'] = 'Wordpress 5';
		
		update_option('zendvn_mp_wp_course', $old_options);
	}
	// XÓA GIÁ TRỊ TRONG WP_OPTIONS 
	public function del_options(){
		delete_option('zendvn_mp_wp_version');
		delete_option('zendvn_mp_wp_course');
	}
	//CẬP NHẬT GIÁ TRỊ AUTOLOAD
	public function update_autoload(){
		$old_option = get_option('zendvn_mp_plugin_version'); /*lấy ra*/
		delete_option('zendvn_mp_plugin_version'); /*xóa*/
		add_option('zendvn_mp_plugin_version',$old_option,'','yes'); /*thêm vào lại*/
	}
	//NẾU TỒN TẠi THÌ CẬP NHẬT VALUE , NẾU KHÔNG TỒN TẠI THÌ THÊM MỚi
	public function update_options3(){
		update_option('zendvn_mp_plugin_version', '2.0');
		update_option('zendvn_mp_wp_version', '2.0');
	}
}
