<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点资源管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Resource_Model extends MY_Model {
	protected $table = 'r_source';
	protected $id	=	'id';
	protected $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
		array('name'=>'aid', 'comment'=>'关联文章'),
		array('name'=>'description', 'comment'=>'资源描述', 'options' => ''),	
		array('name'=>'author', 'comment'=>'作者'),	
		array('name'=>'sort', 'comment'=>'排序'),	
		array('name'=>'tag', 'comment'=>'标签'),	
		array('name'=>'status', 'comment'=>'状态', 'options' => array('0' => '草稿', '1' => '已发布' ) ),	
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间', 'invisible' => TRUE),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();		
	}
}