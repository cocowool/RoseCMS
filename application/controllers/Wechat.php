<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat extends CI_Controller {
	private $api_domain = 'https://api.weixin.qq.com';

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
	public function index(){
		$this->load->library('xmlrpc');
		$this->load->library('xmlrpcs');

		$get_data = $this->input->get(NULL, true);
		$post_data = $this->input->post(NULL, true);

		// 如果获取到 echostr 参数，则表示接口验证
		// if(isset($get_data['echostr'])){
		// 	//echo "Hello, empty message!";
		// 	服务器端验证代码
		// 	$signature = $data['signature'];
		// 	$timestamp = $data['timestamp'];
		// 	$nonce = $data['nonce'];
		// 	$echostr = $data['echostr'];

		// 	$token = 'rivertown';
		// 	//print_r($_SERVER);
		// 	echo $echostr;
		// 	return;
		// }

		// if(!empty($post_data)){
			$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
			$post_obj = simplexml_load_string($HTTP_RAW_POST_DATA, 'SimpleXMLElement', LIBXML_NOCDATA);

			$msg_type = $post_obj->MsgType;

			switch ($msg_type) {
				case 'text':
					$keyword = trim($post_obj->Content);
					$msg_tpl = '<xml> <ToUserName>< ![CDATA[%s] ]></ToUserName> <FromUserName>< ![CDATA[%s] ]></FromUserName> <CreateTime>%s</CreateTime> <MsgType>< ![CDATA[text] ]></MsgType> <Content>< ![CDATA[%s] ]></Content> </xml>';
					$result =  sprintf($msg_tpl,$post_obj->FromUserName, $post_obj->ToUserName, time(), '欢迎访问大江小浪!');
					echo $result;
					return;
					break;
				
				default:
					# code...
					break;
			}
		// }
	}

	public function getToken(){
		$this->load->library('weixin');

		$token = $this->weixin->getToken();

		echo $token['access_token'];
		echo "<br />";
		echo $token['expires_in'];
	}
}
