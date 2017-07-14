<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		$data['rs_view_main'] = '';
		$data['rs_view_data'] = array();

		$this->load->view('manage/dashboard', $data);
	}
}