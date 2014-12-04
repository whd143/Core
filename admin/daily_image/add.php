<?php
$include_prefix = '../../../';
include $include_prefix . "include/header.inc.php";

if (!isset($_REQUEST['daily_image_id'])) {
    header('LOCATION: ' . $base_url . '/daily_image');
}
/**
 * form submit action
 */
if (isset($_POST['submit'])) {

    $daily_image_id = isset($_POST['daily_image_id']) ? $_POST['daily_image_id'] : null;
    $publish_on = isset($_POST['publish_on']) ? $_POST['publish_on'] : 1;
    $display_order = isset($_POST['display_order']) ? $_POST['display_order'] : 0;
    $query = <<<HDOC
                    INSERT INTO  `daily_image` (`daily_image_id`,`display_order`,`publish_on`,`created_by`,`modified_by`,`created_on`) 
                    VALUES('{$sql->real_escape_string($daily_image_id)}','{$sql->real_escape_string($display_order)}','{$sql->real_escape_string($publish_on)}','{$_SESSION['id']}','{$_SESSION['id']}',NOW()) 
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    } else {
        /**
         * Last inserted id
         */
        $daily_image_id = $sql->insert_id;
        /**
         * Now Upload Files
         */
        $post_destination_path = '/public/daily_images/' . $_REQUEST['daily_image_id'];
        $destination = $_SERVER['DOCUMENT_ROOT'] . $post_destination_path;
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        if (!empty($_FILES['uri']['name']) && $_FILES['uri']['error'] == 0) {

            $file_new_name = time() . retrieveFileExtension($_FILES['uri']['type']);
            if (!move_uploaded_file($_FILES['uri']['tmp_name'], $destination . '/' . $file_new_name)) {
                exit('Unknown error occured while uploading file');
            }

            $uri = getBaseURI() . $post_destination_path . '/' . $file_new_name;
            $query = <<<HDOC
                    UPDATE  `daily_image` 
                    SET 
                        `uri_original_name` =  '{$_FILES["uri"]["name"]}',
                        `uri` =  '$uri'  
                    WHERE `daily_image_id`  = $daily_image_id
HDOC;
            if ($sql->query($query) == FALSE) {
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
        }

        if (!empty($_FILES['thumb']['name']) && $_FILES['thumb']['error'] == 0) {

            $file_new_name = time() . retrieveFileExtension($_FILES['thumb']['type']);
            if (!move_uploaded_file($_FILES['thumb']['tmp_name'], $destination . '/' . $file_new_name)) {
                exit('Unknown error occured while uploading file');
            }

            $thumb = getBaseURI() . $post_destination_path . '/' . $file_new_name;
            $query = <<<HDOC
                    UPDATE  `daily_image` 
                    SET 
                        `thumb_original_name` =  '{$_FILES["thumb"]["name"]}',
                        `thumb` =  '$thumb'  
                    WHERE `daily_image_id`  = $daily_image_id
HDOC;
            if ($sql->query($query) == FALSE) {
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
        }
    }
    $_SESSION['success_message'] = ' Record has been added successfully.';
    header('LOCATION: index.php?daily_image_id=' . $_REQUEST['daily_image_id']);
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Daily Images Management</div>
                    <div class="panel-content">
                        <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            <input type="hidden" value="<?php echo $_REQUEST['daily_image_id']; ?>" name="daily_image_id" id="daily_image_id" />
                            <fieldset>

                                <legend>Add Daily Image</legend>

                                <div class="control-group">
                                    <label class="control-label" for="publish_on">Publish Date : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" title="Choose publish date" id="publish_on" name="publish_on" value="<?php echo date('Y-m-d'); ?>" />
                                        <span class="mandatory"> * </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="display_order">Display Order : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge " title="Enter daily_image display order" id="display_order" name="display_order" value="" maxlength="11" />
                                        <span class="mandatory"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <label class="control-label" for="message" >Large Image:</label>	
                                        <div class="controls">
                                            <div class="input-append">
                                                <p style="color:#000;font-size:12px;margin-top:9px;">Recommended resolution (371 X 376)</p>
                                                <input type="file" name="uri" id="uri" allowedWidth="371" allowedHeight="376" />
                                            </div>
                                            <div id="uploadPreview" class="mandatory"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <label class="control-label" for="message" >Small Image:</label>	
                                        <div class="controls">
                                            <div class="input-append">
                                                <p style="color:#000;font-size:12px;margin-top:9px;">Recommended resolution (371 X 376)</p>
                                                <input type="file" name="thumb" id="thumb" allowedWidth="371" allowedHeight="376" />
                                            </div>
                                            <div id="uploadPreview" class="mandatory"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="publish_on">Status :</label>
                                    <div class="controls">
                                        <input type="radio" id="active" name="publish_on"  value="1" checked />&nbsp;Active 
                                        <br />
                                        <input type="radio" id="inactive" name="publish_on"  value="0" />&nbsp;Inactive
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" title="Click to add new record" id="submit" name="submit">Add</button>
                                    <a href="<?php echo $base_url; ?>/daily_image">Cancel</a>
                                </div>

                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($include_prefix)) {
    require_once $include_prefix . 'include/footer.inc.php';
} else {
    require_once 'include/footer.inc.php';
}
?>