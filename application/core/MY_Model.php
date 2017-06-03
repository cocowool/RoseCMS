<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function getTable(){
		return $this->table;
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
	
}

?>