<?php include("include/header.php"); ?>

<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/FileUploadgallery.js"></script>
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
			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "save,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext|,search,replace,|,bullist,numlist,|blockquote,|,undo,redo, anchor,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,",
			theme_advanced_buttons3 : "hr,sub,sup",
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

<div class="adj">
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
				
                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Gallery</div>
                    <div class="panel-content">
                        
                        <?php $date=date("Ymd"); ?>
                        
                        <?php			   
							if(isset($_REQUEST['submit'])) 
							{ 
							$title= $_REQUEST['title'];
							$description = mysql_real_escape_string($_REQUEST['description']);
							$price = $_REQUEST['price'];
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
										 <strong>Success! </strong>
										 Your record has been updated successfuly . . . . .
								   </div>
								  <?php
								  //echo "Stored in: " . "../upload/" . $_FILES["file"]["name"]."<br />";
								  
								  $imgpath = "upload/".$_FILES["file"]["name"];
								  mysql_query('INSERT INTO products(name,description,image,price,item_status,date,glove_made_type) VALUES ("'.$title.'","'.$description.'","'.$imgpath.'","'.$price.'", "1", "'.$date.'","system")');
								 }
							  }
							}
							?>    
                       
                        
                        <form id="validate" action="" id="example_form" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>
                                
                                <legend>Add new item</legend>
                                
                                
                                <div class="control-group">
                                    <label class="control-label" for="name">Title : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" name="title" id="name" maxlength="40" /><span style="color:red;"> * </span>
                                    </div>
                                </div>
                                
                               
                                <div class="control-group">
                                    <label class="control-label" for="email">Description :</label>
                                    <div class="controls">
                                       <textarea id="elm1" name="description" rows="15" cols="80" style="width: 80%" class="tinymce">Your content here.</textarea>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="name">Price : </label>
                                    <div class="controls">
                                       $ <input type="text" class="input-xlarge validate[required,custom[number]]" name="price" id="price" maxlength="10" /><span style="color:red;"> * </span>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                      	<label class="control-label" for="message" >Upload file:</label>	
                                         <div class="controls">
                                        <div class="input-append">
                                            <p style="color:#000;font-size:12px;margin-top:9px;">Recomended resolution (Less than 170 X 126)</p>
                                        	<input class="validate[required]" type="file" name="file" id="file" allowedWidth="170" allowedHeight="126" />
                                            
                                        </div>
                                         <div id="uploadPreview" style="color:red;"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button  type="submit" class="btn btn-success" name="submit" value="Submit" onClick="return !hasError;">Submit</button>
                                     <a href="subcat_products.php">Back</a>
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
</div>
<?php include("include/footer.php"); ?>

