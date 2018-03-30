<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin {
	private $ci;
	private $api_domain = 'https://api.weixin.qq.com';

	private $grant_type = '';
	private $appid = '';
	private $secret = '';

	public function __construct(){
		$this->ci = &get_instance();
		//$this->ci->load->library('database');
	}

	public function index(){

	}

	/**
	 * 获取数据库中的配置
	 * @TODO 配置库需要确保存入的 rs_item 名称唯一
	 **/
	private function getConf( $item = '' ){
		$this->ci->load->model('Conf_Model', 'c');
		if(empty($item)){
			return False;
		}

		$result = $this->ci->c->getById($item, $field = 'rs_item');

		if($result){
			return $result['rs_value'];
		}else{
			return False;
		}
	}

	//获取用户Token
    public function getToken(){
    	$this->grant_type = "client_credential";
    	$this->appid = $this->getConf('AppID');
    	$this->secret = $this->getConf('AppSecret');

    	$this->ci->load->library('Curl');
    	$token = $this->ci->curl->simple_get( $this->api_domain . '/cgi-bin/token?grant_type=' . $this->grant_type . '&appid=' . $this->appid . '&secret=' . $this->secret  );

    	$token = json_decode($token, True);
    	if(isset($token['errcode'])){
    		switch ($token['errcode']) {
    			case '-1':
    				echo "系统繁忙，此时请开发者稍候再试";
    				break;
    			case '40001':
    				echo "AppSecret错误或者AppSecret不属于这个公众号，请开发者确认AppSecret的正确性";
    				break;
    			case '40002':
    				echo "请确保grant_type字段值为client_credential";
    				break;
    			case '40164':
    				echo "调用接口的IP地址不在白名单中，请在接口IP白名单中进行设置";
    				break;
    		}
    	}else{
    		return $token;
    	}
    }
}