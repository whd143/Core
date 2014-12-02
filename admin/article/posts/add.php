<?php
$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";
/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $title_en = isset($_POST['title_en']) ? $_POST['title_en'] : 'anonymous'.  rand(1, 2000);
    $slug = str_replace(' ', '_', strtolower($title_en) . '.html');
    $description_en = isset($_POST['description_en']) ? $_POST['description_en'] : null;
    $title_ur = isset($_POST['title_ur']) ? $_POST['title_ur'] : '';
    $description_ur = isset($_POST['description_ur']) ? $_POST['description_ur'] : null;
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 1;
    $is_home = isset($_POST['is_home']) ? $_POST['is_home'] : 1;
    $is_featured = isset($_POST['is_featured']) ? $_POST['is_featured'] : 1;
    $display_order = isset($_POST['display_order']) ? $_POST['display_order'] : 0;
    $publish_on = date('Y-m-d', isset($_POST['publish_on']) ? strtotime($_POST['publish_on']) : time());
    $video_url = isset($_POST['video_url']) ? $_POST['video_url'] : null;
    $query = <<<HDOC
                    INSERT INTO  `article` (`slug`,`title_en`,`description_en`,`title_ur`,`description_ur`,`publish_on`,`video_url`,`is_featured`,`is_home`,`is_active`,`created_by`,`modified_by`,`created_on`) 
                    VALUES('{$sql->real_escape_string($slug)}','{$sql->real_escape_string($title_en)}','{$sql->real_escape_string($description_en)}','{$sql->real_escape_string($title_ur)}','{$sql->real_escape_string($description_ur)}','{$sql->real_escape_string($publish_on)}','{$sql->real_escape_string($video_url)}','{$sql->real_escape_string($is_featured)}','{$sql->real_escape_string($is_home)}','{$sql->real_escape_string($is_active)}','{$_SESSION['id']}','{$_SESSION['id']}',NOW()) 
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been added successfully.';
    header('LOCATION: index.php');
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Articles Management</div>
                    <div class="panel-content">
                        <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            <fieldset>

                                <legend>Add Article</legend>

                                <div class="control-group" style="display: none;">
                                    <label class="control-label" for="slug">Slug (EN) : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article slug" id="slug" name="slug" value="" maxlength="64" />
                                        <span style="color:red;"> * </span>
                                    </div>
                                </div>    

                                <div class="control-group">
                                    <label class="control-label" for="publish_on">Publish Date : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Choose publish date" id="publish_on" name="publish_on" value="" />
                                        <span style="color:red;"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="title_ur">Title (UR) : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article title in ur" id="title_ur" name="title_ur" value="" maxlength="255" />
                                        <span style="color:red;"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="description_ur">Description (UR) :</label>
                                    <div class="controls">
                                        <textarea id="description_ur" name="description_ur" title="Enter article description in ur" rows="15" cols="80" style="width: 80%" class="tinymce"></textarea>
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
                                    <label class="control-label" for="description_en">Description (EN) :</label>
                                    <div class="controls">
                                        <textarea id="description_en" name="description_en" title="Enter article description in english" rows="15" cols="80" style="width: 80%" class="tinymce" ></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="video_url">Video Url : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" title="Enter article video_url" id="video_url" name="video_url" value="" maxlength="11" />
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
                                    <label class="control-label" for="is_home">Front Page Display:</label>
                                    <div class="controls">
                                        <input type="radio" id="active" name="is_home" value="1" />&nbsp;Yes 
                                        <br />
                                        <input type="radio" id="inactive" name="is_home" value="0" checked />&nbsp;No
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="is_featured">Is Featured:</label>
                                    <div class="controls">
                                        <input type="radio" id="active" name="is_featured"  value="1" />&nbsp;Yes 
                                        <br />
                                        <input type="radio" id="inactive" name="is_featured"  value="0"  checked />&nbsp;No
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