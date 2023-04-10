<?php
require_once ZENDVN_MP_PLUGIN_DIR . '/includes/support.php';
class ZendvnMp
{

	public function __construct()
	{
		echo '<br/>' . __METHOD__;
		//1. Hàm thay đổi toàn bộ title trong hook 'the_title'
		//==============================================================
		//add_filter('the_title', array($this,'theTitle'));

		//2. Ham su dung 2 tham cua hook 'the_title'
		//=============================================================
		// add_filter('the_title', array($this,'theTitle2'),10,2);

		//3. Ham su dung 2 tham cua hook 'the_title' 
		// (10 là độ ưu tiên , 2 là lấy 2 tham số)
		//==============================================================
		//add_filter('the_title', array($this,'theTitle3'),10,2);

		//4. Hiển thị các Action đang thực thi trong Hook
		//==============================================================
		// add_action('wp_footer', array($this, 'showFunction'));

		//5. Su dung tham so content trong Hook 'the_content'
		//==============================================================
		//add_filter('the_content', array($this,'changeContent'));

		//6 Su dung tham so content trong Hook 'the_content'
		//=============================================================
		//add_filter('the_content', array($this,'changeContent2'));

		//7 Su dung tham so content trong Hook 'the_content'
		//=============================================================
		// add_filter('the_content', array($this, 'changeContent3'));
	}
	//1. Ham thay doi toan bo title trong hook 'the_title'
	public function theTitle()
	{
		$str = 'Thay doi tieu cua bai viet';
		return $str;
	}
	//2. Ham su dung 2 tham cua hook 'the_title'
	public function theTitle2($title, $id)
	{
		//echo "<br/>" . $id;
		if ($id == 1) {
			$title = str_replace("Hello", "Xin chào", $title);
		}
		return $title;
	}
	//3. Ham su dung 2 tham cua hook 'the_title'
	public function theTitle3($title, $id)
	{
		//echo "<br/>" . $id;
		if ($id == 1) {
			$title = 'Chào mừng các bạn đến với thế giới WP';
		}
		return $title;
	}
	//4. Hiển thị các Action đang thực thi trong Hook
	public function showFunction()
	{
		ZendvnMpSupport::showFunc('wp_footer');
	}
	//5. Su dung tham so content trong Hook 'the_content'
	public function changeContent($content)
	{
		$content .= 'Day la bai viet cua ZendVN';
		return $content;
	}

	//6. Su dung tham so content trong Hook 'the_content'
	public function changeContent2($content)
	{
		$content = str_replace('WordPress', '<a href="http://www.zend.vn">WP</a>', $content);
		return $content;
	}
	//7. Su dung tham so content trong Hook 'the_content'
	public function changeContent3($content)
	{
		global $post;
		if ($post->post_type == 'page') {
			$content .= "Day la mot bai viet cua ZendVN";
		}
		return $content;
	}
}
