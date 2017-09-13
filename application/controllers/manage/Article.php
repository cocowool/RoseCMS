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
	public function add( $id = '' ){
		$validations = array();
		//加载Model中的验证规则
		$this->load->model('Post_Model', 'p');
		$validations = $this->p->getFormValidation();

		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);

		$article = array();
		if(empty($id)){
			//检查是否有草稿状态，post_name为空的文章，没有则新建
			$option = array();
			$option[] = array('data' =>	'post', 'field' => 'post_type', 'action' => 'where'	);
			$option[] = array('data' =>	'draft', 'field' => 'post_status', 'action' => 'where'	);
			$option[] = array('data' =>	'', 'field' => 'post_name', 'action' => 'where'	);
			$data = $this->p->getAll($option);

			var_dump($data);

			if( empty($data) ){
				$article = array();
				$article['post_status'] = 'draft';
				$article['post_type'] = 'post';

				$result = $this->p->insert($data);
				var_dump($result);
				$article['id'] = $result;
			}else{
				$article = $data[0];
			}
		}else{
			$article = $this->p->getById($id);
			if(!$article){
				return false;
			}
		}

		print_r($article);

		if($this->form_validation->run() == FALSE){
			$data['rs_view_main'] = 'manage/article/article_edit';
			$data['rs_view_data']['article'] = $article;

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