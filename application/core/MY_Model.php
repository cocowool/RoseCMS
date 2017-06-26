<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function getTable(){
		return $this->table;
	}

	//获取模型的验证规则
	public function getFormValidation(){
		$validation_rules = array();
		foreach ($this->fields as $key => $value) {
			if(!empty($value['form']['validation'])){
				$validation_rules[] = array(
					'field'	=>	$value['name'],
					'label'	=>	$value['ddl']['comment'],
					'rules'	=>	$value['form']['validation']
				);
			}
		}

		return $validation_rules;
	}

	public function getTableDdl(){
		$primary = '';
		$sql = "CREATE TABLE " . $this->table . " (";
		foreach ($this->fields as $key => $value) {
			$sql .= "`" . $value['name'] . "` " .  $value['ddl']['type'] . " NOT NULL";
			
			if(!empty($value['ddl']['default'])){
				$sql .= " DEFAULT '" . $value['ddl']['default'] . "'";
			}

			if(!empty($value['ddl']['extra'])){
				$sql .= " " . $value['ddl']['extra'] . " ";
			}

			$sql .= " COMMENT '" . $value['ddl']['comment'] . "',";

			if($value['ddl']['primary']){
				$primary = " PRIMARY KEY (`" . $value['name'] . "`) ";
			}				
		}

		$sql .=  $primary . " ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

		return $sql;
	}
	
	/**
	 * 从数据库中获取结果数据集
	 *
	 * $condition	array( array('field'=>'', 'data' =>'', 'action'=>'' ) ) or string, 其中 action 指CI中数据库查询操作类型
	 *
	 **/
	public function getAll( $condition = array(), $start = 0, $pagesize = 500000, $sort = '', $direction = '' ){
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
	
		if( is_array($sort) && !empty($sort) ){
			foreach ($sort as $k=>$v){
				if(!empty($v)){
					$this->db->order_by( $v, $direction[$k] );
				}
			}
		}else if( !empty($sort) && !empty($direction) ){
			$this->db->order_by( $sort, $direction );
		}
		$query = $this->db->get($this->table, $pagesize, $start);
		return $query->result_array();
	}	

	/**
	 * 根据ID取值，默认根据ID取
	 * 
	 * @param int $id
	 * @param string $field
	 * @param string $sort
	 * @param string $direction
	 */
	public  function getById($id, $field = '', $sort = '', $direction = '', $alwaysArray = false ){
		if(empty($field) && !isset($this->id)){
			return FALSE;
		}
		
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}
	
		$this->db->where($field, $id);
		if(!empty($sort) && !empty($direction)){
			$this->db->order_by($sort, $direction);
		}
		$query = $this->db->get($this->table);
		
		$data = $query->result_array();
		if(count($data) == 1 and !$alwaysArray){
			return $data[0];
		}else{
			return $data;
		}
	}
	

	public function insert($data = array() ){
		if(empty($data)){
			return FALSE;
		}
		
		$data = $this->filterInputArray($data);

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
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
				//luyh
				if($xss_clean == true) $data[$k] = $this->security->xss_clean($data[$k]);
			}
		}

		return $data;
	}
	
}

?>