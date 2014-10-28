<?php include("include/header.php"); 
$prod_id = $_REQUEST['prod_id'];
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
                    <div class="panel-header"><i class="icon-tasks"></i> Add options</div>
                    <div class="panel-content">
                        
                        
                        <?php   
						if($_REQUEST['submit'])
						{
						$date=date("Ymd");
						$name = $_REQUEST['name'];
						$op=$_REQUEST['option'];
						mysql_query('INSERT INTO option_title (prod_id,title,date_created) VALUES ("'.$prod_id.'","'.$name.'","'.$date.'")');
						$id=mysql_insert_id();
						$record=explode(',',$op);
						
						foreach($record as $value)
						{
							mysql_query('INSERT INTO sub_option (option_title_id,options) VALUES ("'.$id.'","'.$value.'")');
							}
						
						?>
                       <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"></button>
                             <strong>Success! </strong>
                             Your record has been added successfuly . . . . .
                       </div>
                        <?php
							
						}
						?> 
                       
                          
                        <form id="validate" action="" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                               
                                <div class="control-group">
                                    <label class="control-label" for="email">Title :</label>
                                    <div class="controls">
                                       <input type="text" class="input-xlarge  validate[required]" name="name" id="name" placeholder="Add title" /> <span style="color:red;"> * </span>
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label" for="email">Options :</label>
                                    <div class="controls">
                                       <input type="text" class="input-xlarge  validate[required]" name="option" id="option" placeholder="Add options" /> <span style="color:red;"> * </span>
                                    </div>
                                     <div class="controls" style="margin-top:10px;color:Red;">
                                      	Please add the values with ( , ) seperated
                                      </div>
                                </div>
                                
                                
                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                                    <a href="social.php">Back</a>
                                </div>
                               
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

