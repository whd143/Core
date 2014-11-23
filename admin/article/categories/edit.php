<?php
$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";


/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : 0;
    $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
    $title_en = isset($_POST['title_en']) ? $_POST['title_en'] : '';
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