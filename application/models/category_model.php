<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点栏目管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Category_Model extends MY_Model {
	protected $table = 'r_category';
	protected $id	=	'id';
	protected $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
		array('name'=>'category', 'comment'=>'栏目名称'),
		array('name'=>'pid', 'comment'=>'父栏目'),	
		array('name'=>'description', 'comment'=>'栏目描述'),	
		array('name'=>'keywords', 'comment'=>'栏目关键词'),	
		array('name'=>'urltag', 'comment'=>'地址标志符'),	
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间', 'invisible' => TRUE),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();
	}
	
}