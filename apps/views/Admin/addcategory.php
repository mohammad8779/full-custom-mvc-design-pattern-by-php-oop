
<h2>Add New Category</h2>


<form action="<?php echo BASE_URL;?>/Admin/insertCategory" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td>
					
					<input type="text" name="name" required="1">
				</td>
			</tr>
			<tr>
				<td>Title:</td>
				<td>
					
					<input type="text" name="title" required="1">
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

