<div class="searchoption"> 
	<div class="menu">
		<a href="<?php echo BASE_URL;?>">Home</a>
	</div>
	<div class="search">
		<form action="<?php echo BASE_URL;?>/Index/search" method="POST"> 
		  <input type="text" name="keyword" placeholder="Search here..">
		  
		  <select class="searchcat" name="cat">
		  	 <option>Select One</option>
		  	 <?php foreach($catList as $key => $cat){ ?>
		  	 <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
		  	 <?php } ?>
		  </select>	
		  <button class="searchbtn" type="submit" name="submit">Search</button>
		
		</form>
	</div>

</div>