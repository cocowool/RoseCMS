<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		$data = array();
		$validations = array();

		$this->load->model('User_Model', 'u');
		$validations = $this->u->getFormValidation();
		$this->load->library('form_validation');

		$validations = array(
			array( 'field' => 'user_login', 'label' => '登陆账号', 'rules'	=>	'trim|required|min_length[5]|max_length[12]|is_unique[rs_user.user_login]'),
			array( 'field' => 'user_pass', 'label' => '登陆密码', 'rules'	=>	'trim|required'),
			array( 'field' => 'chkPassword', 'label' => '验证密码', 'rules'	=>	'trim|required|matches[user_pass]'),
			array( 'field' => 'user_email', 'label' => '用户邮箱', 'rules'	=>	'trim|required|valid_email'),
			array( 'field' => 'user_phone', 'label' => '手机号码', 'rules'	=>	'trim|required'),
		);

		$this->form_validation->set_rules($validations);		

		//print_r($validations);die;

		$user = array();
		if($this->form_validation->run() == FALSE){

			$this->load->view('register', $data);
		}else{
			$post_data = $this->input->post();

			$result = $this->u->insert($post_data);
			if($result){
				$data['result'] = 'success';
				$data['message'] = '恭喜您完成注册，马上登陆看一下吧。';
			}else{
				$data['result'] = 'failure';
				$data['message'] = '非常抱歉，您的注册请求没有能够被正确处理，请联系管理员进行处理。';
			}

			$this->load->view('tip', $data);
		}
	}
}
