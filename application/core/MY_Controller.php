<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  公共Controller
 *
 */
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		if( $this->uri->segment(2) != 'login' and  $this->uri->segment(1) == 'manage'){
			$this->backendAuthCheck();
		}
	}

	public function _remap( $method, $params = array() ){
		if( method_exists($this, $method) ){
			return call_user_func_array(array($this,$method), $params);
		}else{
			$merge_params = array($method);
			foreach ($params as $key => $value) {
				array_push($merge_params, $value);
			}
			return call_user_func_array(array($this,'index'), $merge_params);
		}
	}

	public function backendAuthCheck(){
		if( !$this->session->userdata('rs_user_login') ){
			redirect('/manage/login');
		}

		return TRUE;
	}

}