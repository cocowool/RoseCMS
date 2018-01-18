<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();

		$data['rs_view_main'] = 'manage/question/question_list';
		$data['rs_view_data'] = '';

		$this->load->view('manage/dashboard', $data);
	}

	//响应DataTable请求
	public function serverside(){

	}

	//新增试题
	public function add(){
		$data = array();

		$data['rs_view_main'] = 'manage/question/question_edit';
		$data['rs_view_data'] = '';
		$this->load->view('manage/dashboard', $data);
	}
}