<?php include "includes/header.php"; 
$prod_id=$_REQUEST['id'];
?>

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
                        	<div class="about_content">
                            
                            
                             <?php 
							 	$query=mysql_query('SELECT * FROM products WHERE prod_id="'.$prod_id.'"');
							 	$result=mysql_fetch_array($query);
								?>
							 	<h2>
                                	<?php echo $result['name'];  ?>
								</h2>
                                <img src="<?php echo $base_url.$result['image']; ?>" style="float:left;margin:0 10px 10px 0;">
                                
                                <div class="lh"><h3>Glove Type: </h3><?php echo $result['gloves_type']; ?></div>
                                <div class="lh"><h3>Glove Size: </h3><?php echo $result['size']; ?>"</div>
								<?php
								echo $result['description'];
							 ?>
                             	<div class="lhs"><h3>Glove Price: </h3>$
								<?php echo number_format( $result['price'], 2 ,'.',','); ?> Only
								</div>
                                
                                <!--<div class="lhs"><h3>In Stock: </h3>
								<?php // echo $result['stock']; ?>
								</div>-->
                                
                                <div class="lhs"><h3>Quantity: </h3>
									<input type="text" name="qtys" id="qtys" value="1" onkeyup="checkvalue()" />
								</div>
                                
                                <div class="lhs">
                                    <input style="cursor:pointer;" type="button" value="Add To Cart" onclick="addtocart(<?php echo $result['prod_id']; ?>)" />
                                    
								</div>
                                
                            
                          </div><!--about_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->

<?php include "includes/footer.php"; ?>