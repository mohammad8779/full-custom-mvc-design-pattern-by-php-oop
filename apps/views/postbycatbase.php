<article class="post-content">
			
			<?php 
               foreach($postCat as $Key => $value){
		     ?>
			<div class="post">
				<div class="title"> 
			       <h2><?php echo $value['title'];?></h2>
			       <p>Category:<?php echo $value['name'];?></p>
		        </div>
				
				<p><?php 

				     $text = $value['content'];
                      
                      if(strlen($text) > 100){

                      		$text = substr($text,0,100);
                      		echo $text;
                      }
				  ?>
				</p>
				
			</div>

			<?php } ?>
			
		</article>
		


