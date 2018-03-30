<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat extends CI_Controller {
	private $api_domain = 'https://api.weixin.qq.com';

	public function index(){

	}

	public function menu( $action = 'list' ){
		$data = array();

		$data['rs_view_main'] = 'manage/wechat/menu_list';
		$data['rs_view_data'] = $q_data;

		$this->load->view('manage/dashboard', $data);
	}

	public function serverside( $action = ''){
		switch ($action) {
			case 'menu':
				# code...
				$this->serverside_menu();
				break;
			default:
				# code...
				break;
		}
	}

	private function serverside_menu(){
		$this->load->library('weixin');

		$token = $this->weixin->getToken();
		$menus = $this->weixin->getMenu($token);

		print_r($menus);
	}
}