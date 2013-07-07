<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点栏目管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Activity_Model extends MY_Model {
	protected $table = 'r_activity';
	protected $id	=	'id';
	protected $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
		array('name'=>'actname', 'comment'=>'活动名称'),
		array('name'=>'subname', 'comment'=>'副标题', 'invisible' => TRUE),
		array('name'=>'subject', 'comment'=>'主题'),
		array('name'=>'guest', 'comment'=>'嘉宾'),
		array('name'=>'compere', 'comment'=>'主持人'),
		array('name'=>'actdate', 'comment'=>'活动时间', 'invisible' => TRUE),	
		array('name'=>'actaddress', 'comment'=>'活动地点', 'invisible' => TRUE),
		array('name'=>'acttotal', 'comment'=>'活动人数'),	
		array('name'=>'actcontent', 'comment'=>'活动内容', 'invisible' => TRUE, 'type' => 'text' ),	
		array('name'=>'members', 'comment'=>'报名会员列表', 'allowHTML' => TRUE, 'notintable' => TRUE),	
		array('name'=>'resource', 'comment'=>'资源', 'allowHTML' => TRUE, 'notintable' => TRUE),	
		array('name'=>'status', 'comment'=>'状态', 'options' => array('0' => '草稿', '1' => '已发布' ), 'invisible' => TRUE ),	
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间', 'invisible' => TRUE),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();
	}
}