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
	}
	
	private function backendSessionCheck(){
		if( !$this->session->userdata( $this->config->item('adm_sess_username') ) ){
			echo 'Test <br />';
			redirect( $this->config->item('adm_segment') . '/auth/login');
		}		
	}

	public function isBackend(){
		echo $this->uri->segment(1);
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
