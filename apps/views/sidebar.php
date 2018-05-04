<aside class="sidebar">
			<div class="widget">
				<h3>The post category</h3>
				<ul>
					<?php foreach($catList as $key => $value){?>
					<li><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
					<?php }?>
				</ul>
			</div>

			<div class="widget">
				<h3>The latest post</h3>
				<ul>
					<?php foreach($latestPost as $key => $value){?>
					   <li><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
					<?php }?>
				</ul>
			</div>
		</aside>

