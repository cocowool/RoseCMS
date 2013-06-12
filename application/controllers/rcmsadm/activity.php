<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 文章管理后台控制器
 * 
 * @author shiqiang
 *
 */
class Activity extends MY_Controller {
	private $home_url = '/activity/home';
	private $segment = 'activity';
	private $page_title = '活动管理';
	private $invisible_items = array('create_at','update_at','operation', 'status');
	private $form_validate = array(
		array(
			'field'	=>	'actname',
			'label'	=>	'活动名称',
			'rules'	=>	'trim|required'
		)
	);
	//@todo extract some parameters from code
	private $edit_template = '';
	private $list_template = '';
	private $form_name = '';
	
	public function __construct(){
		parent::__construct();

		$this->home_url = $this->config->item('adm_segment') . $this->home_url;
	}

	public function index($page = 0, $pagesize = 10, $sort = '', $direction = ''){
		$this->load->model('Activity_Model','a');
		header('Content-type:text/html;charset=utf-8');
		
		$option = array();
		$total = $this->a->getTotal( $option );
		//做一下Page的转换，这里使用的起始位置
		$page = ( $page - 1 ) * $pagesize;
		$result = $this->a->getAll( $option, $page, $pagesize, $sort, $direction);
		
		$category = $this->c->get_all_category();
		
		//向结果中附加Operation的链接
		//附加资源的链接
		foreach ($result as $k=>$v){
			$v['operation'] = '<a href="' . base_url( $this->config->item('adm_segment') . '/' . $this->segment . '/edit/'.$v['id']) . '">修改</a>
			<a href="' . base_url($this->config->item('adm_segment') . '/' . $this->segment . '/del/'.$v['id']) . '">删除</a>';
			$v['create_at'] = date('Y-m-d', strtotime($v['create_at']) );
			$v['resource'] = '<a href="' . base_url($this->config->item('adm_segment')) .'/'.'/resource/home/'.$v['id']. '">资源列表</a>';
			$result[$k]	= $v;
		}
		
		echo json_encode( array('mydata'=> $result, 'totalItems' => $total, 'itemsPerPage' => $pagesize, 'itemIndexStart' => $page ) );
	}
	
	public function home(){
		$this->load->model('Activity_Model','a');
		
		$data = array();
		$data['column'] = $this->a->getColumn();
		$data['tblTitle'] = '活动列表';
		$data['page_title'] = $this->page_title;
		
		$this->load->view('manage/activity/activity_list', $data);
	}
	
	/**
	 * 增加一条新的栏目
	 */
	public function add(){
		$this->load->model('Activity_Model','a');
		$this->lang->load('form_validation', 'chinese');
		$config = $this->form_validate;
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE){
			$data['title']	=	'添加页面';
			//设置不需要用户输入项目
			$invisible = $this->invisible_items;
			$data['html_form'] = $this->a->get_add_form( 'siteActivity',  $this->config->item('adm_segment') . '/' . $this->segment . '/add', TRUE, $invisible );
			$this->load->view('manage/activity/activity_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
		
			$result = $this->a->insertMethod( $data );
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
		$this->load->model('Activity_Model','a');
		$this->lang->load('form_validation', 'chinese');
		$config = $this->form_validate;
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
	
		$result = $this->a->getById($id);
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
			$invisible = $this->invisible_items;
			$data['html_form'] = $this->a->get_edit_form( $result, 'siteActivity', $this->config->item('adm_segment') . '/' . $this->segment . '/edit/'.$id, TRUE, $invisible );
	
			$this->load->view('manage/activity/activity_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
	
			$result = $this->a->updateMethod( $data, $id );
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
		$this->load->model('Activity_Model','a');
		$result = $this->a->getById($id);
		if( !$result ){
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['timeout'] = 6000;
			$data['content'] = "<p style='color:red; font-weight:bold;'>请求修改的数据不存在</p>";
			$this->load->view('manage/include/sys_msg', $data);
		}else{
			$data['result'] = $result;
		}
	
		$result = $this->a->deleteMethod($id);
		if( $result ){
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['content'] = "操作成功，正在跳转";
			$data['timeout'] = 6000;
			$this->load->view('manage/include/sys_msg', $data);
		}else{
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url;
			$data['timeout'] = 6000;
			$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
			$this->load->view('manage/include/sys_msg', $data);
		}
	}	
}