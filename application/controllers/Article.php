<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function _remap($method, $params = array() ){

        if (method_exists($this, $method)){
                return call_user_func_array(array($this, $method), $params);
        }else{
        	return call_user_func_array(array($this,'index'), array($method));
        }
	}

	public function index( $id = '' ){
		if(empty($id)){
			show_404('访问的网页不存在');
		}

		$this->load->model('Post_Model', 'p');
		$data = $this->p->getById($id);

		$this->load->view('detail', $data);
	}

}
