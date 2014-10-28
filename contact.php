<?php include "includes/header.php"; 
error_reporting(0);
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
                        	<div class="contact_content">
                           	  <h2>Contact</h2>	
                             
                             
                             <div class="contact_left">
                             
                             
                             <?php 
							 	$query=mysql_query('SELECT * FROM contact WHERE cont_id=1');
							 	$result=mysql_fetch_array($query);
                                echo $result['description'];
							 	?>
                             	<h4>General</h4>
                                <a href="mailto:<?php echo $result['general']; ?>"><?php echo $result['general']; ?></a>
                                <h4>Support &amp; Product Usage</h4>
                             	<a href="mailto:<?php echo $result['support']; ?>"><?php echo $result['support']; ?></a>
								<?php
							 ?>
                             
                            
                             
                             </div><!--contact_left-->
                             
                             <div class="contact_form">
                             <p>If you have any comments or suggestions please fill out the following form.</p>
                             	
                                
                                <?php 
									if(isset($_REQUEST['submit']))
									{
										$to="ahsanghias4@gmail.com";
										$name = $_REQUEST['name'];
										$email = $_REQUEST['email'];
										$subject = $_REQUEST['subject'];
										$respond = "Respond Your Email";
										$information = $_REQUEST['info'];
										$message = "Name: $name\n"

									  ."Email: $email\n"
								  
									  ."Message: $information";
										
										mail($to,$subject,$message);	
										
										mail($name,$respond,$message);
																		
										
										
										
										
									?>
                                    <script type="text/javascript">
										alert("Your email has been sent");
										 window.location.assign("<?php echo $base_url."contact.php" ?>");
                                    </script>
                                    <?php	
										
									}
								?>
                                
                                
                                <form action="" id="contact" name="contact">
                                	<fieldset>
                                    	<input type="text" placeholder="Name" name="name" class="validate[required,custom[onlyLetterNumberHyphen]]" />
                                    	<input type="text" placeholder="Email" name="email"  class="validate[required,custom[email]]" />
                                    	<input type="text" placeholder="Subject" name="subject" class="validate[required]" />
                                    	<textarea role="5" cols="5" placeholder="Message" name="info"></textarea>
                                        <input type="submit" value="Send" name="submit">
                                    </fieldset>
                                </form>
                                
                             </div><!--contact_form-->
                             
                        	
                            
                          </div><!--contact_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->
            	
<?php include "includes/footer.php"; ?>
