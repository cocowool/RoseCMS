<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {
	private $home_url = '/category/home';
	private $page_title = '栏目管理';
	
	public function __construct(){
		parent::__construct();
		
		$this->home_url = $this->config->item('adm_segment') . $this->home_url;
	}

	public function index($page = 0, $pagesize = 10, $sort = '', $direction = ''){
		$this->load->model('Category_Model','c');
		header('Content-type:text/html;charset=utf-8');
		
		$option = array();
		if( !empty($_GET['insert_time']) ){
			$insert_time = $_GET['insert_time'];
			$option[] = array( 'data' => $insert_time, 'field' => 'insert_time >=', 'action' => 'where' );
			$option[] = array( 'data' => date('Y-m-d', strtotime($insert_time)+86400), 'field' => 'insert_time <=', 'action' => 'where' );
		}
		
		$total = $this->c->getTotal( $option );
		//做一下Page的转换，这里使用的起始位置
		$page = ( $page - 1 ) * $pagesize;
		$result = $this->c->getAll( $option, $page, $pagesize, $sort, $direction);
		//向结果中附加Operation的链接
		foreach ($result as $k=>$v){
			$v['operation'] = '<a href="' . base_url( $this->config->item('adm_segment') . '/category/edit/'.$v['id']) . '">修改</a>
			<a href="' . base_url($this->config->item('adm_segment') . '/category/del/'.$v['id']) . '">删除</a>';
			$result[$k]	= $v;
		}
		
		echo json_encode( array('mydata'=> $result, 'totalItems' => $total, 'itemsPerPage' => $pagesize, 'itemIndexStart' => $page ) );
	}
	
	public function home(){
		$this->load->model('Category_Model','c');
		
		$data = array();
		$data['column'] = $this->c->getColumn();
		$data['tblTitle'] = '网站栏目列表';
		$data['page_title'] = $this->page_title;
		
		$this->load->view('manage/category/category_list', $data);
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
			$invisible = array('create_at','update_at', 'operation');
			$data['html_form'] = $this->c->get_add_form( 'siteCategory',  $this->config->item('adm_segment') . '/category/add', TRUE, $invisible );
			$this->load->view('manage/category/category_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
		
			$result = $this->c->insertMethod( $data );
			if( $result ){
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url;
				$data['content'] = "操作成功，正在跳转";
				$data['timeout'] = 2000;
				$this->load->view('manage/include/sys_msg', $data);
			}else{
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url;
				$data['timeout'] = 2000;
				$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
				$this->load->view('manage/include/sys_msg', $data);
			}
		}		
	}

	/**
	 * 更新内容
	 *
	 * @param int $id
	 */
	public function edit( $id ){
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
	
		$result = $this->c->getById($id);
		if( !$result ){
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['timeout'] = 2000;
			$data['content'] = "<p style='color:red; font-weight:bold;'>请求修改的数据不存在</p>";
			$this->load->view('manage/include/sys_msg', $data);
		}else{
			$data['result'] = $result;
		}
	
		if($this->form_validation->run() == FALSE){
			$data['title']	=	'修改页面';
			//设置不需要用户输入项目
			$invisible = array('insert_time','update_time','operation');
			$data['html_form'] = $this->c->get_edit_form( $result, 'siteCategory', $this->config->item('adm_segment') . '/category/edit/'.$id, TRUE, $invisible );
	
			$this->load->view('manage/category/category_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
	
			$result = $this->c->updateMethod( $data, $id );
			if( $result ){
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url;
				$data['content'] = "操作成功，正在跳转";
				$data['timeout'] = 2000;
				$this->load->view('manage/include/sys_msg', $data);
			}else{
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url;
				$data['timeout'] = 2000;
				$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
				$this->load->view('manage/include/sys_msg', $data);
			}
		}
	}	
	
	/**
	 * 内容的删除方法
	 * @param int $id
	 */
	public function del($id){
		$this->load->model('Category_Model','c');
		$result = $this->c->getById($id);
		if( !$result ){
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['timeout'] = 6000;
			$data['content'] = "<p style='color:red; font-weight:bold;'>请求修改的数据不存在</p>";
			$this->load->view('manage/include/sys_msg', $data);
		}else{
			$data['result'] = $result;
		}
	
		$result = $this->c->deleteMethod($id);
		if( $result ){
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['content'] = "操作成功，正在跳转";
			$data['timeout'] = 6000;
			$this->load->view('include/sys_msg', $data);
		}else{
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['timeout'] = 6000;
			$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
			$this->load->view('manage/include/sys_msg', $data);
		}
	}	
}