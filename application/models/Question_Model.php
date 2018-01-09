<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_Model extends MY_Model {
	protected $table = 'rs_question';
	protected $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'excel_column' => '', 'comment'=>'主键', 'primary' => TRUE, 'index'=>'primary', 'ddl' => 'int(11)', 'default'=>'', 'extra' => 'AUTO_INCREMENT'),
		array('name'=>'q_author', 'excel_column' => '0', 'comment'=>'作者', 'index' => '', 'ddl' => 'int(11)', 'default'=>''),
		array('name'=>'q_insert_time', 'excel_column' => '1', 'comment'=>'创建日期', 'index' => '', 'ddl' => 'datetime', 'default'=>'0000-00-00'),
		array('name'=>'q_update_time', 'excel_column' => '2', 'comment'=>'更新时间', 'index' => '', 'ddl' => 'datetime', 'default'=>'0000-00-00'),
		array('name'=>'q_title', 'excel_column' => '3', 'comment'=>'题目', 'index' => '', 'ddl' => 'text', 'default'=>''),
		array('name'=>'q_desc', 'excel_column' => '4', 'comment'=>'题干', 'index' => '', 'ddl' => 'text', 'default'=>''),
		array('name'=>'q_', 'excel_column' => '5', 'comment'=>'状态', 'index' => '', 'ddl' => 'varchar(20)', 'default'=>''),
		array('name'=>'post_modified', 'excel_column' => '1', 'comment'=>'修改时间', 'index' => '', 'ddl' => 'datetime', 'default'=>'0000-00-00'),
		array('name'=>'post_modified_gmt', 'excel_column' => '2', 'comment'=>'修改时间GMT', 'index' => '', 'ddl' => 'datetime', 'default'=>'0000-00-00'),
		array('name'=>'post_parent', 'excel_column' => '0', 'comment'=>'上级栏目', 'index' => '', 'ddl' => 'int(11)', 'default'=>''),
		array('name'=>'post_type', 'excel_column' => '0', 'comment'=>'文章类型', 'index' => '', 'ddl' => 'varchar(20)', 'default'=>''),


	);

}

?>

