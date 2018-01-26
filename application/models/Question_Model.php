<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_Model extends MY_Model {
	protected $table = 'rs_question';
	protected $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'excel_column' => '', 'comment'=>'主键', 'primary' => TRUE, 
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'primary',
				'default'	=>	'',
				'extra'		=>	'AUTO_INCREMENT',
			)),
		array('name'=>'q_author', 'excel_column' => '0', 'comment'=>'作者', 
			'ddl' => array(
				'type'		=>	'int(11)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_insert_time', 'excel_column' => '1', 'comment'=>'创建日期',
			'ddl' => array(
				'type'		=>	'datetime',
				'index'		=>	'',
				'default'	=>	'0000-00-00',
				'extra'		=>	'',
			)),
		array('name'=>'q_update_time', 'excel_column' => '2', 'comment'=>'更新时间', 
			'ddl' => array(
				'type'		=>	'datetime',
				'index'		=>	'',
				'default'	=>	'0000-00-00',
				'extra'		=>	'',
			)),
		array('name'=>'q_title', 'excel_column' => '3', 'comment'=>'题目',
			'ddl' => array(
				'type'		=>	'text',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
				'comment'	=>	'题目',
			),
			'form'	=>	array(
				'validation'	=>	'trim|required'
			)),
		array('name'=>'q_desc', 'excel_column' => '4', 'comment'=>'题干',
			'ddl' => array(
				'type'		=>	'text',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_option_1', 'excel_column' => '5', 'comment'=>'选项1',
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_option_2', 'excel_column' => '1', 'comment'=>'选项2',
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_option_3', 'excel_column' => '1', 'comment'=>'选项3', 
			'ddl'	=>	array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_option_4', 'excel_column' => '1', 'comment'=>'选项4', 
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_option_5', 'excel_column' => '1', 'comment'=>'选项5', 
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_option_6', 'excel_column' => '1', 'comment'=>'选项6',
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_answer', 'excel_column' => '1', 'comment'=>'答案', 
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_status', 'excel_column' => '1', 'comment'=>'状态',
			'ddl' => array(
				'type'		=>	'char(20)',
				'index'		=>	'',
				'default'	=>	'draft',
				'extra'		=>	'',
			)),
		array('name'=>'q_tips', 'excel_column' => '1', 'comment'=>'试题分析',
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_type', 'excel_column' => '1', 'comment'=>'题型',
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_group', 'excel_column' => '1', 'comment'=>'分组',
			'ddl'	=>	array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_tags', 'excel_column' => '1', 'comment'=>'标签',
			'ddl' => array(
				'type'		=>	'varchar(200)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
		array('name'=>'q_status', 'excel_column' => '1', 'comment'=>'状态',
			'ddl' => array(
				'type'		=>	'char(20)',
				'index'		=>	'',
				'default'	=>	'',
				'extra'		=>	'',
			)),
	);

}

?>

