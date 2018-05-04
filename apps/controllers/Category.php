<?php 
//Category Controller

class Category extends DController{

	public function __construct(){
		parent::__construct();

	}


	public function categoryall(){
		$data = array();
		$table = "category";
		$catModel = $this->load->model("CatModel");
		$data['cat'] = $catModel->catList($table);
		$this->load->view("category", $data);
	}

	public function catById(){
		$data = array();
		$table = "category";
		$id = 1;
		$catModel = $this->load->model("CatModel");
		$data['catbyid'] = $catModel->catById($table, $id);
		$this->load->view("catbyid", $data);
	}

	public function addCategory(){
		$this->load->view("addcategory");
	}

	public function insertCategory(){
		$table = "category";
		$name = $_POST['name'];
		$title = $_POST['title'];
		$data  = array(
                 
                 "name"  => $name,
                 "title" => $title
			);
		$catModel = $this->load->model("CatModel");
		$results = $catModel->insertCat($table,$data);
        
        $mdata = array();
		if($results == 1){
			$mdata['msg'] = "category added successfully...";
		}
		else{
			$mdata['msg'] = "category not added";
		}
		$this->load->view("addcategory",$mdata);
	}

	public function updateCatById(){
		$table = "category";
		$id = 7;
		$data = array();
		$catModel = $this->load->model("CatModel");
		$data['catById'] = $catModel->catById($table, $id);
		$this->load->view("updatecat",$data);
	}

	public function updatecategory(){
		$table = "category";
		$id = $_POST['id'];
		$name = $_POST['name'];
		$title = $_POST['title'];
		$data  = array(
                 
                 "name"  => $name,
                 "title" => $title
			);
		$cond ="id = $id";
		
		
		$catModel = $this->load->model("CatModel");
		$results = $catModel->updateCat($table,$data,$cond);

        $mdata = array();
		if($results == 1){
			$mdata['msg'] = "category updated successfully...";
		}
		else{
			$mdata['msg'] = "category not updated";
		}
		$this->load->view("updatecat",$mdata);


	}

	public function deletecatbyid(){
		$table = "category";
		$cond ="id=18";
		$catModel = $this->load->model("CatModel");
		$catModel->delCatById($table,$cond);
	}

}






?>