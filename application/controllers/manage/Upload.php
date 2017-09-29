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
		$config['upload_path'] = 'upload/' . date('Ymd', time());
		//if(!is_dir($config['upload_path']))	mkdir($config['upload_path'], 0777);
		$config['file_name'] = 'userupload_' . time();
        $config['allowed_types'] = 	'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_height'] = 0;
        $config['max_width'] = 0;

		$this->load->library('upload', $config);
		if(!$this->upload->sae_upload('file', 'thumbnail', $s)){
			print_r($this->upload->display_errors());
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}else{
			$post_data = $this->input->post();
			$upload_data = $this->upload->data();
			$this->load->helper('date');

			//Save data to post
			$this->load->model('Post_Model', 'p');
			$data = array();
			$data['post_author'] = $post_data['post_author'];
			$data['post_date'] = unix_to_human( time(), TRUE, 'eu');
			$data['post_content'] = $upload_data[''];
			$data['post_title'] = $upload_data['client_name'];
			$data['post_name'] = strtolower($upload_data['raw_name']);
			$data['guid'] = $upload_data['sae_uri'];
			$data['psot_type'] = 'thumbnail';
			$result = $this->p->insert($data);
			if($result){
				//Save Meta Data
				//Meta 中记录三份信息（三条记录），文件ID，文件名称，文件属性
				$this->load->model('Meta_Model', 'm');

				$data = array();
				$data['post_author'] = $post_data['post_author'];
				$data['post_id'] = $post_data['post_id'];
				$data['meta_key'] = 'thumbnail_id';
				$data['meta_value'] = $result['id'];

				$m_result = $this->m->insert($data);				
				if( ! $m_result ){
					echo '<h1>Meta Insert Error</h1>';
				}else{
					$response = array('code' => '200', 'message' => 'Thumbnail Upload Success');
					echo json_encode($response);
				}
			}

			// print_r($upload_data);
			// print_r($post_data);
		}
	}

}
