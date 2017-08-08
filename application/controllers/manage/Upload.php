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

		//Sina Storage
		$access_key = "corpuscloud:5zj3405013";
		$secret_key = "0j5xylxkh4h52h242hj0jhm44xzlyll3025iw2wm";

		$s = new sinacloud\sae\Storage($access_key, $secret_key);
		$s->listBuckets();
		var_dump($s);

		$config['upload_path'] = 'upload/' . date('Ymd', time());
		//if(!is_dir($config['upload_path']))	mkdir($config['upload_path'], 0777);
		//$config['file_name'] = 'drill_' . $data['group'] . '_' . $data['position'] . '_' . time();
        $config['allowed_types'] = 	'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_height'] = 0;
        $config['max_width'] = 0;

		$this->load->library('upload', $config);
		if(!$this->upload->sae_upload('file', 'thumbnail', $s)){
			print_r($this->upload->display_errors());
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}else{
			// $request_data = $this->input->request();
			// print_r($request_data);

			//Save data to post
			$this->load->model('Post_Model', 'p');

			$post_data = $this->input->post();
			$upload_data = $this->upload->data();
			print_r($upload_data);
			print_r($post_data);
		}
	}

}
