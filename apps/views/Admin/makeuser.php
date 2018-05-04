
<h2>Add New User</h2>


<form action="<?php echo BASE_URL;?>/User/addNewUser" method="post">
		<table>
			<tr>
				<td>Username:</td>
				<td>
					
					<input type="text" name="username" required="1">
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					
					<input type="text" name="password" required="1">
				</td>
			</tr>

			<tr>
				<td>User Roles:</td>
				<td>
					<select name="level" class="cat">
						<option>Select User Roles</option>
						<option value="2">Author</option>
						<option value="3">Contributor</option>
					</select>
					
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<input type="submit" value="Make User" name="submit">
				</td>
			</tr>
		</table>
</form>

