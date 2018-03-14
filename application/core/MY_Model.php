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
			if( isset($value['form']['validation']) && !empty($value['form']['validation']) ){
				$validation_rules[] = array(
					'field'	=>	$value['name'],
					'label'	=>	$value['ddl']['comment'],
					'rules'	=>	$value['form']['validation']
				);
			}
		}

		return $validation_rules;
	}

	/**
	 * 删除数据库数据
	 * 
	 * @param int $id
	 * @param string $field
	 */
	public function delete($id, $field = ''){
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}
		
		$this->db->where($field, $id);
		return $this->db->delete($this->table);
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

			$sql .= " COMMENT '" . $value['comment'] . "',";

			if(isset($value['primary']) and $value['primary']){
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
	 * 2017-11-17 增加考虑支持分组条件
	 **/
	public function getAll( $condition = array(), $start = 0, $pagesize = 500000, $sort = '', $direction = '' ){
		if( !empty( $condition ) ){
			if( is_string($condition) ){
				$this->db->where("$condition");
			}else if( is_array($condition) ){
				foreach ($condition as $v){
					if( isset($v['group']) and is_array($v['group'])){
						$this->db->group_start();
						foreach ($v['group'] as $key => $value) {
							if( isset($value['data']) ){
								$this->db->$value['action']($value['field'], $value['data']);
							}
						}
						$this->db->group_end();
					}

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
		
		$data = $this->filterInputArray($data, true);

		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	//更新数据表
	public function update($data = array(), $id = '', $where = '', $noEscapeField = ''){
		$data = $this->filterInputArray($data);
		if( $where != '' ){
			if(is_array($where)){
				foreach ($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}else{
				$this->db->where($where, $id);
			}
		}else{
			if( isset($data[$this->id])){
				$id = $data[$this->id];
				unset($data[$this->id]);
				$this->db->where($this->id, $id);
			}else if(!empty($id)){
				$this->db->where($this->id, $id);
			}else{
				return false;
			}
		}

		return $this->db->update($this->table, $data);
		//return $this->db->affected_rows();
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

				//对特殊字符进行处理
				$data[$k] = htmlspecialchars($data[$k]);
			}
		}

		return $data;
	}


	/**
	 * 接收DataTable格式的Ajax请求，响应对应的数据
	 * 
	 * @param array $request
	 */
	public function dtRequest($request = array()){
		$start = $request['start'];
		$length = $request['length'];

		$condition = (isset($request['condition']))?$request['condition']:'';

		$sort = ''; $direction = '';
		foreach ($request['order'] as $v){
			$sort[] = $request['columns'][$v['column']]['data'];
			$direction[] = $v['dir'];
		}
		$total = $this->getTotal($condition);
		$data = $this->getAll($condition, $start, $length,$sort,$direction);
		
		return array(
			'draw'	=>	$request['draw'],
			'recordsTotal'	=>	$total,
			'recordsFiltered'	=>	$total,
			'data'	=>	$data
		);
	}

	/**
	 *
	 * 获取记录的总数
	 **/
	public function getTotal($condition= '', $group_by = ''){
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
		
		if(!empty($group_by)){
			$this->db->group_by($group_by);
		}

		$this->db->from($this->table);
		return $this->db->count_all_results();
	}		
}

?>