<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点栏目管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Article_Model extends MY_Model {
	protected $table = 'r_article';
	protected $id	=	'id';
	protected $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
		array('name'=>'name', 'comment'=>'文章名称'),
		array('name'=>'category', 'comment'=>'所属栏目', 'options' => ''),	
		array('name'=>'author', 'comment'=>'作者'),	
		array('name'=>'source', 'comment'=>'来源'),	
		array('name'=>'content', 'comment'=>'文章内容', 'invisible' => TRUE, 'type' => 'text' ),	
		array('name'=>'cover', 'comment'=>'文章封面配图', 'type' => 'file'),	
		array('name'=>'status', 'comment'=>'状态', 'options' => array('0' => '草稿', '1' => '已发布' ) ),	
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间', 'invisible' => TRUE),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();
		
		$this->load->model('category_model', 'c');
		$this->fields[2]['options'] = $this->c->get_all_category(0, 0);
	}
}