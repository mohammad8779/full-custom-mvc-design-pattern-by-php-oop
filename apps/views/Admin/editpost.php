<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<h2>Add Post</h2>

<?php 
	foreach($postbyid as $Key => $value){

?>

<form action="<?php echo BASE_URL;?>/Admin/updatepost/<?php echo $value['id'];?>" method="post">
		<table>
			<tr>
				<td>Title</td>
				<td>
					
					<input type="text" name="title" required="1" value="<?php echo $value['title'];?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<textarea name="content" id="editor" class="editor">
						<?php echo $value['content'];?>
					</textarea>

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
							foreach($listCat as $key => $cat){
						?>

						
						<option 
							<?php 
							if($value['cat'] = $cat['id']){ ?>
								selected="selected"
							<?php } ?>
						 value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?>

						</option>
						<?php } ?>
					</select>
					
				</td>
			</tr> 
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Update Post">
				</td>
			</tr>
		</table>
</form>

<?php } ?>