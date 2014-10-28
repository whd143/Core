<?php 
include("include/header.php"); 
$seo_id = $_REQUEST['seo_id'];
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
                    <div class="panel-header"><i class="icon-tasks"></i> Search engine Optmization</div>
                    <div class="panel-content">
                        
                        
                        
                        <?php   
						if($_REQUEST['submit'])
						{
						$keywords = $_REQUEST['keywords'];
						$description = $_REQUEST['description'];
						?>
							   <div class="alert alert-success">
									 <strong>Success! </strong>
									 Your record has been updated successfuly . . . . .
							   			
                               </div>
							  <?php
							 
							  
							mysql_query('UPDATE seo SET keywords="'.$keywords.'", description="'.$description.'" WHERE id="'.$seo_id.'"');
							
						}
						?> 
                        
                         <?php 
								$query = mysql_query("SELECT * FROM seo WHERE id=$seo_id");
								while($res = mysql_fetch_array($query))
								{
								?>
                        <form id="validate" action="" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                                <legend>Edit <?php echo $res['page_name']; ?> page information</legend>
                                <div class="control-group">
                                    <label class="control-label" for="name">Keywords : </label>
                                    <div class="controls">
                                        
                                       
                                       <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" name="keywords" id="keywords" value="<?php echo $res['keywords']; ?>" maxlength="30" /><span style="color:red;"> * </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">Description :</label>
                                    <div class="controls">
                                    	 <textarea  name="description"  style="width:28%" class="validate[required]"><?php echo $res['description']; ?></textarea>
                                       
                                    </div>
                                </div>
                                <div class="control-group">
                                
                                <div>
                                </div>
                                   
                                </div>
                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                                    <a href="pages.php">Back</a>
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

