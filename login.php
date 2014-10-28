<?php include "includes/header.php"; ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('form').validationEngine({ promptPosition: "bottomLeft", scroll: false });
		//{promptPosition : "centerRight", scroll: false}
	});
</script>
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
                            	<h2>Login</h2>
                                <div id="login-fun-bg">
                                	<div class="login-fun">
                                    	
                                        
                                        
                                        <form action="" id="login">
	                                        <input type="text" placeholder="User Name (admin@groundoutgloves.com)" name="email" id="username" class="validate[required,custom[email]]">
	                                        <input type="password" placeholder="Password" name="password" id="password" class="validate[required]">
                                           <input type="submit" name="submit" id="submit" value="Login">
    									</form> 
                                        
                                        
                                        <?php
										
											if(isset($_REQUEST['submit']))
											{
												
												$email=$_REQUEST['email'];
												$password=$_REQUEST['password'];
												
												$userquery = mysql_query('SELECT * FROM members WHERE email like "'.$email.'" AND status=1');
												$res=mysql_fetch_array($userquery);
												$em=$res['email'];
												$loginuser=$res['name'];
												$loginid=$res['id'];
												$ps=$res['password'];
												
												if($email==$em && $password==$ps)
												{	
													$_SESSION['user']=array();
        											$_SESSION['user']['uname'] = $loginuser;
        											$_SESSION['user']['user_id'] = $loginid;
													?>
                                                    <script type="text/javaScript">
														setTimeout("location.href = '<?php echo $base_url."shoppingcart.php"; ?>';", 1500);
													</script>
                                                    <?php
												}
												else
												{
													?>
                                                    <p style="padding-top:10px;color:red;">Please enter valid credentials...</p>
                                                    <?php
												}
												
											}
										?>
                                                                           
                                    </div>
                                </div>
                                
                            
                          </div><!--about_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->

<?php include "includes/footer.php"; ?>