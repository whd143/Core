<?php include("include/header.php"); 
$user_id=$_REQUEST['user_id'];
?>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Your Profile</div>
                    <div class="panel-content">
                        
                        
                        	<?php 
								if(isset($_REQUEST['submit']))
								{
									$userstatus=$_REQUEST['userstatus'];
									mysql_query('UPDATE members SET status="'.$userstatus.'" WHERE id="'.$user_id.'"');
									
									?>
                                    <div class="alert alert-success">
                                         <strong>Success! </strong>
                                         Your record has been updated successfuly . . . . .
                                    </div>

                                    <?php
								}
							?>
                        
                        <?php 
								$query = mysql_query("SELECT * FROM members WHERE id=".$user_id);
								while($res = mysql_fetch_array($query))
								{
								?>
                        
                        
                        
                        <form id="table table-bordered dataTable" action="" id="example_form" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                                <legend>Registered member information: </legend>
                                
                                <div class="control-group">
                                    <label class="control-label" for="name">Name : </label>
                                    <div class="controls">
                                       <p style="margin-top:5px;"><?php echo $res['name']; ?></p>
                                    </div>
                                </div>
                                
                                
                                 <div class="control-group">
                                    <label class="control-label" for="name">Last name : </label>
                                    <div class="controls">
                                        <p style="margin-top:5px;"><?php echo $res['last_name']; ?></p>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="name">Email : </label>
                                    <div class="controls">
                                        <p style="margin-top:5px;"><?php echo $res['email']; ?></p>
                                    </div>
                                </div>
                                
                                 <div class="control-group">
                                    <label class="control-label" for="name">Phone : </label>
                                    <div class="controls">
                                        <p style="margin-top:5px;"><?php echo $res['phone']; ?></p>
                                    </div>
                                </div>
                                
                                 
                                
                                
                               <?php if($res['status']==1) 
							   {
							   ?>
                               <div class="control-group">
                                    <label class="control-label" for="name">Status : </label>
                                    <div class="controls">
                                        <p style="margin-top:5px;"> <input type="radio" name="userstatus" value="1" class="check" checked> Active </p>
                                         <p style="margin-top:5px;"><input type="radio" name="userstatus" value="0" class="check"> Inactive</p>
                                    </div>
                                </div>
                                <?php 
							   }
								?>
                                
                                
                                 <?php if($res['status']==0) 
							   {
							   ?>
                               <div class="control-group">
                                    <label class="control-label" for="name">Status : </label>
                                    <div class="controls">
                                        <p style="margin-top:5px;"> <input type="radio" name="userstatus" value="1" class="check" > Active </p>
                                         <p style="margin-top:5px;"><input type="radio" name="userstatus" value="0" class="check" checked> Inactive</p>
                                    </div>
                                </div>
                                <?php 
							   }
								?>
                                
                                
                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                </div>
                            </fieldset>
                        </form>
                        <!-- Datepicker -->
                       <?php 
								}
					   ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php"); ?>

