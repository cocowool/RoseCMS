<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// $data = array();
		// $rs_view_data = array();

		// $data['rs_view_main'] = 'manage/article/article_edit';
		// $data['rs_view_data'] = $rs_view_data;

		// $this->load->view('manage/dashboard', $data);

		redirect('/manage/article/add');
	}

	// 新增文章
	public function add(){
		$validations = array();
		//加载Model中的验证规则
		$this->load->model('Post_Model', 'p');
		$validations = $this->p->getFormValidation();

		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);

		if($this->form_validation->run() == FALSE){
			$data = array();
			$rs_view_data = array();

			//echo validation_errors();
			//echo xxx;

			$data['rs_view_main'] = 'manage/article/article_edit';
			$data['rs_view_data'] = $rs_view_data;

			$this->load->view('manage/dashboard', $data);
		}else{
			$post_data = $this->input->post(NULL, true);
			$this->load->helper('date');

			$save_data = $post_data;
			$save_data['post_date'] = unix_to_human( time(), TRUE, 'eu');
			$save_data['post_author'] = 1;
			$result = $this->p->insert( $save_data );

			if($result){
				redirect('/manage/article/add','auto');				
			}
		}
	}
}