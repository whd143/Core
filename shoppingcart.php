<?php
	ob_start();
	include "includes/header.php";
	include "includes/cart.php";
	if($_REQUEST['command']== "saveorder")
	{
			if(!isset($_SESSION['user']))
			{
				header("location:login.php");
			}
			
			header("location:creditcard.php");
			  
	}
	
	$msg=$cart->msg;
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
                            
                            	<h2>Shopping cart</h2>
                            	
                                <form name="form2" method="post"  onsubmit="return valid()">
                                    <input type="hidden" name="pid" />
                                    <input type="hidden" name="command" />
    
                                                <div class="shopingbg">
                                                     <?php
                                                    if(is_array($_SESSION['cart']))
                                                    {
														?>
														
                                                        <table width="100%" >
                                                        
                                                        <tr>
                                                            <td><strong>#</strong></td>
                                                            <td><strong>Title</strong></td>
                                                            <td><strong>Unit Price</strong></td>
                                                            <td><strong>Qty</strong></td>
                                                            <td><strong>Amount</strong></td>
                                                            <td><strong>Remove</strong></td>
                                                        </tr>  
                                                        
                                                        <?php
                                                        $max=count($_SESSION['cart']);
                                                        for($i=0;$i<$max;$i++){
                                                        $pid=$_SESSION['cart'][$i]['productid'];
                                                        $q=$_SESSION['cart'][$i]['qty'];
                                                        $pname=get_product_name($pid);
                                                        if($q==0) continue;
                                                    	?>
                                                   		<tr>
                                                        	<td><div style="height:20px;"></div></td>
                                                        </tr>
                                                        <tr class="adj">
                                                            <td><?php echo $i+1?></td>
                                                            <td><?php echo $pname?></td>
                                                            <td>$<?php echo number_format( get_price($pid), 2 ,'.',',');?></td>
                                                            <td><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2"  /></td>                    
                                                            <td>$<?php echo number_format( get_price($pid)*$q, 2 ,'.',',');?></td>
                                                            <td><a href="javascript:del(<?php echo $pid?>)"><img src="images/cross.png" style="width:14px;height:auto;"></a></td></tr>
                                                        <?php					
                                                            }
                                                     
                                                     ?>
                                                    </table>
                                                    <div class="shopbtn-bg">
                                                        <div class="shopbtns">
                                                            <!--<input type="button" value="Clear Cart" onclick="clear_cart()" class="clearcart" >-->
                                                            <a href="javascript:void(0)" class="clearcart" onclick="clear_cart()" class="updatecart">Clear Cart</a>
                                                         
															<?php 
                                                            if(isset($_SESSION['user']))
                                                            {
                                                           ?>
                                                            <input type="submit" value="Proceed to Checkout" class="checkoutcart">
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                             <a href="login.php" class="checkoutcart">Proceed to Checkout</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                            <!--<input type="button" value="Update Cart" onclick="update_cart()" class="updatecart">-->
                                                            <a href="javascript:void(0)" class="checkoutcart" onclick="update_cart()" class="updatecart">Update Cart</a>
                                                         </div>
                                                         
                                                         <div class="totalprice">
                                                            <h1>Order Total</h1> 
                                                            <p>$<?php echo number_format( get_order_total(), 2 ,'.',',');?></p>
                                                            <?php 
																$_SESSION['totalprice']=get_order_total();
															?>
                                                            <a href="<?php echo $base_url."gallery.php"; ?>" class="cnt-shop">Continue shopping</a>
                                                         </div>
                                                         
                                                     </div>
                                                    <?php 
                                                    }
                                                    else{
                                                     
                                                     ?>
                                                     <div style="text-align:center"><img src="images/empty.gif"></div>
                                                     <?php
                                                    
                                                    }
                                                    ?>
                                                </div>
      									</form>
										
                                
                            
                          </div><!--about_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->
            
<?php include "includes/footer.php"; ?>