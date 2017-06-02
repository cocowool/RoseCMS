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
		$sql = "CREATE TABLE " . $this->table . " (";
		foreach ($this->fields as $key => $value) {
				$sql .= "`" . $value['name'] . "` " .  $value['ddl']['type'] . " NOT NULL";
				if(!empty($value['ddl']['default'])){
					$sql .= " DEFAULT '" . $value['default'] . "'";
				}

				if(!empty($value['ddl']['extra'])){
					$sql .= " " . $value['extra'] . " ";
				}
				$sql .= " COMMENT '" . $value['ddl']['comment'] . "',";
		}
		$sql .= "PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

		echo $sql;

	}
	
}

?>