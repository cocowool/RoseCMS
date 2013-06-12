<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 公用的数据处理Model
 * 
 * @author shiqiang(cocowool@gmail.com)
 * @version $Id: MY_Model.php 25 2012-07-06 14:01:38Z cocowool@gmail.com $
 */
class MY_Model extends CI_Model{

	//Mysql Table fields to the html input type's reflection
	protected $field_to_type = array(
		'int'	=>	''
	);
	
	function __construct(){
		parent::__construct();
	}

	/**
	 * 返回数据库中表的字段
	 * 
	 */
	public function get_fields( ){
		return $this->db->list_fields($this->table);
	}
	
	/**
	 * 获取数据库表的字段相关信息
	 * 
	 * @param string $table	表名
	 */
	public function field_data( $table = '' ){
		if( empty($table) ){
			$table = $this->table;
		}
		
		return $this->db->field_data($table);
	}

	/**
	 * 向数据库表中插入一条新记录
	 * @param array $data
	 */
	function insertMethod($data = array() ){
		$data = $this->filterInputArray($data);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * 自动生成添加表单
	 *
	 * @param int $id
	 * @param string $action
	 * @param boolean $multipart
	 * @return string
	 */
	function get_add_form($id = '', $action = '', $multipart = FALSE, $invisible = array(), $parameters = array() ){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->config('sysconfig');
	
		$html_form = '';
		$html_form .= form_open_multipart($action, array('id' => $id) );
		foreach ($this->fields as $k=>$v ){
			if( key_exists('primary', $v) && $v['primary'] )	continue;
			if( key_exists('notintable', $v) && $v['notintable'] )	continue;
			if( in_array($v['name'], $invisible) )	continue;
				
			//根据不同的类型，生成页面控件
			if( key_exists('options', $v) && is_array($v['options']) ){
				$html_form .= '<p>' . form_label($v['comment'], $v['name']);
				$html_form .= form_dropdown( $v['name'], $v['options'] ) . '</p>';
			}else if( key_exists('fromSession', $v) && !empty($v['fromSession']) ){
				$html_form .= '<p>' . form_hidden($v['name'], $this->session->userdata($v['fromSession'])) . '</p>';
			}else if( key_exists($v['name'], $parameters) ){
				$html_form .= form_hidden($v['name'], $parameters[$v['name']]);
			}else if( key_exists('type', $v) ) {
				switch ( $v['type'] ){
					case 'text':
						$html_form .= '<p>' . form_label($v['comment'], $v['name']) . form_textarea( array(
								'name'=>$v['name'], 
								'class' => 'ckeditor', 
								'id'=>$v['name'], 'value'=> set_value($v['name']) ) ) . '</p>';
						break;
					case 'hidden':
						$html_form .= form_hidden(array(
							$v['name'] => $v['hidden'],
						));
						break;
					case 'file':
						$html_form .= '<p>' . form_label($v['comment'], $v['name']) . form_upload( array(
								'name'=>$v['name'], 
								'id'=>$v['name'], 'value'=> set_value($v['name']) ) ) . '</p>';
						break;
				}
			}else{
				$html_form .= '<p>' . form_label($v['comment'], $v['name']) . form_input( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']) ) ) . '</p>';
			}
		}
		$html_form .= '<p>' . form_submit(array('name'=>'submitform', 'id'=>'submitform', 'class' => 'btnSubmit'), '提交') . '</p>';
		$html_form .= form_close();
	
		return $html_form;
	}
	
	public function get_edit_form( $result, $id = '', $action = '', $multipart = FALSE, $invisible = array() ){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->config('sysconfig');
		
		$html_form = '';
		$html_form .= form_open_multipart($action, array('id' => $id) );
		foreach ($this->fields as $k=>$v ){
			if( in_array($v['name'], $invisible) )	continue;
			if( key_exists('notintable', $v) && $v['notintable'] ) continue;
			if( key_exists('primary', $v) && $v['primary'] ){
				$html_form .= form_hidden($v['name'], $result[$v['name']]);
				continue;
			}
				
			//根据不同的类型，生成页面控件
			if( key_exists('options', $v) && is_array($v['options']) ){
				$html_form .= '<p>' . form_label($v['comment'], $v['name']);
				$html_form .= form_dropdown( $v['name'], $v['options'], $result[$v['name']]) . '</p>';
			}else if( key_exists('fromSession', $v) && !empty($v['fromSession']) ){
				$html_form .= '<p>' . form_hidden($v['name'], $this->session->userdata($v['fromSession'])) . '</p>';
			}else if( key_exists('type', $v) && $v['type'] == 'text') {
				$html_form .= '<p>' . form_label($v['comment'], $v['name']) . form_textarea( array(
						'name'=>$v['name'], 
						'class' => 'ckeditor', 
						'id'=>$v['name'], 'value'=> $result[$v['name']] ) ) . '</p>';
			}else{
				$html_form .= '<p>' . form_label($v['comment'], $v['name']); 
				$html_form .= form_input( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name'], $result[$v['name']]) ) ) . '</p>';
			}
		}
		$html_form .= '<p>' . form_submit(array('name'=>'submitform', 'id'=>'submitform', 'class' => 'btnSubmit'), '提交') . '</p>';
		$html_form .= form_close();
		
		return $html_form;
	}
			
	function getArray($use_id_as_key = true){
		$res = $this->db->get();

		$items = array();
		if ($res->num_rows() > 0) {
			foreach ($res->result_array() as $k => $v) {
				foreach ($v as $kk => $vv) {
					if($use_id_as_key === true) $items[$v['id']][$kk] = $vv;
					else $items[$k][$kk] = $vv;
				}
			}
		}

		return $items;
	}

	function dataFilter($data){
		$result = array();

		foreach($this->fields as $val){
			if( key_exists($val['name'], $data) ){
				$result[$val['name']] = $data[$val['name']];
			}
		}

		return $result;
	}

	//转换输出的字符集
	function iconv_output( $data ){
		foreach( $data as $k => $v ){
			if( is_array( $v ) ){
				$data[$k] = $this->iconv_output( $v );
			}else{
				//$data[$k] = iconv('gbk', 'utf-8', $v);
				//if( iconv('gbk', 'utf-8', $v) ){
				//	$data[$k] = '';
				//}else{
					//echo $v . "=" . iconv('gbk', 'utf-8', $v); echo "<br />";
				//	$data[$k] = iconv('gbk', 'utf-8', $v);
				//}
			}
		}

		return $data;
	}

	//转换输入的字符集
	function iconv_input( $data ){
		foreach( $data as $k => $v ){
			if( is_array( $v ) ){
				$data[$k] = $this->iconv_output( $v );
			}else{
				//$data[$k] = iconv('utf-8', 'gbk', $v);
			}
		}

		return $data;
	}

	//根据数据表字段过滤
	function filterInputArray($data, $xss_clean = false, $table = '' ){
		if(empty($table)){
			$table = $this->table;
		}

		$fields = $this->db->list_fields($table);
		foreach($data as $k => $v){
			if( in_array($k, $fields) == false ){
				unset($data[$k]);
			}else{
				if($xss_clean == true) $data[$k] = $this->input->xss_clean($data[$k]);
			}
		}

		return $data;
	}

	//得到表中数据总数
	function getTotal( $condition = '' ){
 		if( !empty( $condition ) ){
	 		if( is_string($condition) ){
	 			$this->db->where("$condition");
	 		}else if( is_array($condition) ){
	 			foreach ($condition as $v){
	 				if( isset($v['data']) ){
		 				$this->db->$v['action']($v['field'], $v['data']);
	 				}
	 			}
	 		}
 		}

 		$this->db->from($this->table);
 		return $this->db->count_all_results();
	}

	/**
	 * 从数据库中获取结果数据集
	 *
	 * $condition	array( array('field'=>'', 'data' =>'', 'action'=>'' ) ) or string, 其中 action 指CI中数据库查询操作类型
	 * 
	 **/
	function getAll( $condition = array(), $start = 0, $pagesize = 500000, $sort = '', $direction = '' ){
 		if( !empty( $condition ) ){
	 		if( is_string($condition) ){
	 			$this->db->where("$condition");
	 		}else if( is_array($condition) ){
	 			foreach ($condition as $v){
	 				if( isset($v['data']) ){
		 				$this->db->$v['action']($v['field'], $v['data']);
	 				}
	 			}
	 		}
 		}

		if( !empty($sort) && !empty($direction) ){
			$this->db->order_by( $sort, $direction );
		}
		$query = $this->db->get($this->table, $pagesize, $start);
		return $query->result_array();
	}

	//更新方法
	function updateMethod($data = array(), $id = ''){
		$data = $this->filterInputArray($data);
		if( isset($data[$this->id])){
			$id = $data[$this->id];
			unset($data[$this->id]);
			$this->db->where($this->id, $id);
		}

		return $this->db->update($this->table, $data);
		//return $this->db->affected_rows();
	}

	//a typical select method
	//can't get much easier that this (except for ORM of course :))
	function selectMethod($id, $field = ''){
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}

		$this->db->from($this->table);
		$this->db->where($field, $id);
		$result = $this->db->get();

		if( $result ) {
			return $result->row_array();
		}else{
			return false;
		}
		//return $this->getArray();
	}

	/**
	 * 根据字段删除记录
	 * @param $id
	 * @param $field
	 */
	function deleteMethod($id , $field = ''){
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}

		$this->db->where($field, $id);
		return $this->db->delete($this->table);
	}

	/**
	 * 根据ID获取记录
	 *
	 * @param $id
	 * @param $field
	 */
	function getById($id, $field = ''){
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}

		$this->db->where($field, $id);
		$result = $this->db->get($this->table);
		return $result->row_array();
	}

	//支持复杂查询
	function queryMethod( $option = '', $start = 0, $pagesize = 50, $sort = '', $direction = '' ){
 		$result = array();

 		if( !empty($query) ){
	 		if( is_string($query) ){
	 			$this->db->where("$query");
	 		}else if( is_array($query) ){
	 			foreach ($query as $v){
	 				if( isset($v['data']) && $v['data'] != '' ){
		 				$this->db->$v['action']($v['field'], $v['data']);
	 				}
	 			}
	 		}
 		}

		if( !empty($sort) && !empty($direction) ){
	 		$this->db->order_by($sort, $direction);
		}
 		$query = $this->db->get($this->table, $pagesize, $start);
 		return $query->result_array();
	}
	
	public function getColumn(){
		$columns = array();
		foreach ($this->fields as $key => $value) {
			if( isset($value['invisible']) && $value['invisible'] )
				continue;
				
			if( !isset($value['allowHTML']) )
				$value['allowHTML'] = false;
				
			if( !empty($value['comment'] ) ){
				$sortable = '';
				if( isset($value['sortable']) && $value['sortable'] ){
					$sortable = ', sortable:true ';
				}
	
				$columns[] = '{key:"' . $value['name'] . '", label:"' . $value['comment'] . '"' . $sortable . ', "allowHTML" : "' . $value['allowHTML'] . '"}';
			}else
				$columns[] = $value['name'];
		}
	
		return $columns;
	}	
	
	/**
	 * 输出Session条件，用来根据当前登陆用户筛选结果
	 */
	public function getSessionOption(){
		foreach ($this->fields as $k=>$v){
			if( key_exists('fromSession', $v) && !empty($v['fromSession']) ){
				return $v;
			}
		}
		
		return FALSE;
	}
}
?>