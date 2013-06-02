<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户管理
 * 
 * @author shiqiang
 *
 */

class Sys extends MY_Controller {
	private $home_url = '/manage/sys/home';
	
	function __construct() {
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

	public function version(){
		$this->load->view('manage/version');
	}
}