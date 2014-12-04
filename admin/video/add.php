<?php
$include_prefix = '../';
include $include_prefix . "include/header.inc.php";
/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $video_url = isset($_POST['video_url']) ? $_POST['video_url'] : null;
    $video_keyword = isset($_POST['video_keyword']) ? $_POST['video_keyword'] : null;

    $query = <<<HDOC
                    INSERT INTO  `video` (`video_url`,`video_keyword`,`created_by`,`modified_by`,`created_on`) 
                    VALUES('{$sql->real_escape_string($video_url)}','{$sql->real_escape_string($video_keyword)}','{$_SESSION['id']}','{$_SESSION['id']}',NOW()) 
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been added successfully.';
    header('LOCATION: index.php');
}
?>
<style>
    textarea[rows="15"]{
        height:80px !important;
    }
</style>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Video Management</div>
                    <div class="panel-content">
                        <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            <fieldset>

                                <legend>Add Video</legend>

                                <div class="control-group">
                                    <label class="control-label" for="video_url">URL : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge " title="Enter video url" id="video_url" name="video_url" value="" maxlength="255" />
                                        <span class="mandatory">*</span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="video_keyword">Keywords : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge " title="Enter video keywords" id="video_keyword" name="video_keyword" value="" maxlength="255" />
                                        <span class="mandatory"></span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" title="Click to add new record" id="submit" name="submit">Add</button>
                                    <a href="<?php echo $base_url; ?>/video">Cancel</a>
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