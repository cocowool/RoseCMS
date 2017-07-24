<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {
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

	public function index(){
		$config['upload_path'] = 'data/' . date('Ymd', time());
		$config['file_name'] = 'drill_' . $data['group'] . '_' . $data['position'] . '_' . time();
        $config['allowed_types'] = 	'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_height'] = 0;
        $config['max_width'] = 0;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			print_r($this->upload->display_errors());
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}else{
			$upload_data = $this->upload->data();
			print_r($upload_data);
		}
	}

}
