<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';

class ZendvnMpAdmin
{

	private $_menuSlug = 'zendvn-mp-my-setting';

	private $_setting_options;

	public function __construct()
	{
		//echo '<br>' . __METHOD__;


		add_action('admin_menu', array($this, 'settingMenu'));

		add_action('admin_init', array($this, 'register_setting_and_fields'));
	}

	public function register_setting_and_fields()
	{

		register_setting('zendvn_mp_options', 'zendvn_mp_name', array($this, 'validate_setting'));

		//MAIN SETTING
		$mainSection = 'zendvn_mp_main_section';
		add_settings_section(
			$mainSection,
			"Main setting",
			array($this, 'main_section_view'),
			$this->_menuSlug
		);
		// add tạo ra các phần tử form 
		add_settings_field(
			'zendvn_mp_new_title',
			'Site title',
			array($this, 'new_title_input'),
			$this->_menuSlug,
			$mainSection
		);
		// add tạo ra các phần tử form 
		add_settings_field(
			'zendvn_mp_new_title_2',
			'Site title 2',
			array($this, 'new_title2_input'),
			$this->_menuSlug,
			$mainSection
		);

		//EXT SETTING			
		$extSection = "zendvn_mp_ext_section";
		add_settings_section(
			$extSection,
			"Ext setting",
			array($this, 'main_section_view'),
			$this->_menuSlug
		);
	}
	// tạo ra form theo tham số 1 (zendvn_mp_new_title) của add_settings_field 
	public function new_title_input()
	{
		echo '<input type="text" name="zendvn_mp_name[zendvn_mp_new_title]" value=""/>';
	}
	// tạo ra form theo tham số 1 (zendvn_mp_new_title_2) của add_settings_field 
	public function new_title2_input()
	{
		echo '<input type="text" name="zendvn_mp_name[zendvn_mp_new_title_2]" value=""/>';
	}

	public function validate_setting($data_input)
	{
	}

	public function main_section_view()
	{
	}

	public function settingMenu()
	{

		add_menu_page(
			'My Setting title',
			'My Setting',
			'manage_options',
			$this->_menuSlug,
			array($this, 'settingPage')
		);
	}

	public function settingPage()
	{
		require_once ZENDVN_MP_VIEWS_DIR . '/setting-page.php';
	}
}
