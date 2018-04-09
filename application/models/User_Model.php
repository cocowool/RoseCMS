<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends MY_Model {
	protected $table = 'rs_user';
	protected $id	=	'id';
	public $fields = array(
		array(
			'name'=>'id', 
			'comment' => 'ID',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'int(11)',
					'primary'	=>	TRUE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'AUTO_INCREMENT',
					'index'		=>	'primary',
					'comment'	=>	'ID',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'0',
				),
		),
		array(
			'name'=>'user_login', 
			'comment' => '用户登陆账号',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(60)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'用户登陆账号',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'1',
				),
		),
		array(
			'name'=>'user_pass', 
			//Database数据定义相关属性
			'comment' => '登陆密码',
			'ddl' => array(
					'type'		=>	'varchar(255)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'登陆密码',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'2',
				),
		),
		array(
			'name'=>'user_nicename', 
			'comment' => '用户昵称',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(50)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'用户昵称',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'3',
				),
		),
		array(
			'name'=>'user_email', 
			'comment' => '邮箱',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(100)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'邮箱',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'4',
				),
		),
		array(
			'name'=>'user_url', 
			'comment' => '地址',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(100)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'地址',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'5',
				),
		),
		array(
			'name'=>'user_registered', 
			'comment' => '注册时间',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'datetime',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'0000-00-00',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'注册时间',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'5',
				),
		),
		array(
			'name'=>'user_status', 
			'comment' => '状态',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'int(11)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'状态',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'select',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'5',
				),
		),
		array(
			'name'=>'display_name', 
			'comment' => '显示名称',
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(250)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'显示名称',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'select',
					'validation'	=>	'required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'5',
				),
		),
	);

	/**
	 *	Check if the username and password is correct
	 **/
	public function check_user($username, $password){
		$userinfo = $this->getById($username, 'user_login');
		if($userinfo and $userinfo['user_pass'] == $password){
			return TRUE;
		}

		return FALSE;
	}
}