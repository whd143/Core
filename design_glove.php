<?php include "includes/header.php"; ?>

<script type="text/javascript">
	$(document).ready(function () {
		$('#catcherform').validationEngine({ promptPosition: "bottomLeft", scroll: false });
	});
	$(document).ready(function () {
		$('#fieldingform').validationEngine({ promptPosition: "bottomLeft", scroll: false });
	});
	$(document).ready(function () {
		$('#firstbaseform').validationEngine({ promptPosition: "bottomLeft", scroll: false });
	});
	$(document).ready(function () {
		$('#softballform').validationEngine({ promptPosition: "bottomLeft", scroll: false });
	});
	
</script>

</div><!--header-->
	<div class="clear"></div><!--clear-->
    	<div class="main_body">
        <div class="clear"></div><!--clear-->
    <div class="container">
        <div class="main_content">
        	
      
        	<div class="select_glovetype">
                	<label><input type="radio" name="select_type" id="glove_type" value="Ground Out Series" checked="checked" />Ground Out	Series</label>
            		<label><input type="radio" name="select_type" id="glove_type" value="Line Out Series" >Line	Out	Series</label>
            </div><!--select_glovetype-->
            
        <div class="clear"></div><!--clear-->
            <div class="design_glove">
            	<div class="glove_types_select">
				<div class="glove_products">
                		
                        
                        
                         <?php 
							$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='34'");
							$result=mysql_fetch_array($query);
							?>
							 <div class="pro_img"><img alt="" src="<?php echo $base_url.$result['image']; ?>" /></div><!--pro_img-->
                    	<h3><?php echo $result['name']; ?></h3>
                        <?php echo $result['description']; ?>
                        <a href="javascript:void(0)">View Detail</a>
                            <div class="glove_type">
                            	
								<form action="catcher_design.php" name="catcherform" id="catcherform" method="POST" >
                                
                                    <input type="hidden" name="catcherglovetype" id="catcherglovetype" value="">
                                    <input type="hidden" name="glovename" id="glovename" value="Catcher">
                                
								<?php 
								$query=mysql_query('SELECT * FROM option_title WHERE prod_id="34"');
								while($res=mysql_fetch_array($query))
								{
									?>
                                    	<h3><?php echo $res['title']; ?></h3>
                                        
                                        <?php 
											$querys=mysql_query('SELECT * FROM sub_option WHERE option_title_id="'.$res['option_title_id'].'"');
											while($ress=mysql_fetch_array($querys))
											{
												?>
                                                <label><input type="radio" name="<?php echo $res['option_title_id']; ?>" value="<?php echo $ress['sub_option_id']; ?>" class="validate[required]" /><?php  echo $ress['options']; ?></label>
                                    			<?php
											}
										?>
                                        <?php
								}
								?>
                                <input type="submit" value="Glove Builder" name="catchersubmit">
                                </form>    
                               
                            </div><!--glove_type-->
                        </div><!--glove_products-->
                        
                        
                        
                        
                        
                        
                         
                         <?php 
							$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='35'");
							$result=mysql_fetch_array($query);
							?>
                        <div class="glove_products">
                	<div class="pro_img"><img alt="" src="<?php echo $base_url.$result['image'] ?>" /></div><!--pro_img-->
                    	<h3><?php echo $result['name']; ?></h3>
                        <?php echo $result['description']; ?>
                        <a href="javascript:void(0)">View Detail</a>
                            <div class="glove_type">
                            	
                                
                                <form action="fielding_glove.php" name="fieldingform" id="fieldingform" method="POST" >
                                
                                    <input type="hidden" name="fieldingglovetype" id="fieldingglovetype" value="">
                                    <input type="hidden" name="glovename" id="glovename" value="Fielding">
                                
								<?php 
								$query=mysql_query('SELECT * FROM option_title WHERE prod_id="35"');
								while($res=mysql_fetch_array($query))
								{
									?>
                                    	<h3><?php echo $res['title']; ?></h3>
                                        
                                        <?php 
											$querys=mysql_query('SELECT * FROM sub_option WHERE option_title_id="'.$res['option_title_id'].'"');
											while($ress=mysql_fetch_array($querys))
											{
												?>
                                                <label><input type="radio" name="<?php echo $res['option_title_id']; ?>" value="<?php echo $ress['sub_option_id']; ?>" class="validate[required]" /><?php  echo $ress['options']; ?></label>
                                    			<?php
											}
										?>
                                        <?php
								}
								?>
                                <input type="submit" value="Glove Builder" name="fieldsubmit">
                                </form>    
                                
                                
                            </div><!--glove_type-->
                        </div><!--glove_products-->
                         
                         
                        
                        
                         <?php 
							$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='37'");
							$result=mysql_fetch_array($query);
							?>
                        <div class="glove_products">
                	<div class="pro_img"><img alt="" src="<?php echo $base_url.$result['image'] ?>" /></div><!--pro_img-->
                    	<h3><?php echo $result['name']; ?></h3>
                        <?php echo $result['description']; ?>
                        <a href="javascript:void(0)">View Detail</a>
                            <div class="glove_type">
                            	
                                <form action="first_base_glove.php" name="firstbaseform" id="firstbaseform" method="POST" >
                                
                                    <input type="hidden" name="firstbaseglovetype" id="firstbaseglovetype" value="">
                                    <input type="hidden" name="glovename" id="glovename" value="First Base">
                                
								<?php 
								$query=mysql_query('SELECT * FROM option_title WHERE prod_id="37"');
								while($res=mysql_fetch_array($query))
								{
									?>
                                    	<h3><?php echo $res['title']; ?></h3>
                                        
                                        <?php 
											$querys=mysql_query('SELECT * FROM sub_option WHERE option_title_id="'.$res['option_title_id'].'"');
											while($ress=mysql_fetch_array($querys))
											{
												?>
                                                <label><input type="radio" name="<?php echo $res['option_title_id']; ?>" value="<?php echo $ress['sub_option_id']; ?>" class="validate[required]" /><?php  echo $ress['options']; ?></label>
                                    			<?php
											}
										?>
                                        <?php
								}
								?>
                                <input type="submit" value="Glove Builder" name="firstbasesubmit">
                                </form>
                                
                                
                            </div><!--glove_type-->
                        </div><!--glove_products-->
                        
                        
                        
                         <?php 
							$query=mysql_query("SELECT * FROM products WHERE item_status=1 AND prod_id='36'");
							$result=mysql_fetch_array($query);
							?>
                        
                        <div class="glove_products">
                	<div class="pro_img"><img alt="" src="<?php echo $base_url.$result['image']; ?>" /></div><!--pro_img-->
                    	<h3><?php echo $result['name']; ?></h3>
                        <?php echo $result['description']; ?>
                        <a href="javascript:void(0)">View Detail</a>
                            <div class="glove_type">
                            
                            <form action="soft_base.php" name="softballform" id="softballform" method="POST" >
                                
                                    <input type="hidden" name="softballglovetype" id="softballglovetype" value="">
                                    <input type="hidden" name="glovename" id="glovename" value="Softball">
                                
								<?php 
								$query=mysql_query('SELECT * FROM option_title WHERE prod_id="36"');
								while($res=mysql_fetch_array($query))
								{
									?>
                                    	<h3><?php echo $res['title']; ?></h3>
                                        
                                        <?php 
											$querys=mysql_query('SELECT * FROM sub_option WHERE option_title_id="'.$res['option_title_id'].'"');
											while($ress=mysql_fetch_array($querys))
											{
												?>
                                                <label><input type="radio" name="<?php echo $res['option_title_id']; ?>" value="<?php echo $ress['sub_option_id']; ?>" class="validate[required]" /><?php  echo $ress['options']; ?></label>
                                    			<?php
											}
										?>
                                        <?php
								}
								?>
                                <input type="submit" value="Glove Builder" name="softballsubmit">
                                </form>
                            
                            
                            </div><!--glove_type-->
                        </div><!--glove_products-->
                        
                        
                        </div><!--glove_types_select-->
                        
                </div><!--design_glove-->
        <div class="clear"></div><!--clear-->
            </div><!--main_content-->
                </div><!--container-->
            </div><!--main_body-->
        <div class="clear"></div><!--clear-->
            
<?php include "includes/footer.php"; ?>
