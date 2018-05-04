<?php

class PostModel extends DModel{

	public function __construct(){
       
       parent::__construct();
	}

	public function getAllPost($table){
        $sql ="SELECT * FROM $table ORDER BY id DESC LIMIT 3";
		return $this->db->select($sql);
	}

	public function postById($tablePost,$id){
        $sql ="SELECT * FROM $tablePost WHERE id = $id";
		return $this->db->select($sql);
	}

	public function getAllPostList($table){
        $sql ="SELECT * FROM $table ORDER BY id DESC";
		return $this->db->select($sql);
	}

	public function getPostByDetails($tablePost,$tableCat,$id){
		$sql ="SELECT $tablePost.*,$tableCat.name FROM $tablePost
		       INNER JOIN $tableCat ON $tablePost.cat = $tableCat.id 
		       WHERE $tablePost.cat = $id ";
		return $this->db->select($sql);
	}

	public function getDetailsByCatBase($tablePost,$tableCat,$id){

		$sql ="SELECT $tablePost.*,$tableCat.name FROM $tablePost
		       INNER JOIN $tableCat ON $tablePost.cat = $tableCat.id 
		       WHERE $tableCat.id = $id";
		return $this->db->select($sql);
	}

	public function geLatestPost($table){
		$sql ="SELECT * FROM $table ORDER BY id DESC LIMIT 3";
		return $this->db->select($sql);
	}

	public function getPostBySearch($tablePost,$keyword,$cat){
		
		if(empty($keyword) && $cat == 0){
			header("Location: ".BASE_URL."/Index/home");
		}

		if(isset($keyword) && !empty($keyword)){
			$sql ="SELECT * FROM $tablePost WHERE title LIKE '%keyword%' OR content LIKE '%keyword%'";
		 }
		 elseif(isset($cat)){
		 	$sql ="SELECT * FROM $tablePost WHERE cat = $cat";
		 }
		
		return $this->db->select($sql);
	}

	public function insertPost($table,$data){
		return $this->db->insert($table, $data);
	}

	public function updatePost($table,$data,$cond){
		return $this->db->update($table, $data, $cond);
	}

	public function delPostById($table,$cond){
		return $this->db->delete($table, $cond);
	}
	
} 



?>