
<?php 
spl_autoload_register(function($class){
  include_once"systems/libs/".$class.".php";
});
 include_once"apps/configs/config.php";

$main = new Main();

/*************
****
 below code is in Main.php files that is more dynamic... 
*****
 $url = isset($_GET['url']) ? $_GET['url'] : NULL;
 if($url != NULL){
   $url = trim($url, "/");
   $url = explode("/", $url);
 }else{
 	unset($url);
 }
 
if(isset($url[0])){
   include'apps/controllers/'.$url[0].'.php';
   $cont = new $url[0]();
   if(isset($url[2])){
      $cont->$url[1]($url[2]);
   }
   else{
       
       if(isset($url[1])){
          $cont->$url[1]();
       }
       else{
           #code...
       }
   }
   
 }
 else{
    include'apps/controllers/Index.php';
     $cont = new Index();
     $cont->home();
 }
******************/
 
 


?>
















