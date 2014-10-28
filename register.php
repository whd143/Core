<?php include "includes/header.php"; 

function getRandomString($length) 
	   {
    $validCharacters = "asd4f3jflh48d6j06hWZ7gsf5123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
	
	return $result;
	}
$code=getRandomString(32);
?>
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
                            	<h2>Register</h2>
                                <div id="login-fun-bg">
                                	<div class="login-fun">
                                    	
                                        <?php
										
											if(isset($_REQUEST['submit']))
											{
												
												$name=$_REQUEST['name'];
												$lastname=$_REQUEST['lastname'];
												$password=$_REQUEST['password'];
												$conf_password=$_REQUEST['conf_password'];
												$email=$_REQUEST['email'];
												$phone=$_REQUEST['phone'];
												$date=date("Ymd");
												$subject="GroundOutGloves - Please verify your email address";
												
												
												$userquery = mysql_query('SELECT email FROM members WHERE email like "'.$email.'" ');
												$res=mysql_fetch_array($userquery);
												$em=$res['email'];
												
												
												if($password!=$conf_password)

												{
										
															?>
										
															<p style="padding-top:10px;color:red;">
										
															<?php
										
															echo "Passwords do not match...";
										
															?>
										
															</p>
										
															<?php
										
												}
												
												else if($email==$em)

												{
													?>
										
													<p style="padding-top:10px;color:red;">
										
													<?php
										
													echo "This email already exists. Please try with another...";
										
													?>
										
													</p>
										
													<?php
										
												}
												
												
												
												else
												{
													mysql_query('INSERT into members (name, last_name, password, email, phone, token ,date) VALUES ("'.$name.'", "'.$lastname.'", "'.$password.'", "'.$email.'", "'.$phone.'", "'.$code.'" ,"'.$date.'")');
													
													?>
										
                                                    <p style="padding-top:10px;color:green;">
                                
                                                    <?php
                                
                                                    echo "Please check your inbox to confirm your registration...";
                                
                                                    ?>
                                
                                                    </p>
                                
                                                    <?php
													
													
													$message = '<html><body>';
													$message.='<table cellpadding="0" cellspacing="0" width="100%"><tr><td>';
													$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
													$message.='Dear&nbsp;'. $name.'&nbsp;'.$lastname.',<br /><br />';
													$message.='<p>We just need to verify your email address for registration process. Click on the following code for verification.</p>';
													$message.='<strong>Code: </strong> <span style="color:#006699;"><a href="'.$base_url."/activation.php?activationkey=".$code.'" style="text-decoration:none;">'.$code.'</a></span><br /><br /><br />';
													
													
													$message.='<table>
														<tr>
														<td>
														<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">Thank You</h3>
														<strong style="font:bold 12px Arial, Helvetica, sans-serif;">The GroundOutGloves Team</strong>
														<p style="font:normal 12px Arial, Helvetica, sans-serif; color:#ccc;">Please do not respond to this email. As this is the system generated email.</p>
														</td>
														</tr>
														
														</table>
														</td>
														</tr>
													</table>';
													
													
													$message.='</td></tr></table>';
													$message .= "</body></html>";
													$headers = "From: admin@groundoutgloves.com\r\n";
													$headers .= 'Cc: musa.raza4@gmail.com' . "\r\n";
													$headers .= "MIME-Version: 1.0\r\n";
													$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
													echo $message;
													//mail($email,$subject,$message,$headers);
													
													
												}
											}
										?>
                                        
                                        <form action="" id="register">
	                                        <input type="text" placeholder="First Name" name="name" id="name" class="validate[required,custom[onlyLetterNumberHyphen]]"><font style="color:red;float:right;margin-top:10px;">*</font>
	                                        <input type="text" placeholder="Last Name" name="lastname" id="lastname" class="validate[required,custom[onlyLetterNumberHyphen]]"><font style="color:red;float:right;margin-top:10px;">*</font>
	                                        <input type="text" placeholder="Email / Username" name="email" id="email" class="validate[required,custom[email]]"><font style="color:red;float:right;margin-top:10px;">*</font>
										    <input type="password" placeholder="Password" name="password" id="password" class="validate[required]"><font style="color:red;float:right;margin-top:10px;">*</font>
	                                        <input type="password" placeholder="Confirm Password" name="conf_password" id="conf_password" class="validate[required]"><font style="color:red;float:right;margin-top:10px;">*</font>
                                            <input type="text" placeholder="Phone No" name="phone" id="phone" class="validate[required,custom[number]]"><font style="color:red;float:right;margin-top:10px;">*</font>
                                            <input type="submit" name="submit" id="submit" value="Register">
    									</form>                                    
                                    </div>
                                </div>
                                
                            
                          </div><!--about_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->

<?php include "includes/footer.php"; ?>