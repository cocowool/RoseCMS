<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		echo 'QRcode Generate.';
		//$this->load->view('manage/index');
	}
}