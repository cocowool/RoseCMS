<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($page = 0){
		$data = array();
		$rs_view_data = array();

		//加载
		$this->load->model('Question_Model', 'q');
		$option = array();
		$option[] = array('data' =>	'open', 'field' => 'q_status', 'action' => 'where'	);
		$data['question_list'] = $this->q->getAll( $option, $page, $pagesize = 10, 'id', 'desc' );

		$this->load->view('question_list', $data);		
	}

}