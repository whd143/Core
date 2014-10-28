<?php include("include/header.php"); 
$slider_id = $_REQUEST['slider_id'];
error_reporting(0);
?>

<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/FileUpload.js"></script>
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
<script type="text/javascript" src="tinymce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : 'tinymce/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,imagemanager",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,insertimage",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
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
						if($_REQUEST['submit'])
						{
						$title = $_REQUEST['title'];
						$description = $_REQUEST['description'];
						//$temp = $_FILES[$fieldname]['tmp_name'];
						//echo $temp;
						$file = $_FILES["file"]["name"];
						$slider_id = $_REQUEST['slider_id'];
						
						?>
						<?php
						if($file)
						{
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
							  //echo "Stored in: " . "../upload/" . $_FILES["file"]["name"]."<br />";
							  ?>
							   <div class="alert alert-success">
									<button class="close" data-dismiss="alert"></button>
									 <strong>Success ! </strong>
									Your record has been updated successfuly . . . . .
							   </div>
							  <?php
							  }
							  $imgpath = "upload/".$_FILES["file"]["name"];
							  
							mysql_query('UPDATE slider SET name="'.$title.'", description="'.$description.'", image="'.$imgpath.'" WHERE slider_id="'.$slider_id.'"');
							
						  } 	
						  else
						  {
						  ?>
						  <div class="alert alert-danger">
								<button class="close" data-dismiss="alert"></button>
								 <strong>Error ! </strong>
								 <?php  echo "Invalid file"; ?>
						   </div>
						  <?php
						  }
						}
						else	
							{
							mysql_query('UPDATE slider SET name="'.$title.'", description="'.$description.'" WHERE slider_id="'.$slider_id.'"');
							?>
							   <div class="alert alert-success">
									<button class="close" data-dismiss="alert"></button>
									 <strong>Success ! </strong>
									 Your record has been successfuly edited . . . . .
							   </div>
							<?php 
							}
						}
						?> 
                        
                        
                        
                         <?php 
								$query = mysql_query("SELECT * FROM slider WHERE slider_id='$slider_id'");
								while($res = mysql_fetch_array($query))
								{
								?>
                        <form action="" id="validate" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                                <legend>Edit slider information</legend>
                                <div class="control-group">
                                    <label class="control-label" for="name">Title : </label>
                                    <div class="controls">
                                        
                                       
                                       <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" name="title" id="name" value="<?php echo $res['name']; ?>"  maxlength="80" /><span style="color:red;"> * </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">Description :</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="description" id="email" value="<?php echo $res['description']; ?>" maxlength="80" /><span style="color:red;"> * </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                <div class="controls">
                                	<img src="<?php echo $base_url.$res['image'];?>" style="height:100px !important;margin:0px 0 22px 0; width:auto !important; "/>
                                </div>
                                <div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                      	<label class="control-label" for="message" >Upload file:</label>	
                                         <div class="controls">
                                        <div class="input-append">
                                            <p style="color:#000;font-size:12px;margin-top:9px;">Recomended resolution (371 X 376)</p>
                                        	<input type="file" name="file" id="file" allowedWidth="371" allowedHeight="376" />
                                            
                                        </div>
                                         <div id="uploadPreview" style="color:red;"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="submit" onclick="return !hasError;">Submit</button>
                                    <a href="slider.php">Back</a>
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

