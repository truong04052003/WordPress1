<?php
class ZendvnMp_Widget_Db_Simple
{

	public function __construct()
	{

		add_action('wp_dashboard_setup', array($this, 'widget'));
	}

	public function widget()
	{
		wp_add_dashboard_widget(
			'zendvn_mp_widget_db_simple',
			'My Information',
			array($this, 'ordering')
		);
	}
	// VIDEO SỐ 11
	public function ordering()
	{
		$wpQuery = new WP_Query(array('orderby' => 'rand', 'posts_per_page' => '1'));

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	// VIDEO SỐ 10
	public function paging()
	{
		$wpQuery = new WP_Query(array('posts_per_page' => 5, 'paged' => 1, 'ignore_sticky_posts' => true));

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	// VIDEO SỐ 9
	public function password()
	{
		$wpQuery = new WP_Query(array('post_password' => 'abc123'));

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}
	// VIDEO SỐ 8
	public function post_page()
	{
		$wpQuery = new WP_Query(array('post_parent__in' => array(86)));

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}
	// VIDEO SỐ 8
	public function search()
	{
		$wpQuery = new WP_Query('s=công trình');

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	// VIDEO SỐ 7
	public function tag()
	{
		$wpQuery = new WP_Query(array('tag_slug__in' => array('php-course')));

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	// VIDEO SỐ 6
	public function category()
	{
		$wpQuery = new WP_Query('cat=3,5');

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}
	// VIDEO SỐ 5
	public function author()
	{
		$wpQuery = new WP_Query(array('author__not_in' => array(1, 2, 3)));

		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
	}

	public function display()
	{

		$arrQuery = array(
			'author' => 1,
			'cat' => 1,
			'posts_per_page' => 4
		);

		$wpQuery = new WP_Query();
		$wpQuery->query('posts_per_page=2');
		if ($wpQuery->have_posts()) {
			echo '<ul>';
			while ($wpQuery->have_posts()) {
				$wpQuery->the_post();
				echo '<li>' . get_the_ID() . ' - ' . get_the_title() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . translate('No post found') . '</p>';
		}
		echo "<br/>====================================";
		echo '<pre>';
		print_r($wpQuery);
		echo '</pre>';
	}
	// 	 public function display_hienthi(){
	// 	$wpQuery = new WP_Query('author=1');
	// 	$lnkPost = '#';

	// 	if(count($wpQuery->posts)>0){
	// 		foreach ($wpQuery->posts as $key => $val){
	// 			echo '<br/>' . $val->post_title;
	// 		}
	// 	}

	// 	//wp_reset_postdata();
	// 	echo "<br/>====================================";
	// 	echo '<pre>';
	// 	print_r($wpQuery->posts);
	// 	echo '</pre>'; 
	// } 
}
