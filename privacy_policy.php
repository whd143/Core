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
                        	<div class="privacy_content">
                           	 
                             <?php 
							 	$query=mysql_query("SELECT * FROM pages WHERE page_id=2");
							 	$result=mysql_fetch_array($query);
							 	echo "<h2>".$result['name']."</h2>";
							 	echo $result['description'];
							 ?>
                            
                            
                          </div><!--about_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->

<?php include "includes/footer.php"; ?>