<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends MX_Controller {
	public function __construct(){
		parent::__construct();

		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data);

		$this->template->set_partial('footer','footer',$data);
	}
	
	public function index(){
		$data = array();
		

		$this->template->build('game',$data);
	}
	public function caro(){
		$data = array();

		$data['item'] = array('title'=>'Cờ caro',
								'description'=>'Chơi cờ caro Online',
								'slug'=>'caro',
								'image'=>'caro.png');

		$this->template->build('caro',$data);
	}
	public function xepso(){
		$data = array();
		
		$data['item'] = array('title'=>'Xếp số',
								'description'=>'Sắp xếp lại thứ tự đúng cho bảng số, ko dễ đâu ;))',
								'slug'=>'xepso',
								'image'=>'xepso.png');

		$this->template->build('xepso',$data);
	}
	public function memory(){
		$data = array();
		
		$data['item'] = array('title'=>'Luyện trí nhớ',
								'description'=>'Luyện nhiều cẩn thận mất trí nhớ luôn =))',
								'slug'=>'memory',
								'image'=>'back-side.png');

		$this->template->build('memory',$data);
	}
	public function g2048(){
		$data = array();
		
		$data['item'] = array('title'=>'2048',
								'description'=>'Đơn giản là tạo ra số 2048 :D',
								'slug'=>'2048',
								'image'=>'2048.png');

		$this->template->build('2048',$data);
	}
}