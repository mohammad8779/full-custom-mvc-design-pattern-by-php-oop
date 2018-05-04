<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<h2>Post List</h2>

<?php 
   
   if(!empty($_GET['msg'])){
   		$msg = unserialize(urldecode($_GET['msg']));

   		foreach($msg as $key => $value){
   			echo "<span style='color:blue; font-size:20px'>".$value."</span>";
   		}
   }
    // if(isset($msg)){
       //echo "<span style='color:blue; font-size:20px'>".$msg."</span>";	
    // }
?>

<table id="mytableId" class="display" data-page-length='5'> 
	<thead>  
		<tr> 
			<th width="5%" >No</th>
			<th width="20%">Title</th>
			<th width="35%">Content</th>
			<th width="20%">Category</th>
			<th width="20%">Action</th>
		</tr>
	</thead>
<tbody> 	
 <?php 
    $i = 0;
 	foreach($postList as $key => $value){
    $i++;		
 ?>
	<tr> 
		<td><?php echo $i; ?></td>
		<td><?php echo $value['title'];?></td>
		<td><?php
				$text = $value['content'];
              if(strlen($text) > 45){
                $text = substr($text,0,45);
                   echo $text;
                }   
            ?>
        </td>
		<td>
			<?php 
                /************** why the resoin for not work???
				foreach ($listCat as $key => $cat) {

					if($cat['id'] == $value['cat']){

						echo $cat['name'];
					}
				}
		        ************/						
			  
				echo $value['cat'];
			?>

		</td>
		<?php 
			if(Session::get('level') == 1){
		?>
		 <td>
		 <a href="<?php echo BASE_URL;?>/Admin/editArticle/<?php echo $value['id'];?>">Edit</a>||
		  <a onclick = "return confirm('Are you sure to delete!')" href="<?php echo BASE_URL;?>/Admin/delArticle/<?php echo $value['id'];?>">Delete</a>
		</td>

		<?php } else{?>
			<td>Not Permited</td>
		<?php } ?>
	</tr>
<?php } ?>	

</tbody>
</table>

<script> 
$(document).ready(function() {
    $('#mytableId').DataTable();
 } );
</script>