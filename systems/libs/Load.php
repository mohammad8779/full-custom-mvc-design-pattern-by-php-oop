<?php 
	
	//Load Class 
class Load{

	public function __construct(){

	}

	public function view($fileName, $data = false){

	if($data == true){
       extract($data); 
	}	
      
      include 'apps/views/'.$fileName.'.php';

	}

	public function model($modelName){
     
     include 'apps/models/'.$modelName.'.php';

     return new $modelName();

	}

	public function validation($modelName){
     
     include 'apps/validation/'.$modelName.'.php';

     return new $modelName();

	}
}

?>