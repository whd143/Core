<?php include("include/header.php"); ?>
<script type="text/javascript" src="./js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="./js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/FileUpload.js"></script>
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
                    <div class="panel-header"><i class="icon-tasks"></i> Slider</div>
                    <div class="panel-content">
                        
                        <?php			   
							if(isset($_REQUEST['submit'])) 
							{ 
							$title = $_REQUEST['title'];
							$description= $_REQUEST['description'];
							?>
							<?php
							$allowedExts = array("gif", "jpeg", "jpg", "png");
							$temp = explode(".", $_FILES["file"]["name"]);
							$extension = end($temp);
							if ((($_FILES["file"]["type"] == "image/gif")
							|| ($_FILES["file"]["type"] == "image/jpeg")
							|| ($_FILES["file"]["type"] == "image/jpg")
							|| ($_FILES["file"]["type"] == "image/pjpeg")
							|| ($_FILES["file"]["type"] == "image/x-png")
							|| ($_FILES["file"]["type"] == "image/png"))
							&& ($_FILES["file"]["size"] < 200000000)
							&& in_array($extension, $allowedExts))
							  {
							  if ($_FILES["file"]["error"] > 0)
								{
								echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
								}
							  else
								{
								  move_uploaded_file($_FILES["file"]["tmp_name"],
								  "../upload/" . $_FILES["file"]["name"]);
								  ?>
								   <div class="alert alert-success">
										<button class="close" data-dismiss="alert"></button>
										 <strong>Success! </strong>
										 Your record has been updated successfuly . . . . .
								   </div>
								  <?php
								  //echo "Stored in: " . "../upload/" . $_FILES["file"]["name"]."<br />";
								  
								  $imgpath = "upload/".$_FILES["file"]["name"];
								  mysql_query('INSERT INTO slider(name,description,image) VALUES ("'.$title.'","'.$description.'","'.$imgpath.'")');
								}
								?>
								
								<?php
							  } 	
							  else
							  {
								?>
                                <div class="alert alert-error">
								   
								  <strong>Error ! </strong>
								  Invalid file . . . . .
								  </div>
                                <?php
							  }
							?> 
							<?php 
							}
							?>  
                        
                        <form id="validate" action="" id="example_form" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                                <legend>Add slider Information</legend>
                                <div class="control-group">
                                    <label class="control-label" for="name">Title : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" name="title" id="name" maxlength="80" /><span style="color:red;"> * </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">Description</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="description" id="email" maxlength="80" />
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                      	<label class="control-label" for="message" >Upload file:</label>	
                                         <div class="controls">
                                        <div class="input-append">
                                            <p style="color:#000;font-size:12px;margin-top:9px;">Recomended resolution (371 X 376)</p>
                                        	<input class="validate[required]" type="file" name="file" id="file" allowedWidth="371" allowedHeight="376" />
                                            
                                        </div>
                                         <div id="uploadPreview" style="color:red;"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="Submit" onClick="return !hasError;">Submit</button>
                                   
                                </div>
                            </fieldset>
                        </form>
                        <!-- Datepicker -->
                       
                         
                       
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Slider preview</div>
                    <div class="panel-content">
                        <div class="bord" id="slid">
                        <table width="100%" height="100%" border="1" style="text-align:center;">
                        	<tr>
	                        	<td><strong>Title: </strong></td>
                            	<td><strong>Description:</strong> </td> 
                            	<td><strong>Image:</strong> </td> 
                                <td><strong>Edit | Delete</strong></td>
                            </tr>
                            	
                                <?php 
								$query = mysql_query("SELECT * FROM slider");
								while($res = mysql_fetch_array($query))
								{
								?>
                            	<tr>
                                    <td><?php echo $res['name']; ?></td>
                            		<td>
									<?php $desc=$res['description']; 
										if($desc=="")
										{
											echo "There is no description in this slider";
										}
										else
										{
											echo $desc;
										}
									?>
                                    
                                    </td>
                                	<td><img src="<?php echo $base_url.$res['image']; ?>" style="width:100px;height:auto;margin:10px 0;" /></td>
                                	<td>
                                    
                                    <a href="edit_slider.php?slider_id=<?php echo $res['slider_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                    | 
                                    <a href="#" onClick="slider('<?php echo $res['slider_id']; ?>')"> <i class="icon-remove red"></i></a>
                                    
                                    
                                    </td>
                                    
                                </tr>
								<?php
                                }
								
								?>
                            	
                        </table>
                       
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php"); ?>

