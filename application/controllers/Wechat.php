<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat extends CI_Controller {
	private $api_domain = 'https://api.weixin.qq.com';

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->library('xmlrpc');
		$this->load->library('xmlrpcs');

		$get_data = $this->input->get(NULL, true);
		$post_data = $this->input->post(NULL, true);

		if(empty($get_data)){
			//echo "Hello, empty message!";
		}

		// 服务器端验证代码
		// $signature = $data['signature'];
		// $timestamp = $data['timestamp'];
		// $nonce = $data['nonce'];
		// $echostr = $data['echostr'];

		// $token = 'rivertown';
		// //print_r($_SERVER);
		// echo $echostr;
		


		echo "success";
	}

	public function getToken(){
		$this->load->library('weixin');

		$token = $this->weixin->getToken();

		echo $token['access_token'];
		echo "<br />";
		echo $token['expires_in'];
	}
}
