<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_Model extends MY_Model {
	protected $table = 'rs_postmeta';
	protected $id	=	'id';
	public $fields = array(
		array(
			'name'=>'meta_id', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'bigint(20)',
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
					'validation'	=>	'',
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
			'name'=>'post_id', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'bigint(20)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'0',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'作者ID',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'',
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
			'name'=>'meta_key', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(255)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'META键',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'',
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
			'name'=>'meta_value', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'longtext',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'META值',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'text',
					'validation'	=>	'trim|required',
					'tiptext'		=>	'',
					'extra'			=>	'',
					'class'			=>	'',
				),
			//表格所需属性
			'table'	=>	array(
					'excel_column'	=>	'3',
				),
		),
	);

}

?>