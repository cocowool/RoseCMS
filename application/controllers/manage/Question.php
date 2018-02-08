<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();

		$this->load->model('Question_Model','q');
		$q_data['questions'] = $this->q->getAll();

		//print_r($questions);

		$data['rs_view_main'] = 'manage/question/question_list';
		$data['rs_view_data'] = $q_data;

		$this->load->view('manage/dashboard', $data);
	}

	//响应DataTable请求
	public function serverside(){
		$request = $this->input->post();

		$this->load->model('Question_Model','q');
		$questions = $this->q->dtRequest($request);

		foreach ($questions['data'] as $key => $value) {
			$value['operation'] =  '<a href="/manage/question/add/' . $value['id'] . '">编辑</a>&nbsp;&nbsp;<a href="/manage/question/del/' . $value['id'] . '">删除</a>';
			$questions['data'][$key] = $value;
		}

		echo json_encode($questions);
	}

	/**
	 * 删除试题
	 **/
	public function del($id = ''){
		if(empty($id)){
			echo "错误的ID";
		}

		$this->load->model('Question_Model','q');
		$result = $this->q->delete($id);

		if($result){
			echo "Delete Success";
		}else{
			echo "Delete Failed";
		}
	}

	//新增试题
	public function add( $id = '' ){
		$data = array();
		$validations = array();

		//加载Model中的验证规则
		$this->load->model('Question_Model', 'q');
		$validations = $this->q->getFormValidation();
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);		

		$question = array();
		if(empty($id)){
			//检查是否有草稿状态，post_name为空的文章，没有则新建
			$option = array();
			$option[] = array('data' =>	'draft', 'field' => 'q_status', 'action' => 'where'	);
			$data = $this->q->getAll($option);
			//var_dump($data); echo "<br />";

			if( empty($data) ){
				$question['q_author'] = 1;
				$question['q_status'] = 'draft';
				$question['q_insert_time'] = unix_to_human( time(), TRUE, 'eu');

				$result = $this->q->insert($question);
				//echo $this->db->last_query(); echo "<br />";
				//var_dump($result); echo "<br />";

				$question['id'] = $result;
			}else{
				$question = $data[0];
			}

			//print_r($question);
			redirect('/manage/question/add/' . $question['id'],'auto');		
		}else{
			$question = $this->q->getById($id);

			if(!$question){
				return false;
			}
		}

		//print_r($article);
		if($this->form_validation->run() == FALSE){
			$data['rs_view_main'] = 'manage/question/question_edit';
			$data['rs_view_data']['question'] = $question;

			$this->load->view('manage/dashboard', $data);
		}else{
			$post_data = $this->input->post(NULL, true);
			$this->load->helper('date');

			if( $post_data['q_id'] ){
				$save_data = $post_data;

				switch ($post_data['post_action']) {
					case 'savedraft':
						$save_data['q_status'] = 'draft';
						break;
					case 'publish':
						$save_data['q_status'] = 'open';
						break;
				}

				$save_data['q_update_time'] = unix_to_human( time(), TRUE, 'eu');
				$save_data['q_author'] = 1;

				$result = $this->q->update( $save_data, $post_data['q_id'] );

				if($result){
					redirect('/manage/question/add/' . $id,'auto');				
				}
			}else{

			}
		}
	}
}