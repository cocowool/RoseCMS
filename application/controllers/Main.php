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
	public function index()
	{
		$this->load->model('Post_Model', 'p');
		$condition = array();
		$condition[] = array('data'	=> 'open', 'field' => 'post_status', 'action' => 'where'	);
		$condition[] = array('data'	=> 'post', 'field' => 'post_type', 'action' => 'where'	);
		$data['article_list'] = $this->p->getAll($condition, 0, 10, 'id', 'desc');

		$this->load->view('main', $data);
	}

	public function article($id = ''){
		$data = array();
		
		$this->load->view('detail', $data);
	}
}
