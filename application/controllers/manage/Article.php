<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($page = 0){
		$data = array();
		$rs_view_data = array();

		//加载
		$this->load->model('Post_Model', 'p');
		$option = array();
		$option[] = array('data' =>	'post', 'field' => 'post_type', 'action' => 'where'	);
		$article_list = $this->p->getAll( $option );
		$rs_view_data['articles'] = $article_list;

		$data['rs_view_main'] = 'manage/article/article_list';
		$data['rs_view_data'] = $rs_view_data;

		$this->load->view('manage/dashboard', $data);
	}

	// 新增文章
	public function add( $id = '' ){
		$validations = array();
		//加载Model中的验证规则
		$this->load->model('Post_Model', 'p');
		$validations = $this->p->getFormValidation();

		$this->load->library('form_validation');
		// print_r($validations);
		$this->form_validation->set_rules($validations);

		$article = array();
		if(empty($id)){
			//检查是否有草稿状态，post_name为空的文章，没有则新建
			$option = array();
			$option[] = array('data' =>	'post', 'field' => 'post_type', 'action' => 'where'	);
			$option[] = array('data' =>	'draft', 'field' => 'post_status', 'action' => 'where'	);
			$option[] = array('data' =>	'', 'field' => 'post_name', 'action' => 'where'	);
			$data = $this->p->getAll($option);
			//var_dump($data); echo "<br />";

			if( empty($data) ){
				$article = array();
				$article['post_author'] = 1;
				$article['post_status'] = 'draft';
				$article['post_type'] = 'post';

				$result = $this->p->insert($article);
				//echo $this->db->last_query(); echo "<br />";
				//var_dump($result); echo "<br />";

				$article['id'] = $result;
			}else{
				$article = $data[0];
			}

			redirect('/manage/article/add/' . $article['id'],'auto');		
		}else{
			$article = $this->p->getById($id);

			//获取文章的焦点图
			$this->load->model('Meta_Model', 'm');
			$option = array();
			$option[] = array('data' =>	'thumbnail_id', 'field' => 'meta_key', 'action' => 'where'	);
			$option[] = array('data' =>	$id, 'field' => 'post_id', 'action' => 'where'	);
			$thumb_meta = $this->m->getAll($option);

			// print_r($thumb_meta);
			$thumb_detail = '';
			if(count($thumb_meta) == 1){
				$thumb_detail = $this->p->getById($thumb_meta[0]['meta_value']);
			}
			//print_r($thumb_data);
			//print_r($thumb_detail);

			if(!$article){
				return false;
			}
		}

		//print_r($article);
		if($this->form_validation->run() == FALSE){
			$data['rs_view_main'] = 'manage/article/article_edit';
			$data['rs_view_data']['article'] = $article;
			$data['rs_view_data']['thumb_detail'] = $thumb_detail;
			$data['rs_view_data']['thumb_meta'] = $thumb_meta;

			$this->load->view('manage/dashboard', $data);
		}else{
			$post_data = $this->input->post(NULL, true);
			$this->load->helper('date');

			if( $post_data['post_id'] ){
				$save_data = $post_data;

				switch ($post_data['post_action']) {
					case 'savedraft':
						$save_data['post_status'] = 'draft';
						break;
					case 'publish':
						$save_data['post_status'] = 'open';
						break;
				}

				$save_data['post_date'] = unix_to_human( time(), TRUE, 'eu');
				$save_date['post_modified'] = unix_to_human( time(), TRUE, 'eu');
				$save_data['post_author'] = 1;

				$result = $this->p->update( $save_data, $post_data['post_id'] );

				if($result){
					redirect('/manage/article/add/' . $id,'auto');				
				}
			}else{

			}
		}
	}
}