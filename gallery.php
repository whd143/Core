<?php include "includes/header.php"; ?>

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
                </div>
                
            </div><!--mission_bar-->
                <div class="clear"></div><!--clear-->
                	<div class="container">
                        <div class="main_content">
                        	<div class="gallery_content">
                        	
                            <h2>Catalogue</h2>	
                                
                        	<div class="latest_products cs-style-3">
                            	
                                
                                <?php 
										$query=mysql_query("SELECT * FROM products WHERE item_status AND prod_id!='34' AND prod_id!='35' AND prod_id!='36' AND prod_id!='37' AND item_status=1 AND glove_made_type='system' order by prod_id" );
										while($result=mysql_fetch_array($query))
										{
											?>
											 <div class="pro_item">
                                                <div class="pro_img">    
                                                    <figure>
                                                        <img src="<?php echo $base_url.$result['image']; ?>" alt="" />
                                                            <figcaption>
                                                                <a href="single_product_item.php?id=<?php echo $result['prod_id'];  ?>">Buy this item</a>
                                                            </figcaption>
                                                    </figure>
                                                </div><!--pro_img-->
                                                <h3><a href="single_product_item.php?id=<?php echo $result['prod_id'];  ?>"><?php echo $result['name']; ?></h3></a>
                                              	<?php 
													echo substr($result['description'],0,60);
												?>
                                                <a href="single_product_item.php?id=<?php echo $result['prod_id'];  ?>" style="display:block;color:#D1170F;">Read More</a>
                                              </div><!--pro_item-->
											<?php
										}
								?>
                                
                               
                            </div><!--latest_products-->
                            
                            </div><!--gallery_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->
            	
<?php include "includes/footer.php"; ?>

