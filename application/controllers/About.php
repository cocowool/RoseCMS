<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data = array();

		// 判断用户是否登陆
		if( $this->session->userdata('rs_user_login') ){
			$data['user_login'] = $this->session->userdata('rs_user_login');
		}else{
			$data['user_login'] = '';
		}

		$this->load->view('about', $data);
	}
}