<?php
$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";


/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $article_id = isset($_POST['article_id']) ? $_POST['article_id'] : 0;
    $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
    $title_en = isset($_POST['title_en']) ? $_POST['title_en'] : '';
    $description_en = isset($_POST['description_en']) ? $_POST['description_en'] : '';
    $title_ur = isset($_POST['title_ur']) ? $_POST['title_ur'] : '';
    $description_ur = isset($_POST['description_ur']) ? $_POST['description_ur'] : '';
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 1;
    $is_home = isset($_POST['is_home']) ? $_POST['is_home'] : 1;
    $is_featured = isset($_POST['is_featured']) ? $_POST['is_featured'] : 1;
    $display_order = isset($_POST['display_order']) ? $_POST['display_order'] : 0;
    $publish_on = date('Y-m-d', isset($_POST['publish_on']) ? strtotime($_POST['publish_on']) : time());

    $query = <<<HDOC
                    UPDATE  `article` 
                    SET 
                        `slug`  = '{$sql->real_escape_string($slug)}',
                        `title_en` =  '{$sql->real_escape_string($title_en)}',
                        `description_en` =  '{$sql->real_escape_string($description_en)}',
                        `title_ur` =  '{$sql->real_escape_string($title_ur)}',
                        `description_ur` =  '{$sql->real_escape_string($description_ur)}',
                        `is_active` =  '{$sql->real_escape_string($is_active)}',
                        `is_home` =  '{$sql->real_escape_string($is_home)}',
                        `is_featured` =  '{$sql->real_escape_string($is_featured)}',
                        `publish_on` =  '{$sql->real_escape_string($publish_on)}',
                        `modified_by` =  '{$_SESSION['id']}'  
                    WHERE `article_id`  = '{$sql->real_escape_string($article_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been updated successfully.';
    header('LOCATION: index.php');
} else {
    $article_id = isset($_GET['article_id']) ? $_GET['article_id'] : NULL;
    if (is_null($article_id)) {
        header('LOCATION: index.php');
    }
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Articles Management</div>
                    <div class="panel-content">
                        <?php
                        $query = <<<HDOC
                                SELECT * 
                                FROM `article` 
                                WHERE `article_id`= '{$sql->real_escape_string($article_id)}'
HDOC;
                        if (!$result = $sql->query($query)) {
                            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                        }

                        if ($result->num_rows) {
                            $record = $result->fetch_object();
                            ?>
                            <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                <input type="hidden" id="article_id" name="article_id" value="<?php echo $record->article_id; ?>" />

                                <fieldset>

                                    <legend>Edit Article</legend>

                                    <div class="control-group">
                                        <label class="control-label" for="slug">Slug (EN) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article slug" id="slug" name="slug" value="<?php echo $record->slug; ?>" maxlength="64" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>    

                                    <div class="control-group">
                                        <label class="control-label" for="publish_on">Publish Date : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Choose publish date" id="publish_on" name="publish_on" value="<?php echo $record->publish_on; ?>" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="title_ur">Title (UR) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article title in ur" id="title_ur" name="title_ur" value="<?php echo $record->title_ur; ?>" maxlength="255" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="description_ur">Description (UR) :</label>
                                        <div class="controls">
                                            <textarea id="description_ur" name="description_ur" title="Enter article description in ur" rows="15" cols="80" style="width: 80%" class="tinymce"><?php echo $record->description_ur ?></textarea>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="title_en">Title (EN) : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article title in english" id="title_en" name="title_en" value="<?php echo $record->title_en; ?>" maxlength="255" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="description_en">Description (EN) :</label>
                                        <div class="controls">
                                            <textarea id="description_en" name="description_en" title="Enter article description in english" rows="15" cols="80" style="width: 80%" class="tinymce" ><?php echo $record->description_en ?></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="display_order">Display Order : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article display order" id="display_order" name="display_order" value="<?php echo $record->display_order; ?>" maxlength="11" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="is_home">Front Page Display:</label>
                                        <div class="controls">
                                            <input type="radio" id="active" name="is_home" <?php echo ($record->is_home == 1) ? 'checked' : ''; ?> value="1" />&nbsp;Yes 
                                            <br />
                                            <input type="radio" id="inactive" name="is_home" <?php echo ($record->is_home == 0) ? 'checked' : ''; ?>  value="0" />&nbsp;No
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="is_featured">Is Featured:</label>
                                        <div class="controls">
                                            <input type="radio" id="active" name="is_featured" <?php echo ($record->is_featured == 1) ? 'checked' : ''; ?> value="1" />&nbsp;Yes 
                                            <br />
                                            <input type="radio" id="inactive" name="is_featured" <?php echo ($record->is_featured == 0) ? 'checked' : ''; ?>  value="0" />&nbsp;No
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="is_active">Status :</label>
                                        <div class="controls">
                                            <input type="radio" id="active" name="is_active" <?php echo ($record->is_active == 1) ? 'checked' : ''; ?> value="1" />&nbsp;Active 
                                            <br />
                                            <input type="radio" id="inactive" name="is_active" <?php echo ($record->is_active == 0) ? 'checked' : ''; ?>  value="0" />&nbsp;Inactive
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="is_active">Status :</label>
                                        <div class="controls">
                                            <input type="radio" id="active" name="is_active" <?php echo ($record->is_active == 1) ? 'checked' : ''; ?> value="1" />&nbsp;Active 
                                            <br />
                                            <input type="radio" id="inactive" name="is_active" <?php echo ($record->is_active == 0) ? 'checked' : ''; ?>  value="0" />&nbsp;Inactive
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" title="Click to update existing record" id="submit" name="submit">Update</button>
                                        <a href="<?php echo $base_url; ?>/article/posts">Cancel</a>
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