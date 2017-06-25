<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		$rs_view_data = array();

		$data['rs_view_main'] = 'manage/article/article_edit';
		$data['rs_view_data'] = $rs_view_data;

		$this->load->view('manage/dashboard', $data);
	}
}