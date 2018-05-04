<?php 
//Index Controller

class Index extends DController{

	public function __construct(){
       parent::__construct();
       //$this->load = new Load();
	}
    
    public function Index(){
    	$this->home();
    }
    
	public function home(){
		$data = array();
		$tablePost = "post";
		$tableCat = "category";
		$this->load->view("header");
		$catModel = $this->load->model("CatModel");
		$data['catList'] = $catModel->catList($tableCat);
		$this->load->view("search",$data);

		

		$postModel = $this->load->model("PostModel");
		$data['allPost'] = $postModel->getAllPost($tablePost);
		$this->load->view("content", $data);

        $data['latestPost'] = $postModel->geLatestPost($tablePost);
        $this->load->view("sidebar",$data);

        $this->load->view("footer");
	}

	public function postDetails($id = NULL){
		$data = array();
		$tablePost = "post";
		$tableCat = "category";
		$this->load->view("header");
		$catModel = $this->load->model("CatModel");
		$data['catList'] = $catModel->catList($tableCat);
		$this->load->view("search",$data);

        $postModel = $this->load->model("PostModel");
		$data['postDetails'] = $postModel->getPostByDetails($tablePost,$tableCat,$id);
		$this->load->view("details",$data);

		
		$data['latestPost'] = $postModel->geLatestPost($tablePost);
        $this->load->view("sidebar",$data);
        
		$this->load->view("footer");
	}

	public function postByCategory($id = NULL){
		$data = array();
		$tablePost = "post";
		$tableCat = "category";
		$this->load->view("header");
		$catModel = $this->load->model("CatModel");
		$data['catList'] = $catModel->catList($tableCat);
		$this->load->view("search",$data);
		
        $postModel = $this->load->model("PostModel");
		$data['postCat'] = $postModel->getDetailsByCatBase($tablePost,$tableCat,$id);
		$this->load->view("postbycatbase",$data);
		
		$data['latestPost'] = $postModel->geLatestPost($tablePost);
		$this->load->view("sidebar",$data);
		
		$this->load->view("footer");
	}

	public function search(){
		$data = array();
		$keyword = $_REQUEST['keyword'];
		$cat = $_REQUEST['cat'];
		$tablePost = "post";
		$tableCat = "category";
		$this->load->view("header");
		$catModel = $this->load->model("CatModel");
		$data['catList'] = $catModel->catList($tableCat);
		$this->load->view("search",$data);
		
        $postModel = $this->load->model("PostModel");
		$data['postBySearch'] = $postModel->getPostBySearch($tablePost,$keyword,$cat);
		$this->load->view("sresults",$data);
		
		$data['latestPost'] = $postModel->geLatestPost($tablePost);
		$this->load->view("sidebar",$data);
		
		$this->load->view("footer");
	}


	public function notFound(){
		//$this->load->view('header');
		//$this->load->view('sidebar');
		$this->load->view('404');
		//$this->load->view('footer');
	}

	


}


?>