<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';

class ZendvnMpAdmin
{

	private $_menuSlug = 'zendvn-mp-my-setting';

	private $_setting_options;

	public function __construct()
	{
		//echo '<br>' . __METHOD__;
		$this->_setting_options = get_option('zendvn_mp_name', array());
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

		add_settings_field(
			'zendvn_mp_new_title',
			'Site title',
			array($this, 'new_title_input'),
			$this->_menuSlug,
			$mainSection,
		);

		add_settings_field(
			'zendvn_mp_logo',
			'Logo:',
			array($this, 'logo_input'),
			$this->_menuSlug,
			$mainSection
		);
	}
	// tạo ra form theo tham số 1 (zendvn_mp_new_title) của add_settings_field 
	public function new_title_input()
	{
		echo '<input type="text" name="zendvn_mp_name[zendvn_mp_new_title]" 
				value="' . $this->_setting_options['zendvn_mp_new_title'] . '"/>';
	}
	public function logo_input()
	{
		echo '<input type="file" name="zendvn_mp_logo"/>';
		if (!empty($this->_setting_options['zendvn_mp_logo'])) {
			//hiển thị hình ảnh khi upload
			echo "<br/><br/><img src='" . $this->_setting_options['zendvn_mp_logo'] . "' width='200px' />";
		}
	}

	// upload file ảnh lên 
	public function validate_setting($data_input)
	{
		if (!empty($_FILES['zendvn_mp_logo']['name'])) {
			if (!empty($this->_setting_options['zendvn_mp_logo_path'])) {
				// xóa 
				@unlink($this->_setting_options['zendvn_mp_logo_path']);

				$override = array('test_form' => false);
				$fileInfo = wp_handle_upload($_FILES['zendvn_mp_logo'], $override);
				$data_input['zendvn_mp_logo'] = $fileInfo['url'];
				$data_input['zendvn_mp_logo_path'] = $fileInfo['file'];
			}
		} else {
			$data_input['zendvn_mp_logo'] = $this->_setting_options['zendvn_mp_logo'];
			$data_input['zendvn_mp_logo_path'] = $this->_setting_options['zendvn_mp_logo_path'];
		}
		return $data_input;
	}

	public function main_section_view()
	{
	}

	public function settingMenu()
	{

		// add_menu_page(
		// 	'My Setting title',
		// 	'My Setting',
		// 	'manage_options',
		// 	$this->_menuSlug,
		// 	array($this, 'settingPage')
		// );

		add_options_page(
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
