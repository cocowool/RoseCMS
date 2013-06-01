<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('manage/index');
	}
	
	/**
	 * 增加一条新的栏目
	 */
	public function add(){
		$this->load->model('Category_Model','c');
		$this->lang->load('form_validation', 'chinese');
		$config = array(
				array(
						'field'	=>	'goverment',
						'label'	=>	'政府机关',
						'rules'	=>	'trim'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE){
			$data['title']	=	'添加页面';
			//设置不需要用户输入项目
			$invisible = array('insert_time','update_time', 'operation');
			$data['html_form'] = $this->c->get_add_form( 'siteLink', '/manage/category/add', TRUE, $invisible );
			$this->load->view('manage/category/category_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
		
			$result = $this->u->insertMethod( $data );
			if( $result ){
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url;
				$data['content'] = "操作成功，正在跳转";
				$data['timeout'] = 2000;
				$this->load->view('include/sys_msg', $data);
			}else{
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url;
				$data['timeout'] = 2000;
				$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
				$this->load->view('include/sys_msg', $data);
			}
		}		
	}
}