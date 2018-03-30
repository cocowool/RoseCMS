<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conf extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();

		$this->load->model('Question_Model','q');
		$q_data['questions'] = $this->q->getAll();

		//print_r($questions);

		$data['rs_view_main'] = 'manage/conf/conf_list';
		$data['rs_view_data'] = $q_data;

		$this->load->view('manage/dashboard', $data);
	}

	//响应DataTable请求
	public function serverside(){
		$request = $this->input->post();

		$this->load->model('Conf_Model','c');
		$confs = $this->c->dtRequest($request);

		foreach ($confs['data'] as $key => $value) {
			$value['operation'] =  '<a href="/manage/conf/add/' . $value['id'] . '">编辑</a>&nbsp;&nbsp;<a href="/manage/conf/del/' . $value['id'] . '">删除</a>';

			$confs['data'][$key] = $value;
		}

		echo json_encode($confs);
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
		$this->load->model('Conf_Model', 'c');
		$validations = $this->c->getFormValidation();
		//print_r($validations);

		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);		

		$question = array();

		if($this->form_validation->run() == FALSE){
			//$userinfo = $this->u->getById($data['userid']);
			//$data['userinfo'] = $userinfo;
			//$this->e->setFieldParameter('position', array($userinfo['group'], $userinfo['position'], $userinfo['department']));

			$data['html_form'] = $this->generate_add_form($this->c, 'manage/conf/add');
			$data['rs_view_form'] = 'manage/common/data_add';
			$data['rs_view_data']['conf'] = '';

			$this->load->view('manage/dashboard', $data);
		}else{
			$post_data = $this->input->post(NULL, true);
			$this->load->helper('date');

			$save_data = $post_data;
			$save_data['insert_time'] = unix_to_human( time(), TRUE, 'eu');
			$save_data['update_time'] = unix_to_human( time(), TRUE, 'eu');
			$save_data['rs_user'] = 1;

			$result = $this->c->insert( $save_data );

			if($result){
				redirect('/manage/conf','auto');				
			}
		}
	}
}