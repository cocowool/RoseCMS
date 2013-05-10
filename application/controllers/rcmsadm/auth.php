<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		echo "Test";

		return;
	}

	public function login(){

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		
		if( !$username || !$password ){
			$this->load->view('manage/auth/login');
		}else{
			$this->load->model('User_model', 'u');
			$userinfo = $this->u->getById($username, 'username');
			if( $userinfo && $userinfo['password'] == $password ){
				$this->session->set_userdata('admUsername', $username);
				$this->session->set_userdata('admId', $userinfo['id']);
				$this->session->set_userdata('adminLogin', 2);
				
				redirect('/manage/main');
				return TRUE;
			}else if( $username == $this->config->item('admin_user') && $password == $this->config->item('admin_pass') ){
				$this->session->set_userdata('admUsername', $username);
				$this->session->set_userdata('admId', '9999');
				$this->session->set_userdata('adminLogin', 1);
				
				redirect('/manage/main');
				return TRUE;
			}
			
			redirect('/manage/auth/login');
			return FALSE;
		}
	}
}