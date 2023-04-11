<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMpAdmin
{

	public function __construct()
	{
		// echo '<br>' . __METHOD__;
		// tạo submenu 
		add_action('admin_menu', array($this, 'settingsMenu5'));
		// Xóa submenu
		// add_action('admin_menu', array($this, 'removeMenu'));
	}
	//================================================
	//ví dụ 1 : Thêm một submenu vào dashboard
	//================================================
	public function settingsMenu()
	{
		$menuSlug = 'zendvn-mp-my-setting';
		add_dashboard_page(
			'My Setting title',
			'My Setting',
			'manage_options',
			$menuSlug,
			array($this, 'settingPage')
		);
	}

	//=================================================================================
	/*ví dụ 2 : Thêm một nhóm menu vào hệ thống menu wp
	//=================================================================================
	add_menu_page là tạo ra một menu cùng cấp với menu trong hệ thống

	CHÚ THÍCH 5 THAM SỐ TRONG ADD_MENU_PAGE :
	 My Setting title : tiêu đề của trang , hiện thị trong cặp thẻ <title> của header
	 My Setting : tên của menu
	 manage_options là vùng nhóm user được truy cập
	 $menuSlug là giá trị duy nhất được gắn trên thanh đia chỉ 
	 array($this,'settingPage'))  gọi đến hàm hiển thị nội dung khi click vào menu 
	*/

	public function settingsMenu2()
	{
		$menuSlug = 'zendvn-mp-my-setting';
		add_menu_page(
			'My Setting title',
			'My Setting',
			'manage_options',
			$menuSlug,
			array($this, 'settingPage'),
			ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png'
		);

		add_menu_page(
			'My Setting 2 title',
			'My Setting 2',
			'manage_options',
			$menuSlug . '-2',
			array($this, 'settingPage'),
			ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png'
		);
	}

	//=================================================================================
	/*ví dụ 3 : Thêm một nhóm nenu vào hệ thống menu wp
	*/
	//=================================================================================
	public function settingsMenu3()
	{
		$menuSlug = 'zendvn-mp-my-setting';
		//  menu cùng cấp với menu hệ thống
		add_menu_page(
			'My Setting title',
			'My Setting',
			'manage_options',
			$menuSlug,
			array($this, 'settingPage'),
			ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png'
		);
		// menu con của add_menu_page 
		add_submenu_page(
			$menuSlug,
			"About title",
			"About",
			'manage_options',
			$menuSlug . '-about',
			array($this, 'aboutPage')
		);
		// menu con của add_menu_page 
		add_submenu_page(
			$menuSlug,
			"Help title",
			"Help",
			'manage_options',
			$menuSlug . '-help',
			array($this, 'helpPage')
		);
	}
	//ví dụ 4 :Thêm nhóm menu vào vị trí bất kì bằng số vị trí position
	public function settingsMenu4()
	{
		$menuSlug = 'zendvn-mp-my-setting';
		//  menu cùng cấp với menu hệ thống
		add_menu_page(
			'My Setting title',
			'My Setting',
			'manage_options',
			$menuSlug,
			array($this, 'settingPage'),
			ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png',
			3
		);
		// menu con của add_menu_page 
		add_submenu_page(
			$menuSlug,
			"About title",
			"About",
			'manage_options',
			$menuSlug . '-about',
			array($this, 'aboutPage')
		);
		// menu con của add_menu_page 
		add_submenu_page(
			$menuSlug,
			"Help title",
			"Help",
			'manage_options',
			$menuSlug . '-help',
			array($this, 'helpPage')
		);
	}
	// add_utility_page thêm nhóm menu vào cuối nhóm appearane
	public function settingsMenu5()
	{
		$menuSlug = 'zendvn-mp-my-setting';
		//  menu cùng cấp với menu hệ thống
		add_utility_page(
			'My Setting title',
			'My Setting',
			'manage_options',
			$menuSlug,
			array($this, 'settingPage'),
			ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png'
		);
		// menu con của add_menu_page 
		add_submenu_page(
			$menuSlug,
			"About title",
			"About",
			'manage_options',
			$menuSlug . '-about',
			array($this, 'aboutPage')
		);
		// menu con của add_menu_page 
		add_submenu_page(
			$menuSlug,
			"Help title",
			"Help",
			'manage_options',
			$menuSlug . '-help',
			array($this, 'helpPage')
		);
		//add_object_page là thêm nhóm menu vào dưới comments
		add_object_page(
			'My Setting 2 title',
			'My Setting 2',
			'manage_options',
			$menuSlug . '-2',
			array($this, 'settingPage'),
			ZENDVN_MP_IMAGES_URL . '/icon-setting16x16.png'
		);
	}
	//ví dụ 5 : xóa bỏ các menu trong hệ thống menu của wp
	public function removeMenu()
	{
		$menuSlug = 'zendvn-mp-my-setting';
		// xóa menu con trong menu cha 
		remove_submenu_page($menuSlug, $menuSlug . '-about');
		// xóa 1 nhóm menu tự tạo
		remove_menu_page($menuSlug);
		// xóa menu con mặc định của hệ thống 
		// remove_submenu_page('edit.php','post-new.php');
		// xóa 1 nhóm menu mặc định hệ thống 
		// remove_menu_page('edit.php');
	}

	// hàm hiển thị nội dung 
	public function settingPage()
	{
		//nhúng view vào phần hiển thị nội dung
		require ZENDVN_MP_VIEWS_DIR . '/setting-page.php';
	}
	// hàm hiển thị nội dung 
	public function aboutPage()
	{
		require ZENDVN_MP_VIEWS_DIR . '/about-page.php';
	}
	// hàm hiển thị nội dung 
	public function helpPage()
	{
		require ZENDVN_MP_VIEWS_DIR . '/help-page.php';
	}
}