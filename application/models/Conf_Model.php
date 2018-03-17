<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conf_Model extends MY_Model {
	protected $table = 'rs_conf';
	protected $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'excel_column' => '', 'comment'=>'主键', 'primary' => TRUE, 
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'primary',
				'default'	=>	'',
				'extra'		=>	'AUTO_INCREMENT',
			)),
		array('name'=>'rs_item', 'excel_column' => '0', 'comment'=>'项目', 
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'rs_value', 'excel_column' => '1', 'comment'=>'值',
			'ddl' => array(
				'type'		=>	'varchar(250)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'insert_time', 'excel_column' => '2', 'comment'=>'创建时间', 
			'ddl' => array(
				'type'		=>	'timestamp',
				'index'		=>	'',
				'default'	=>	'0000-00-00',
				'extra'		=>	'',
			)),

		array('name'=>'rs_user', 'excel_column' => '3', 'comment'=>'创建人',
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
	);

}
