<?php
class Zendvn_Mp_Widget_Simple extends WP_Widget {

	public function __construct() {
		
		$id_base = 'zendvn-mp-widget-simple';
		$name	= 'Abc Simple widget';
		$widget_options = array(
					'classname' => 'zendvn-mp-wg-css-simple',
					'description' => 'Day la mot Widget đơn gian'
				);
		$control_options = array('width'=>'250px');
		parent::__construct($id_base, $name,$widget_options, $control_options);
		//add_action('wp_head',array($this,'add_css'));
		
		/* wp_enqueue_style("wg-simple",ZENDVN_MP_CSS_URL . '/wg-simple.css',array(),'1.0','all');
		wp_register_style("wg-simple-01",ZENDVN_MP_CSS_URL . '/wg-simple-01.css',array(),'1.0','all');
		wp_enqueue_style("wg-simple-01"); */
		
		add_action( 'wp_enqueue_scripts', array($this,'add_file_css2'));
	}
	
	
	public function add_file_css2(){
		wp_register_style("wg-simple",ZENDVN_MP_CSS_URL . '/wg-simple.css',array(),'1.0','all');
		wp_register_style("wg-simple-01",ZENDVN_MP_CSS_URL . '/wg-simple-01.css',array(),'1.0','all');
		wp_register_style("wg-simple-02",ZENDVN_MP_CSS_URL . '/wg-simple-02.css',array(),'1.0','all');
		if(is_front_page()){
			wp_enqueue_style("wg-simple");
		}else if(is_page()){
			wp_enqueue_style("wg-simple-01");
		}else{
			wp_enqueue_style("wg-simple-02");
		}
	
	}
	
	public function add_file_css(){
		wp_enqueue_style("wg-simple",ZENDVN_MP_CSS_URL . '/wg-simple.css',array("wg-simple-01",'wg-simple-02'),'1.0','all');
		wp_register_style("wg-simple-01",ZENDVN_MP_CSS_URL . '/wg-simple-01.css',array(),'1.0','all');
		wp_register_style("wg-simple-02",ZENDVN_MP_CSS_URL . '/wg-simple-02.css',array(),'1.0','all');
		//wp_enqueue_style("wg-simple-01");
		
		global $wp_styles;
		echo '<pre>';
		print_r($wp_styles);
		echo '</pre>';
	}
	
	public function add_css(){
		$cssUrl = ZENDVN_MP_CSS_URL . '/wg-simple.css';
		$output= '<link rel="stylesheet" href="' . $cssUrl . '" type="text/css" media="all">';		
		echo $output;
	}
	
	/* public function add_css(){
		$output="<style> 
					.zendvn-mp-wg-css-simple { 
						background-color : #f1f1f1;
						border: solid 1px #000;
						padding: 5px; 
					} 
				</style>";
		echo $output;
	} */
	
	public function widget( $args, $instance ) {
		
		extract($args);				
				
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title))? 'Abc simple': $title;
		$movie = (empty($instance['movie']))? '&nbsp;':$instance['movie'];
		$song = (empty($instance['song']))? '&nbsp;':$instance['song'];
		echo $before_widget;
		echo $before_title . $title . $after_title;		
		echo '<ul>';
		echo '<li>Fav Movie: ' . $movie . '</li>';
		echo '<li>Fav Song: ' . $song . '</li>';
		echo '</ul>';
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['movie'] = strip_tags($new_instance['movie']);
		$instance['song'] = strip_tags($new_instance['song']);
		
		return $instance;
	}
	
	public function form( $instance ) {
		
			/* echo '<pre>';
			print_r($instance);
			echo '</pre>'; */
			$htmlObj =  new ZendvnHtml();
			
			//Tao phan tu chua Title
			$inputID 	= $this->get_field_id('title');
			$inputName 	= $this->get_field_name('title');
			$inputValue = $instance['title'];
			$arr = array('class' =>'widefat','id' => $inputID);			
			echo '<p><label for="' . $inputID . '">' . translate('Title') . '</label>'
				  . $htmlObj->textbox($inputName,$inputValue,$arr) 
				  . '</p>';
			
			//Tao phan tu chua Movie
			$inputID 	= $this->get_field_id('movie');
			$inputName 	= $this->get_field_name('movie');
			$inputValue = $instance['movie'];
			$arr = array('class' =>'widefat','id' => $inputID);
			echo '<p><label for="' . $inputID . '">' . translate('Movie') . '</label>'
			. $htmlObj->textbox($inputName,$inputValue,$arr)
			. '</p>';
			
			//Tao phan tu chua Song
			$inputID 	= $this->get_field_id('song');
			$inputName 	= $this->get_field_name('song');
			$inputValue = $instance['song'];
			$arr = array('class' =>'widefat','id' => $inputID);
			echo '<p><label for="' . $inputID . '">' . translate('Song') . '</label>'
			. $htmlObj->textbox($inputName,$inputValue,$arr)
			. '</p>';
		
	}
	

}
