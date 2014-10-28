<?php include("include/header.php"); 
$option_id = $_REQUEST['option_title_id'];
$product_id = $_REQUEST['product_id'];
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
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1");
</script>
<!-- Load TinyMCE -->

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Options</div>
                    <div class="panel-content">
                        <?php $date=date("Ymd"); ?>
                        
                        <?php   
						if($_REQUEST['submit'])
						{
						$name = $_REQUEST['name'];
						$status = $_REQUEST['status'];
						$prevop=$_REQUEST['prevop'];
						$prevop_id=$_REQUEST['prevop_id'];
						
						mysql_query('UPDATE option_title SET title="'.$name.'",is_active="'.$status.'" WHERE option_title_id="'.$option_id.'"');
						
						$total = count($prevop);
						for($i=0; $i<=$total; $i++)
						{
							$name = $prevop[$i];
							$id = $prevop_id[$i];
							mysql_query('UPDATE sub_option SET options="'.$name.'" WHERE sub_option_id="'.$id.'"');
						}
						
						$newrecord=$_REQUEST['newrecord'];
						$comaseprated=explode(",",rtrim($newrecord,","));
						if($newrecord!="")
						{							
							foreach($comaseprated as $value)
							{
								mysql_query('INSERT INTO sub_option (option_title_id,options) VALUES ("'.$option_id.'","'.$value.'")');
							}
						}
						
					
						?>
						   <div class="alert alert-success">
								<button class="close" data-dismiss="alert"></button>
								 <strong>Success! </strong>
								 Your record has been successfuly updated . . . . .
						   </div>
						<?php 
						}
						?> 
                        
                        
                         <?php 
						 		$query = mysql_query('SELECT * FROM option_title WHERE option_title_id="'.$option_id.'" ');
								$res = mysql_fetch_array($query);
								?>
                        <form id="validate" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                               <legend>Edit option</legend>
                               <div class="control-group">
                                    <label class="control-label" for="email">Title :</label>
                                    <div class="controls">
                                       <input type="text" class="input-xlarge  validate[required]" name="name" id="name" value="<?php echo $res['title'];?>" placeholder="Add title" /> <span style="color:red;"> * </span>
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label" for="email">Options :</label>
                                    <div class="controls">
                                    	<?php 
										
											
											$querys=mysql_query('SELECT * FROM sub_option WHERE option_title_id="'.$option_id.'" order by sub_option_id');
											while($row=mysql_fetch_array($querys))
											{
												?>
                                                <div> 
                                                	<input type="hidden" class="input-xlarge  validate[required]" name="prevop_id[]"  value="<?php echo $row['sub_option_id']; ?>" />
                                    				<input type="text" class="input-xlarge  validate[required]" name="prevop[]"  value="<?php echo $row['options'] ?>" style="margin-bottom:10px;" /> 
                                                    <a onclick="deletesuboptionid('<?php echo $row['sub_option_id'];  ?>')" href="javascript:void(0);" style="width:100%;"><i class="icon-remove red"></i></a>
                                    				 <span style="color:red;"> * </span>
                                                </div>
												<?php
											}
										?>
                                    		
                                            <p style="margin-top:10px;">Add more options</p>
                                            <input type="text" class="input-xlarge" name="newrecord" placeholder="Add options" style="margin-bottom:10px;" /> <span style="color:red;"> * </span><br />
                                    	</div>
                                     <div class="controls" style="margin-top:10px;color:Red;">
                                      	Please add the values with ( , ) seperated
                                      </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label" for="name">Status: </label>
                                    <div class="controls">
                                    
                                    	<?php 
											if($res['is_active']==1)
											{
												?>
                                                 <input type="radio" name="status" checked="checked" value="1" > Active<br />
                                                 <input type="radio" name="status" value="0" /> Deactive
                                                <?php
											}
										?>
                                        
                                        <?php 
											if($res['is_active']==0)
											{
												?>
                                                 <input type="radio" name="status"  value="1" > Active<br />
                                                 <input type="radio" name="status" checked="checked" value="0" /> Deactive
                                                <?php
											}
										?>
                                    
                                      
                                    </div>
                                </div>
                                
                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="submit" onclick="return !hasError">Submit</button>
                                    <a href="view_products.php" >Back</button>
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

