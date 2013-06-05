<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 系统自定义控制器类
 *
 * @author	shiqiang<cocowool@gmail.com
 * @version	$Id: MY_Controller.php 8 2012-06-13 09:05:29Z cocowool@gmail.com $
 **/
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		if( $this->isBackend() ){
			$this->backendSessionCheck();
		}
	}
	
	public function _remap( $method, $params = array() ){
		if( method_exists($this, $method) ){
			return call_user_func_array(array($this,$method), $params);
		}else{
			array_push($params, $method);
			return call_user_func_array(array($this,'index'), $params);
		}
	}
	
	protected function backendSessionCheck(){
		if( !$this->session->userdata( $this->config->item('adm_sess_username') ) ){
			redirect( $this->config->item('adm_segment') . '/auth/login');
		}		
	}

	public function isBackend(){
		if( $this->uri->segment(1) == $this->config->item('adm_segment') && $this->uri->segment(2) != $this->config->item('adm_login_segment') ){
			return TRUE;
		}
		
		return FALSE;
	}

	public function checkAdminLogin(){
		if( !$this->session->userdata('adminLogin') ){
			redirect('/manage/auth/login');
		}
	}
	
	public function checkUserLogin(){
		
	}
}
?>
