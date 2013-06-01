<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	function _remap( $method, $params = array() ){
		if( method_exists($this, $method) ){
			return call_user_func_array(array($this,$method), $params);
		}else{
			array_push($params, $method);
			return call_user_func_array(array($this,'index'), $params);
		}
	}
	
	public function index(){
		$this->load->view('manage/main');
	}
	
	public function top(){
		$this->config->load('sysconfig');
		$data["username"] = $this->session->userdata('admUsername');
	
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		$time = time();
		$data["nowtime"] = mdate($datestring, $time);
		$data['sys_title']	=	$this->config->item('sys_title');
	
		$this->load->view('manage/top',$data);
	}
	
	public function menu(){
		//		$data['userlevel'] = $this->session->userdata('userlevel');
		$data['userlevel'] = '999';
		
		$this->load->view('manage/menu',$data);
	}
	
	public function bottom(){
		$this->load->view('manage/bottom');
	}

	public function bar(){
		$this->load->view('manage/bar');
	}
}