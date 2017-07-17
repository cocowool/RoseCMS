<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Model extends MY_Model {
	protected $table = 'rs_post';
	protected $id	=	'id';
	public $fields = array(
		array(
			'name'=>'id', 
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
			'name'=>'post_author', 
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
			'name'=>'post_date', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'timestamp',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'0000-00-00',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'发布时间',
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
			'name'=>'post_content', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'longtext',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'文章内容',
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
		array(
			'name'=>'post_title', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'text',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'文章标题',
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
					'excel_column'	=>	'4',
				),
		),
		array(
			'name'=>'post_modified', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'timestamp',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'0000-00-00',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'修改日期',
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
					'excel_column'	=>	'5',
				),
		),
		array(
			'name'=>'post_status', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(20)',
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
					'type'			=>	'text',
					'validation'	=>	'trim',
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
			'name'=>'post_name', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(20)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'URL别名',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'select',
					'validation'	=>	'trim',
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
			'name'=>'post_parent', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'bigint(20)',
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
					'validation'	=>	'trim',
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
			'name'=>'post_type', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'varchar(20)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'类型',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'select',
					'validation'	=>	'trim',
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
			'name'=>'comment_count', 
			//Database数据定义相关属性
			'ddl' => array(
					'type'		=>	'bigint(20)',
					'primary'	=>	FALSE,
					'collation'	=>	'',
					'null'		=>	'No',
					'default'	=>	'',
					'extra'		=>	'',
					'index'		=>	'',
					'comment'	=>	'留言数量',
				),
			//新增、修改表单生成所需属性
			'form'	=>	array(
					'type'			=>	'select',
					'validation'	=>	'trim',
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

}

?>