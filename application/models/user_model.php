<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sheet 5
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class User_Model extends MY_Model {
	protected $table = 'r_user';
	protected $id	=	'id';
	protected $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
		array('name'=>'brand', 'comment'=>'品牌商序号'),
		array('name'=>'username', 'comment'=>'用户名'),	
		array('name'=>'password', 'comment'=>'密码'),	
		array('name'=>'cnname', 'comment'=>'姓名'),
		array('name'=>'gender', 'comment'=>'性别'),
		array('name'=>'mobile', 'comment'=>'手机'),
		array('name'=>'birthday', 'comment'=>'出生日期'),
		array('name'=>'carcity', 'comment'=>'上牌城市'),
		array('name'=>'address', 'comment'=>'邮寄地址'),
		array('name'=>'postcode', 'comment'=>'邮政编码'),
		array('name'=>'whentobuy', 'comment'=>'计划何时购买'),
		array('name'=>'edm', 'comment'=>'是否接收资讯', 'invisible' => TRUE),
		array('name'=>'contactable', 'comment'=>'是否愿意'),
		array('name'=>'status', 'comment'=>'状态'),	
		array('name'=>'insert_time', 'comment'=>'创建时间'),	
		array('name'=>'update_time', 'comment'=>'更新时间', 'invisible' => TRUE ),	
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();
	}
	
}