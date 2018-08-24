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
		$total = $this->q->getTotal();
		$this->load->library('form_validation');

		//处理分页
		$pagesize = 10;
		$this->load->library('pagination');
		$config['base_url'] = '/question/';
		$config['total_rows'] = $total;
		$config['per_page'] = $pagesize;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['suffix'] = '.html';
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['page_links'] = $this->pagination->create_links();

		$option = array();
		$option[] = array('data' =>	'open', 'field' => 'q_status', 'action' => 'where'	);
		$data['question_list'] = $this->q->getAll( $option, $page, $pagesize, 'id', 'desc' );

		// 判断用户是否登陆
		if( $this->session->userdata('rs_user_login') ){
			$data['user_login'] = $this->session->userdata('rs_user_login');
		}else{
			$data['user_login'] = '';
		}
		

		$this->load->view('question_list', $data);		
	}

	public function detail($id = ''){
		$data = array();

		$this->load->library('form_validation');
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