<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();

		$this->load->view('manage/dashboard', $data);
	}

}