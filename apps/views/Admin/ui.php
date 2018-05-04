
<h2>UI Option</h2>
<?php 
   
   if(!empty($_GET['msg'])){
   		$msg = unserialize(urldecode($_GET['msg']));
      
    if(isset($msg)){
   		foreach($msg as $key => $value){
   			echo "<span style='color:blue; font-size:20px'>".$value."</span>";
   		 }
     }
     else{
        header("Location: ".BASE_URL."/Admin");
     }
 }
    
?>

<form action="<?php echo BASE_URL;?>/Admin/changeUI" method="post">
		<table>
			<tr>
				<td>Change your background color</td>
				<td>
					
					<input type="color" name="color">
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit"value="Submit">
				</td>
			</tr>
		</table>
</form>

