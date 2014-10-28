<?php include "includes/header.php"; ?>

	<div class="banner">
    	<div class="container">
            <div class="flexslider">
                <ul class="slides">
                    
					<?php 
                            $query=mysql_query("SELECT * FROM slider order by slider_id");
                            while($result=mysql_fetch_array($query))
							{
								?>
                                <li>
                                    <div class="flex-caption">
                                        <div class="banner_content">
                                            <h3><?php echo $result['name']; ?></h3>
                                            <p><?php echo $result['description']; ?></p>
                                            <a href="#">Read More</a>
                                        </div><!--banner_content-->
                                    </div><!--flex-caption-->
                                    <div class="banner_img">
                                        <img src="<?php echo $base_url.$result['image']; ?>" alt="">
                                    </div><!--banner_img-->
                                </li>
                                <?php
							}
					?>
					
                </ul>
            </div><!--flexslider-->
        </div><!--container-->
    </div><!--banner-->
    
</div><!--header-->

	<div class="clear"></div><!--clear-->
    	<div class="main_body">
        	<div class="mission_bar">
            	<div class="container">
                	<p>Our Mission is to ...</p>
                    <a href="#create_glove" class="fancybox">Create a Glove</a>
                    <div id="create_glove" style="display:none">
                    
                    <?php 
						$queryinstrct=mysql_query('SELECT * FROM gloves_instructions WHERE glov_instr_id="1"');
						$resultinstrct=mysql_fetch_array($queryinstrct);
					?>
                    <h3><?php echo $resultinstrct['title'];  ?></h3>
                    <?php echo $resultinstrct['description'];  ?>
                    <a href="design_glove.php">Continue</a>
                    </div><!--create_glove-->
                </div><!--container-->
            </div><!--mission_bar-->
                <div class="clear"></div><!--clear-->
                	<div class="container">
                        <div class="main_content">
                        	<div class="latest_products cs-style-3">
                            	
                                
                                <?php 
								$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='34'");
								$result=mysql_fetch_array($query);
								?>
                                <div class="pro_item">
                                    <div class="pro_img">    
                                        <figure>
                                            <img src="<?php echo $base_url.$result['image']; ?>" alt="" />
                                                <figcaption>
                                                    <a href="design_glove.php">View Detail</a>
                                                </figcaption>
                                        </figure>
                                    </div><!--pro_img-->
                                    <h3><?php echo $result['name']; ?></h3>
                               		<?php echo $result['description']; ?>
                               </div><!--pro_item-->
                                
                                
                                <?php 
								$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='36'");
								$result=mysql_fetch_array($query);
								?>
                                <div class="pro_item">
                                    <div class="pro_img">    
                                        <figure>
                                            <img src="<?php echo $base_url.$result['image']; ?>" alt="" />
                                                <figcaption>
                                                    <a href="design_glove.php">View Detail</a>
                                                </figcaption>
                                        </figure>
                                    </div><!--pro_img-->
                                    <h3><?php echo $result['name']; ?></h3>
                               		<?php echo $result['description']; ?>
                               </div><!--pro_item-->
                               
                                 <?php 
								$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='37'");
								$result=mysql_fetch_array($query);
								?>
                                <div class="pro_item">
                                    <div class="pro_img">    
                                        <figure>
                                            <img src="<?php echo $base_url.$result['image']; ?>" alt="" />
                                                <figcaption>
                                                    <a href="design_glove.php">View Detail</a>
                                                </figcaption>
                                        </figure>
                                    </div><!--pro_img-->
                                    <h3><?php echo $result['name']; ?></h3>
                               		<?php echo $result['description']; ?>
                               </div><!--pro_item-->
                               
                                 <?php 
								$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='35'");
								$result=mysql_fetch_array($query);
								?>
                                <div class="pro_item">
                                    <div class="pro_img">    
                                        <figure>
                                            <img src="<?php echo $base_url.$result['image']; ?>" alt="" />
                                                <figcaption>
                                                    <a href="design_glove.php">View Detail</a>
                                                </figcaption>
                                        </figure>
                                    </div><!--pro_img-->
                                    <h3><?php echo $result['name']; ?></h3>
                               		<?php echo $result['description']; ?>
                               </div><!--pro_item-->
                                
                                
                                
                                
                            </div><!--latest_products-->
						<div class="clear"></div><!--clear-->
					<div class="gallery_slider">
                <h3>Gallery</h3>
          
          			
                <div id="owl-demo" class="owl-carousel">
               
               
               <?php $query=mysql_query("SELECT * FROM products WHERE prod_id!=34 AND prod_id!=35 AND prod_id!=36 AND prod_id!=37 AND item_status=1 AND glove_made_type='system' order by prod_id"); 
					$count=mysql_num_rows($query);
					$i=0;
					$j=0;
					
					while($result=mysql_fetch_array($query))
					 {
						 if($i%3==0)
						 {
							?>
                            <div class="item">
                            <?php 
						 }
							?>
                            	<div class="gallery_product">
                               	
                                    <img src="<?php echo $base_url.$result['image']; ?>" alt="" />
                                    <a href="single_product_item.php?id=<?php echo $result['prod_id'];  ?>"><?php echo $result['name']; ?></a>
                                	
                                </div><!--gallery_product-->
								    
						<?php 
                        if($i%3==2 || $count-1==$i)
                         {
                            ?>
                            </div>
                            <?php 
                         }
						$i++;
						$j++;
					 }
			   ?>
               
               
            </div> 
                    
                    
        </div><!--gallery_slider-->
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->

<?php include "includes/footer.php"; ?>

