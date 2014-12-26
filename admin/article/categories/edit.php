<?php
$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";


/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : 0;
    $title_en = isset($_POST['title_en']) ? $_POST['title_en'] : 'anonymous' . rand(1, 2000);
    $slug = str_replace(' ', '_', strtolower($title_en) . '.html');
    $title_ur = isset($_POST['title_ur']) ? $_POST['title_ur'] : '';
    $show_as_menu = isset($_POST['show_as_menu']) ? $_POST['show_as_menu'] : 1;
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 1;
    $query = <<<HDOC
                    UPDATE  `category` 
                    SET 
                        `slug`  = '{$sql->real_escape_string($slug)}',
                        `title_en` =  '{$sql->real_escape_string($title_en)}',
                        `title_ur` =  '{$sql->real_escape_string($title_ur)}',
                        `show_as_menu` =  '{$sql->real_escape_string($show_as_menu)}',
                        `is_active` =  '{$sql->real_escape_string($is_active)}',
                        `modified_by` =  '{$_SESSION['id']}'  
                    WHERE `category_id`  = '{$sql->real_escape_string($category_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }

    /**
     * Now Upload Files
     */
    $post_destination_path = '/public/images/category/icon/' . $category_id;
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/demo' . $post_destination_path;

    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    if (!empty($_FILES['icon']['name']) && $_FILES['icon']['error'] == 0) {

        //remove old file
        if (!is_null($_POST['hidden_icon']) && !empty($_POST['hidden_icon'])) {
            @unlink($destination . '/demo' . $_POST['hidden_icon']);
        }

        $file_new_name = time() . retrieveFileExtension($_FILES['icon']['type']);
        if (!move_uploaded_file($_FILES['icon']['tmp_name'], $destination . '/' . $file_new_name)) {
            exit('Unknown error occured while uploading file');
        }

        $icon_relative_path = $post_destination_path . '/' . $file_new_name;
        $query = <<<HDOC
                    UPDATE  `category` 
                    SET 
                        `icon` =  '$icon_relative_path'  
                    WHERE `category_id`  = $category_id
HDOC;
        if ($sql->query($query) == FALSE) {
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
        }
    }
    /**
     * Now Upload Files
     */
    $post_destination_path = '/public/images/category/thumb/' . $category_id;
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/demo' . $post_destination_path;
    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    if (!empty($_FILES['thumb']['name']) && $_FILES['thumb']['error'] == 0) {

        //remove old file
        if (!is_null($_POST['hidden_thumb']) && !empty($_POST['hidden_thumb'])) {
            @unlink($destination . '/demo' . $_POST['hidden_thumb']);
        }

        $file_new_name = time() . retrieveFileExtension($_FILES['thumb']['type']);
        if (!move_uploaded_file($_FILES['thumb']['tmp_name'], $destination . '/' . $file_new_name)) {
            exit('Unknown error occured while uploading file');
        }

        $thumb_relative_path = $post_destination_path . '/' . $file_new_name;
        $query = <<<HDOC
                    UPDATE  `category` 
                    SET 
                        `thumb` =  '$thumb_relative_path'  
                    WHERE `category_id`  = $category_id
HDOC;
        if ($sql->query($query) == FALSE) {
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
        }
    }





    $_SESSION['success_message'] = ' Record has been updated successfully.';
    header('LOCATION: index.php');
} else {
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : NULL;
    if (is_null($category_id)) {
        header('LOCATION: index.php');
    }
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Categories Management</div>
                    <div class="panel-content">
                        <?php
                        $query = <<<HDOC
                                SELECT * 
                                FROM `category` 
                                WHERE `category_id`= '{$sql->real_escape_string($category_id)}'
HDOC;
                        if (!$result = $sql->query($query)) {
                            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                        }

                        if ($result->num_rows) {
                            $record = $result->fetch_object();
                            ?>
                            <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                <input type="hidden" id="category_id" name="category_id" value="<?php echo $record->category_id; ?>" />
                                <input type="hidden" id="hidden_icon" name="hidden_icon" value="<?php echo $record->icon; ?>" />
                                <input type="hidden" id="hidden_thumb" name="hidden_thumb" value="<?php echo $record->thumb; ?>" />
                                <fieldset>

                                    <legend>Edit Page</legend>

                                    <div class="control-group" style="display: none;">
                                        <label class="control-label" for="slug">Slug (EN) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter page slug" id="slug" name="slug" value="<?php echo $record->slug; ?>" maxlength="64" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>    

                                    <div class="control-group">
                                        <label class="control-label" for="title_ur">Title (UR) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter page title in ur" id="title_ur" name="title_ur" value="<?php echo $record->title_ur; ?>" maxlength="255" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="title_en">Title (EN) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter page title in english" id="title_en" name="title_en" value="<?php echo $record->title_en; ?>" maxlength="255" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>
                                    <div class="control-group" >
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <label class="control-label" for="icon" >Icon:</label>	
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input type="file" name="icon" id="icon" allowedWidth="88" allowedHeight="37" />
                                                    <p style="color:#000;font-size:12px;margin-top:9px;">Recommended size (88 X 37)</p>
                                                </div>
                                                <?php if (!is_null($record->icon) && !empty($record->icon)) { ?>
                                                    <div id="uploadPreviewIcon" style="color:red;">
                                                        <img src="<?php echo $base_url . '/..' . $record->icon; ?>" style="max-width:100px" />
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group" >
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <label class="control-label" for="thumb" >Thumb:</label>	
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input type="file" name="thumb" id="thumb" allowedWidth="201" allowedHeight="91" />
                                                    <p style="color:#000;font-size:12px;margin-top:9px;">Recommended size (201 X 91)</p>
                                                </div>
                                                <?php if (!is_null($record->thumb) && !empty($record->thumb)) { ?>
                                                    <div id="uploadPreviewThumb" style="color:red;">
                                                        <img src="<?php echo $base_url . '/..' . $record->thumb; ?>" style="max-width:100px"/>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="email">Show In Menu :</label>
                                        <div class="controls">
                                            <input type="radio" id="show_as_menu1" name="show_as_menu" <?php echo ($record->show_as_menu == 1) ? 'checked' : ''; ?> value="1" />&nbsp;Yes 
                                            <br />
                                            <input type="radio" id="show_as_menu0" name="show_as_menu" <?php echo ($record->show_as_menu == 0) ? 'checked' : ''; ?>  value="0" />&nbsp;No
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="email">Status :</label>
                                        <div class="controls">
                                            <input type="radio" id="active" name="is_active" <?php echo ($record->is_active == 1) ? 'checked' : ''; ?> value="1" />&nbsp;Active 
                                            <br />
                                            <input type="radio" id="inactive" name="is_active" <?php echo ($record->is_active == 0) ? 'checked' : ''; ?>  value="0" />&nbsp;Inactive
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" title="Click to update existing record" id="submit" name="submit">Update</button>
                                        <a href="<?php echo $base_url; ?>/article/categories">Cancel</a>
                                    </div>

                                </fieldset>
                            </form>
                            <?php
                        }
                        ?>
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