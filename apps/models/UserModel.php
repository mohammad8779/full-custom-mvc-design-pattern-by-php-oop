<?php

class UserModel extends DModel{

	public function __construct(){
       
       parent::__construct();
	}

	public function userlist($table){
        $sql ="SELECT * FROM $table";
		return $this->db->select($sql);
	}

	public function addtUser($table,$data){
		return $this->db->insert($table, $data);
	}

	public function userById($table, $id){
		$sql ="SELECT * FROM $table WHERE id=:id";
		$data = array(":id" => $id);
		return $this->db->select($sql,$data);

	}

	

	public function updateUser($table,$data,$cond){
		return $this->db->update($table, $data, $cond);
	}

	public function delUserById($table,$cond){
		return $this->db->delete($table, $cond);
	}

	
	
} 



?>