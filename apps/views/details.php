
<article class="post-content">
	<div class="details">
		<?php 
			foreach($postDetails as $key => $value){
		?>
		<div class="title"> 
			<h2><?php echo $value['title'];?></h2>
			<p>Category:
				<a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['cat'];?>">    <?php echo $value['name'];?>
				</a> 
			</p>
		</div>

	    <div class="details-text"> 
			<?php echo $value['content'];?>

			<div class="read-more"><a href="<?php echo BASE_URL;?>/Index/postDetails/<?php echo $value['id'];?>">Read More</a></div>
	    </div>
	    <?php } ?>
	</div>		
			
</article>
		


