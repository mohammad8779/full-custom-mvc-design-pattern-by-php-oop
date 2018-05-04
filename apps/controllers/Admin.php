<?php 
//delwar controller

class Admin extends DController {

	public function __construct(){
       parent::__construct();
       Session::checkSession();
       $data = array();
	}
	public function Index(){
		$this->home();
	}

	public function home(){
		
		$this->load->view('Admin/header');
       /******* this below comment code is the one way to show user
		$data['user'] = array(

				"username" => Session::get('username')
			);
		$this->load->view('Admin/home',$data); **********/
		$this->load->view('Admin/home');
		$this->load->view('Admin/sidebar');
		$this->load->view('Admin/footer');
	}

	public function addCategory(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
		$this->load->view('Admin/addcategory');
		$this->load->view('Admin/footer');
		
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
		$url = BASE_URL."/Admin/categoryall?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}

	public function categoryall(){
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
		$data = array();
		$table = "category";
		$catModel = $this->load->model("CatModel");
		$data['cat'] = $catModel->catList($table);
		$this->load->view("Admin/categorylist", $data);
		$this->load->view('Admin/footer');
	}

	public function editCategory($id = NULL){
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
		$data = array();
		$table = "category";
		$catModel = $this->load->model("CatModel");
		$data['catById'] = $catModel->catById($table, $id);
		$this->load->view("Admin/editcat",$data);
		$this->load->view('Admin/footer');
	}

	public function updatecategory($id = NULL){
		$table = "category";
		
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
		$url = BASE_URL."/Admin/categoryall?msg=".urlencode(serialize($mdata));
		header("Location: $url");


	}

	public function delCategory($id = NULL){
		$table = "category";
		$cond ="id=$id";
		$catModel = $this->load->model("CatModel");
		$results = $catModel->delCatById($table,$cond);
		if($results == 1){
			$mdata['msg'] = "Category Deleted successfully...";
		}
		else{
			$mdata['msg'] = "Category not Deleted";
		}
		$url = BASE_URL."/Admin/categoryall?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}

	public function addArticle(){
        $tableCat = "category";
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
		$catModel = $this->load->model("CatModel");
		$data['catList'] = $catModel->catList($tableCat);
		$this->load->view('Admin/addpost',$data);
		$this->load->view('Admin/footer');
	}

	public function articleList(){
		$tablePost = "post";
		$tableCat = "category";
        
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');
        $postModel = $this->load->model("PostModel");
		$data['postList'] = $postModel->getAllPostList($tablePost);
		$this->load->view('Admin/postlist',$data);
        // why the resion for not work below codes???

		//$catModel = $this->load->model("CatModel");
		//$data['listCat'] = $catModel->catList($tableCat);
        $this->load->view('Admin/footer');

	}

	public function addNewPost(){
       
    /************** this below comment code is not working that is shows illegal offset types

      ???????????
       
       $input = $this->load->validation("Dform");

       $input->post('title')
       		 ->isEmpty()
       		 ->length(10,500);

       $input->post('content')
       		 ->isEmpty();

       $input->post('cat')
       		 ->isEmpty();	
       		 		 	
        if($input->submit()){

        		$tablePost = "post";

				$title   = $input->values['title'];
				$content = $input->values['content'];
				$cat     = $input->values['cat'];
				$data  = array(
		                 
		                 "title"  => $title,
		                 "content" => $content,
		                 "cat" => $cat
					);
				$postModel = $this->load->model("PostModel");
				$results = $postModel->insertPost($tablePost,$data);
		        
		        $mdata = array();
				if($results == 1){
					$mdata['msg'] = "Article added successfully...";
				}
				else{
					$mdata['msg'] = "Article not added";
				}
				$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
				header("Location: $url");
        }
        else{

        	$data['postErrors'] = $input->errors();

        	$tableCat = "category";
			$this->load->view('Admin/header');
			$this->load->view('Admin/sidebar');
			$catModel = $this->load->model("CatModel");
			$data['catList'] = $catModel->catList($tableCat);
			$this->load->view('Admin/addpost',$data);
			$this->load->view('Admin/footer');
        }
		
     ************/   
     if(!$_POST['submit']){

     	header("Location:".BASE_URL."/Admin");
     	
     }
     else{

     	$tablePost = "post";
		$title = $_POST['title'];
		$content = $_POST['content'];
		$cat = $_POST['cat'];
		$data  = array(
                 "title" => $title,
                 "content"  => $content,
                 "cat"      => $cat
                 
			);
		$postModel = $this->load->model("PostModel");
		$results = $postModel->insertPost($tablePost,$data);
        
        $mdata = array();
		if($results == 1){
			$mdata['msg'] = "Article added successfully...";
		}
		else{
			$mdata['msg'] = "Article not added";
		}
		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("Location: $url");

     }
	   
	}

   public function editArticle($id=NULL){

   		$tablePost = "post";
		$tableCat = "category";
        
		$this->load->view('Admin/header');
		$this->load->view('Admin/sidebar');


        $postModel = $this->load->model("PostModel");
		$data['postbyid'] = $postModel->postById($tablePost,$id);

		
        // why the resion for not work below codes???

		$catModel = $this->load->model("CatModel");
		$data['listCat'] = $catModel->catList($tableCat);

		$this->load->view('Admin/editpost',$data);
        $this->load->view('Admin/footer');

   }

   public function updatepost($id = NULL){
		$table = "post";
		$cond ="id = $id";
		$title = $_POST['title'];
		$content = $_POST['content'];
		$cat = $_POST['cat'];
		$data  = array(
                 
                 "title"  => $title,
                 "content" => $content,
                 "cat"     => $cat
			);

		
		
		
		$postModel = $this->load->model("PostModel");
		$results = $postModel->updatePost($table,$data,$cond);

        $mdata = array();
		if($results == 1){
			$mdata['msg'] = "Article updated successfully...";
		}
		else{
			$mdata['msg'] = "Article not updated";
		}
		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("Location: $url");


	}


	public function delArticle($id = NULL){
		$table = "post";
		$cond ="id=$id";
		$postModel = $this->load->model("PostModel");
		$results = $postModel->delPostById($table,$cond);
		if($results == 1){
			$mdata['msg'] = "Article Deleted successfully...";
		}
		else{
			$mdata['msg'] = "Article not Deleted";
		}
		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}


	public function uiOption(){
		/****
           this below code also shows for applying color change of ui.
           it will be applied just for one page.it should be use to another pages
           by this ways.
		*******/
        $tableUI = "tbl_ui";
        $uiModel = $this->load->model("UIModel");
        $data['color'] =  $uiModel->getColor($tableUI);
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/sidebar');
		$this->load->view('Admin/ui');
		$this->load->view('Admin/footer');

	}

	public function changeUI(){

		$tableUI = "tbl_ui";
		$id      = 1;
		$cond ="id = $id";
		$color = $_POST['color'];
		
		$data  = array(
                 
                 "color"  => $color
                 
			);

		
		
		
		$uiModel = $this->load->model("UIModel");
		$results = $uiModel->updateBackground($tableUI,$data,$cond);

        $mdata = array();
		if($results == 1){
			$mdata['msg'] = "UI updated successfully...";
		}
		else{
			$mdata['msg'] = "UI not updated";
		}
		$url = BASE_URL."/Admin/uiOption?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}



 }



?>