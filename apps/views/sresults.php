<article class="post-content">
			<?php 
               foreach($postBySearch as $Key => $value){
		     ?>
			<div class="post">
				<h2><a href="<?php echo BASE_URL;?>/Index/postDetails/<?php echo $value['id'];?>"> <?php echo $value['title'];?></a></h2>
				<p><?php 

				     $text = $value['content'];
                      
                      if(strlen($text) > 100){

                      		$text = substr($text,0,100);
                      		echo $text;
                      }
				  ?>
				</p>
				<div class="read-more"><a href="<?php echo BASE_URL;?>/Index/postDetails/<?php echo $value['id'];?>">Read More</a></div>
			</div>

			<?php } ?>
			
		</article>
		


