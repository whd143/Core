<?php
$include_prefix = '../../../';
include $include_prefix . "include/header.inc.php";

if (!isset($_REQUEST['article_id'])) {
    header('LOCATION: ' . $base_url . '/article/posts');
}
/**
 * form submit action
 */
if (isset($_POST['submit'])) {

    $article_id = isset($_POST['article_id']) ? $_POST['article_id'] : null;
    $title_en = isset($_POST['title_en']) ? $_POST['title_en'] : null;
    $title_ur = isset($_POST['title_ur']) ? $_POST['title_ur'] : null;
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 1;
    $display_order = isset($_POST['display_order']) ? $_POST['display_order'] : 0;
    $query = <<<HDOC
                    INSERT INTO  `article_image` (`article_id`,`title_en`,`title_ur`,`display_order`,`is_active`,`created_by`,`modified_by`,`created_on`) 
                    VALUES('{$sql->real_escape_string($article_id)}','{$sql->real_escape_string($title_en)}','{$sql->real_escape_string($title_ur)}','{$sql->real_escape_string($display_order)}','{$sql->real_escape_string($is_active)}','{$_SESSION['id']}','{$_SESSION['id']}',NOW()) 
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    } else {
        /**
         * Last inserted id
         */
        $article_image_id = $sql->insert_id;
        /**
         * Now Upload Files
         */
        $post_destination_path = '/public/images/' . $_REQUEST['article_id'];
        $destination = $_SERVER['DOCUMENT_ROOT'] . $post_destination_path;
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        if (!empty($_FILES['uri']['name']) && $_FILES['uri']['error'] == 0) {

            $file_new_name = time() . retrieveFileExtension($_FILES['uri']['type']);
            if (!move_uploaded_file($_FILES['uri']['tmp_name'], $destination . '/' . $file_new_name)) {
                exit('Unknown error occured while uploading file');
            }

            $uri = $post_destination_path . '/' . $file_new_name;
            $query = <<<HDOC
                    UPDATE  `article_image` 
                    SET 
                        `uri_original_name` =  '{$_FILES["uri"]["name"]}',
                        `uri` =  '$uri'  
                    WHERE `article_image_id`  = $article_image_id
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

            $thumb = $post_destination_path . '/' . $file_new_name;
            $query = <<<HDOC
                    UPDATE  `article_image` 
                    SET 
                        `thumb_original_name` =  '{$_FILES["thumb"]["name"]}',
                        `thumb` =  '$thumb'  
                    WHERE `article_image_id`  = $article_image_id
HDOC;
            if ($sql->query($query) == FALSE) {
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
        }
    }
    $_SESSION['success_message'] = ' Record has been added successfully.';
    header('LOCATION: index.php?article_id=' . $_REQUEST['article_id']);
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Article's Images Management</div>
                    <div class="panel-content">
                        <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            <input type="hidden" value="<?php echo $_REQUEST['article_id']; ?>" name="article_id" id="article_id" />
                            <fieldset>

                                <legend>Add Image</legend>

                                <div class="control-group">
                                    <label class="control-label" for="title_ur">Title (UR) : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article title in ur" id="title_ur" name="title_ur" value="" maxlength="255" />
                                        <span style="color:red;"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="title_en">Title (EN) : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article title in english" id="title_en" name="title_en" value="" maxlength="255" />
                                        <span style="color:red;"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="display_order">Display Order : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article display order" id="display_order" name="display_order" value="" maxlength="11" />
                                        <span style="color:red;"> * </span>
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
                                            <div id="uploadPreview" style="color:red;"></div>
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
                                            <div id="uploadPreview" style="color:red;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="is_active">Status :</label>
                                    <div class="controls">
                                        <input type="radio" id="active" name="is_active"  value="1" checked />&nbsp;Active 
                                        <br />
                                        <input type="radio" id="inactive" name="is_active"  value="0" />&nbsp;Inactive
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" title="Click to add new record" id="submit" name="submit">Add</button>
                                    <a href="<?php echo $base_url; ?>/article/posts">Cancel</a>
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