<?php
$include_prefix = '../';
include $include_prefix . "include/header.inc.php";


/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $page_id = isset($_POST['page_id']) ? $_POST['page_id'] : 0;
    $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
    $title_en = isset($_POST['title_en']) ? $_POST['title_en'] : '';
    $description_en = isset($_POST['description_en']) ? $_POST['description_en'] : '';
    $title_ur = isset($_POST['title_ur']) ? $_POST['title_ur'] : '';
    $description_ur = isset($_POST['description_ur']) ? $_POST['description_ur'] : '';
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 1;
    $query = <<<HDOC
                    UPDATE  `static_page` 
                    SET 
                        `slug`  = '{$sql->real_escape_string($slug)}',
                        `title_en` =  '{$sql->real_escape_string($title_en)}',
                        `description_en` =  '{$sql->real_escape_string($description_en)}',
                        `title_ur` =  '{$sql->real_escape_string($title_ur)}',
                        `description_ur` =  '{$sql->real_escape_string($description_ur)}',
                        `is_active` =  '{$sql->real_escape_string($is_active)}',
                        `modified_by` =  '{$_SESSION['id']}'  
                    WHERE `page_id`  = '{$sql->real_escape_string($page_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been updated successfully.';
    header('LOCATION: index.php');
} else {
    $page_id = isset($_GET['page_id']) ? $_GET['page_id'] : NULL;
    if (is_null($page_id)) {
        header('LOCATION: index.php');
    }
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Static Pages Management</div>
                    <div class="panel-content">
                        <?php
                        $query = <<<HDOC
                                SELECT * 
                                FROM `static_page` 
                                WHERE `page_id`= '{$sql->real_escape_string($page_id)}'
HDOC;
                        if (!$result = $sql->query($query)) {
                            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                        }

                        if ($result->num_rows) {
                            $record = $result->fetch_object();
                            ?>
                            <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                <input type="hidden" id="page_id" name="page_id" value="<?php echo $record->page_id; ?>" />

                                <fieldset>

                                    <legend>Edit Page</legend>

                                    <div class="control-group">
                                        <label class="control-label" for="slug">Slug (EN) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter page slug" id="slug" name="slug" value="<?php echo $record->slug; ?>" maxlength="64" />
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


                                    <div class="control-group">
                                        <label class="control-label" for="description_en">Description (EN) :</label>
                                        <div class="controls">
                                            <textarea id="description_en" name="description_en" title="Enter page description in english" rows="15" cols="80" style="width: 80%" class="tinymce" ><?php echo $record->description_en ?></textarea>
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
                                        <label class="control-label" for="description_ur">Description (UR) :</label>
                                        <div class="controls">
                                            <textarea id="description_ur" name="description_ur" title="Enter page description in ur" rows="15" cols="80" style="width: 80%" class="tinymce"><?php echo $record->description_ur ?></textarea>
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
                                        <a href="<?php echo $base_url; ?>/static_pages">Cancel</a>
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