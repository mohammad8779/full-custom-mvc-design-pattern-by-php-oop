<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<h2>Add Post</h2>

<?php 
   /******** this below comment code is not working that show illegal offset types????????
	if(isset($postErrors)){

	echo "<div style='color:red; border:1px solid red; padding:5px 10px margin:5px;'>";	
		foreach($postErrors as $key => $value){

			switch ($key) {
				case 'title':
					foreach($values as $val){
                      echo "Title: ".$val."<br/>";
					}
					break;

				case 'content':
					foreach($values as $val){
                      echo "Content: ".$val."<br/>";
					}
					break;

				case 'cat':
					foreach($values as $val){
                      echo "Category: ".$val."<br/>";
					}
					break;	
				
				default:
					
					break;
			}

		}
	 echo "</div>";	
	}
 *********/

?>

<form action="<?php echo BASE_URL;?>/Admin/addNewPost" method="post">
		<table>
			<tr>
				<td>Title</td>
				<td>
					
					<input type="text" name="title" required="1">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<textarea name="content" id="editor" class="editor"></textarea>

					<script>
				    ClassicEditor
				        .create( document.querySelector( '#editor' ) )
				        .catch( error => {
				            console.error( error );
				        } );
                    </script>
					
				</td>
			</tr>

			<tr>
				<td>Post Category</td>

				<td>
					<select name="cat" class="cat">
						<option>Select One</option>
						<?php 
							foreach($catList as $key => $cat){
						?>
						<option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
						<?php } ?>
					</select>
					
				</td>
			</tr> 
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Save Post">
				</td>
			</tr>
		</table>
</form>