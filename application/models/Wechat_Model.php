<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat_Model extends MY_Model {
	protected $table = 'rs_wechat_msg';
	protected $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'excel_column' => '', 'comment'=>'主键', 'primary' => TRUE, 
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'primary',
				'default'	=>	'',
				'extra'		=>	'AUTO_INCREMENT',
			)),
		array('name'=>'ToUserName', 'excel_column' => '0', 'comment'=>'接收用户名', 
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			),
			'form'=> array(
				'type'=>'text', 
				'validation'=>'required', 
				'tips'=>'', 
				'class'=>'', 
				'default'=>''
			)),
		array('name'=>'FromUserName', 'excel_column' => '1', 'comment'=>'发送用户名',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			),
			'form'=> array(
				'type'=>'text', 
				'validation'=>'required', 
				'tips'=>'', 
				'class'=>'', 
				'default'=>''
			)),
		array('name'=>'insert_time', 'excel_column' => '2', 'comment'=>'创建时间', 
			'ddl' => array(
				'type'		=>	'timestamp',
				'index'		=>	'',
				'default'	=>	'0000-00-00',
				'extra'		=>	'',
			)),
		array('name'=>'CreateTime', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'MsgType', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'char(50)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'content', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'text',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'MsgId', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'char(50)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'PicUrl', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'MediaId', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'ThumbMediaId', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Location_X', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Location_Y', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Scale', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'int(5)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Label', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Title', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Description', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'Url', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
	);

}
