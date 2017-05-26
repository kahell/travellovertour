<?php

Class Home_model extends CI_Model{

	public function getData($tableName, $where){
		$result = $this->db->query("select * from $tableName $where");
		return $result;
	}

	public function insertData($tableName, $data){
		$this->db->insert($tableName, $data);
		$result = $this->db->insert_id();
		return $result;
	}

	public function updateData($tableName, $data, $where){
		$result = $this->db->update($tableName, $data, $where);
		return $result;
	}

	public function deleteData($tableName, $where){
		$result = $this->db->delete($tableName, $where);
		return $result;
	}

	public function all($table,$limit = 0){
		$this->db->limit($limit);
		$this->db->offset($this->uri->segment(3));
		return $this->db->get($table);
	}

	public function count($table){
		return $this->db->count_all_results($table);		
	}
}
?>