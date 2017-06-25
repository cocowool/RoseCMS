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
		
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}

?>