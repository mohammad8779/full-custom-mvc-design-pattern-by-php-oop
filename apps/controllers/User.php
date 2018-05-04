<?php

class User extends DController{

	public function __construct(){
		parent::__construct();
		$data = array();
		$mdata = array();
	}

   public function Index(){
   	 $this->makeUser();
   }	
   
   public function makeUser(){

   		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
		$this->load->view("Admin/makeuser");
		$this->load->view('Admin/footer');
   }


   public function addNewUser(){

   		if(!($_POST)){
   			header("Location: ".BASE_URL."/User");
   		}

   		$tableUser = "tbl_user";
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$level = $_POST['level'];
		$data  = array(
                 
                 "username"  => $username,
                 "password" => $password,
                 "level"    => $level
			);
		$userModel = $this->load->model("UserModel");
		$results = $userModel->addtUser($tableUser,$data);
        
        
		if($results == 1){
			$mdata['msg'] = "User added successfully...";
		}
		else{
			$mdata['msg'] = "User not added";
		}
		$url = BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata));
		header("Location: $url");
   }
   
   public function listUser(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
		
		$tableUser = "tbl_user";
		
		$userModel = $this->load->model("UserModel");
		$data['users'] = $userModel->userList($tableUser);
		$this->load->view("Admin/userlist",$data);
		$this->load->view('Admin/footer');
	}

  public function delUser($id = NULL){
  	    $tableUser = "tbl_user";
		$cond ="id=$id";
		$userModel = $this->load->model("UserModel");
		$results = $userModel->delUserById($tableUser,$cond);

		if($results == 1){
			$mdata['msg'] = "User deleted successfully...";
		}
		else{
			$mdata['msg'] = "User not deleted";
		}
		$url = BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata));
		header("Location: $url");
  }	
}
?>