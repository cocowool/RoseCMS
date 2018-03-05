<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
