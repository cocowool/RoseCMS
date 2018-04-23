<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($page = 0, $flag = ''){
		$data = array();
		$rs_view_data = array();

		//加载
		$this->load->model('Question_Model', 'q');
		$option = array();
		$option[] = array('data' =>	'open', 'field' => 'q_status', 'action' => 'where'	);
		$data['question_list'] = $this->q->getAll( $option, $page, $pagesize = 10, 'id', 'desc' );

		// 判断用户是否登陆
		if( $this->session->userdata('rs_user_login') ){
			$data['user_login'] = $this->session->userdata('rs_user_login');
		}else{
			$data['user_login'] = '';
		}

		if(!empty($flag)){
			$this->load->view('main_bt4', $data);
		}else{
			$this->load->view('question_list', $data);		
		}
	}

	public function detail($id = ''){
		$data = array();

		$this->load->model('Question_Model', 'q');
		$option = array();
		$data['question'] = $this->q->getById($id);

		// 判断用户是否登陆
		if( $this->session->userdata('rs_user_login') ){
			$data['user_login'] = $this->session->userdata('rs_user_login');
		}else{
			$data['user_login'] = '';
		}

		$this->load->view('question_detail', $data);
	}
}