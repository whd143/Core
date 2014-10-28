<?php include("include/header.php"); 
$social_id = $_REQUEST['social_id'];
error_reporting(0);
?>


<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript">
var jq = $.noConflict();
	jq(document).ready(function () {
		jq('#validate').validationEngine({ promptPosition: "bottomLeft", scroll: false });
		//{promptPosition : "centerRight", scroll: false}
	});
</script>


<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Social Links</div>
                    <div class="panel-content">
                        
                        
                        <?php   
						if($_REQUEST['submit'])
						{
						$link = $_REQUEST['link'];
						?>
							   <div class="alert alert-success">
									<button class="close" data-dismiss="alert"></button>
									 <strong>Success! </strong>
                                     Your record has been updated successfuly . . . . .
							   </div>
							  <?php
							mysql_query('UPDATE social SET links="'.$link.'" WHERE social_id="'.$social_id.'"');
							
						}
						?> 
                       
                        
                        
                         <?php 
								$query = mysql_query("SELECT * FROM social WHERE social_id=$social_id");
								while($res = mysql_fetch_array($query))
								{
								?>
                        <form id="validate" action="" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                                <legend>Edit <?php echo $res['name']; ?> link</legend>
                                
                                <div class="control-group">
                                    <label class="control-label" for="email">Link :</label>
                                    <div class="controls">
                                       <input type="text" class="input-xlarge  validate[required]" name="link" id="link" value="<?php echo $res['links']; ?>" /> <span style="color:red;"> * </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                
                                <div>
                                </div>
                                   
                                </div>
                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                                    <a href="social.php">Back</a>
                                </div>
                                <?php
                                }
								?>
                            </fieldset>
                        </form>
                        <!-- Datepicker -->
                       
                       
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php"); ?>

