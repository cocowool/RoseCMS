<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($version = '')
	{
		$this->load->library('form_validation');
		$this->load->model('Post_Model', 'p');
		$condition = array();
		$condition[] = array('data'	=> 'open', 'field' => 'post_status', 'action' => 'where'	);
		$condition[] = array('data'	=> 'post', 'field' => 'post_type', 'action' => 'where'	);
		$data['article_list'] = $this->p->getAll($condition, 0, 10, 'id', 'desc');

		$this->load->model('Meta_Model', 'm');

		foreach ($data['article_list'] as $key => $value) {

			$option = array();
			$option[] = array('data' =>	'thumbnail_id', 'field' => 'meta_key', 'action' => 'where'	);
			$option[] = array('data' =>	$value['id'], 'field' => 'post_id', 'action' => 'where'	);
			$thumb_meta = $this->m->getAll($option);

			// print_r($thumb_meta);
			$thumb_detail = '';
			if(count($thumb_meta) == 1){
				$data['article_list'][$key]['article'] = $value;
				$data['article_list'][$key]['thumbnail'] = $this->p->getById($thumb_meta[0]['meta_value']);
			}else{
				$data['article_list'][$key]['article'] = $value;
				$data['article_list'][$key]['thumbnail'] = '';
			}
			# code...
		}

		// 判断用户是否登陆
		if( $this->session->userdata('rs_user_login') ){
			$data['user_login'] = $this->session->userdata('rs_user_login');
		}else{
			$data['user_login'] = '';
		}

		if(!empty($version)){
			$this->load->view('main_bt4', $data);
		}else{
			$this->load->view('main', $data);
		}
	}

	public function about(){
		
	}

	public function article($id = ''){
		$data = array();
		
		$this->load->view('detail', $data);
	}
}
