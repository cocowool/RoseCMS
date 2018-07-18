<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	/**
	 * 处理JSON登录请求
	 * 
	 */
	public function json(){
		$post_data = $this->input->post();
		$response_msg = array('status' => '', 'msg' => '', 'error' => '', 'data' => '');

		$this->load->model("User_Model", "u");
		if( $this->u->check_user($post_data['username'], $post_data['password'])){
			$userinfo = $this->u->getById($post_data['username'], 'user_login');
			$this->session->set_userdata( 'rs_user_login', $userinfo['user_login']);
			$this->session->set_userdata( 'rs_user_nicename', $userinfo['user_nicename']);

			$response_msg['status'] = '200';
			$response_msg['msg']	=	'用户验证成功';
			$response_msg['data']	=	$userinfo;

			echo json_encode($response_msg);
		}else{
			$response_msg['status'] = '500';
			$response_msg['error']	=	'RS-001';
			$response_msg['msg']	=	'用户登录失败';

			echo json_encode($response_msg);
		}		
	}

	/**
	 * 获取用户的登陆状态
	 */
	public function get_status(){
		$post_data = $this->input->post();
		if($this->session->userdata('rs_user_login')){
			//
		}
	}

	public function index()
	{
		$validation_rules = array(
			array(
				'field'	=>	'username',
				'label'	=>	'用户名',
				'rules'	=>	'trim|required'
			),
			array(
				'field'	=>	'password',
				'label'	=>	'密码',
				'rules'	=>	'trim|required',
			),
		);
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules($validation_rules);
		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}else{
			$post_data = $this->input->post();

			$this->load->model("User_Model", "u");
			if( $this->u->check_user($post_data['username'], $post_data['password'])){
				$userinfo = $this->u->getById($post_data['username'], 'user_login');
				$this->session->set_userdata( 'rs_user_login', $userinfo['user_login']);

				//验证完成后跳转到管理后台
				$this->load->helper('url');
				redirect('/');
			}else{
				echo "Login Failed!";
			}
		}
	}
}
