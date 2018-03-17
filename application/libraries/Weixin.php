<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin {
	private $grant_type = '';
	private $appid = '';
	private $secret = '';

	public function index(){

	}

	//获取用户Token
    public function getToken(){
    	echo "Token";
    }
}