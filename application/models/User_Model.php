<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends MY_Model {
	protected $table = 'rs_user';
	protected $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'excel_column' => '', 'comment'=>'主键', 'primary' => TRUE, 'index'=>'primary', 'ddl' => 'int(11)', 'default'=>'', 'extra' => 'AUTO_INCREMENT'),
		array('name'=>'user_login', 'excel_column' => '0', 'comment'=>'用户登录名', 'index' => '', 'ddl' => 'varchar(60)', 'default'=>''),
		array('name'=>'user_pass', 'excel_column' => '1', 'comment'=>'登陆密码', 'index' => '', 'ddl' => 'varchar(255)', 'default'=>''),
		array('name'=>'user_nicename', 'excel_column' => '2', 'comment'=>'用户昵称', 'index' => '', 'ddl' => 'varchar(50)', 'default'=>''),
		array('name'=>'user_email', 'excel_column' => '3', 'comment'=>'邮箱', 'index' => '', 'ddl' => 'varchar(100)', 'default'=>''),
		array('name'=>'user_url', 'excel_column' => '4', 'comment'=>'地址', 'index' => '', 'ddl' => 'varchar(100)', 'default'=>''),
		array('name'=>'user_registered', 'excel_column' => '1', 'comment'=>'注册时间', 'index' => '', 'ddl' => 'datetime', 'default'=>'0000-00-00'),
		array('name'=>'user_status', 'excel_column' => '5', 'comment'=>'状态', 'index' => '', 'ddl' => 'int(11)', 'default'=>''),
		array('name'=>'display_name', 'excel_column' => '0', 'comment'=>'显示名称', 'index' => '', 'ddl' => 'varchar(250)', 'default'=>''),
	);

}

?>

