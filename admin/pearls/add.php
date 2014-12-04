<?php
$include_prefix = '../';
include $include_prefix . "include/header.inc.php";
/**
 * form submit action
 */
if (isset($_POST['submit'])) {
    $publish_on = date('Y-m-d', isset($_POST['publish_on']) ? strtotime($_POST['publish_on']) : time());
    $ayat_en = isset($_POST['ayat_en']) ? $_POST['ayat_en'] : null;
    $ayat_ur = isset($_POST['ayat_ur']) ? $_POST['ayat_ur'] : null;
    $hadith_en = isset($_POST['hadith_en']) ? $_POST['hadith_en'] : null;
    $hadith_ur = isset($_POST['hadith_ur']) ? $_POST['hadith_ur'] : null;
    $quote_en = isset($_POST['quote_en']) ? $_POST['quote_en'] : null;
    $quote_ur = isset($_POST['quote_ur']) ? $_POST['quote_ur'] : null;

    $query = <<<HDOC
                    INSERT INTO  `golden_word` (`ayat_en`,`ayat_ur`,`hadith_en`,`hadith_ur`,`quote_en`,`quote_ur`,`publish_on`,`created_by`,`modified_by`,`created_on`) 
                    VALUES('{$sql->real_escape_string($ayat_en)}','{$sql->real_escape_string($ayat_ur)}','{$sql->real_escape_string($hadith_en)}','{$sql->real_escape_string(hadith_ur)}','{$sql->real_escape_string($quote_en)}','{$sql->real_escape_string($quote_ur)}','{$sql->real_escape_string($publish_on)}','{$_SESSION['id']}','{$_SESSION['id']}',NOW()) 
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
                    <div class="panel-header"><i class="icon-tasks"></i> Golden Words Management</div>
                    <div class="panel-content">
                        <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            <fieldset>

                                <legend>Add Golden Words</legend>

                                <div class="control-group">
                                    <label class="control-label" for="publish_on">Publish Date : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" title="Choose publish date" id="publish_on" name="publish_on" value="<?php echo date('Y-m-d'); ?>" />
                                        <span class="mandatory"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="ayat_ur">Ayat (UR) : </label>
                                    <div class="controls">
                                        <textarea id="ayat_ur" name="ayat_ur" title="Enter ayat-e-kareema in urdu" rows="15" cols="30" style="width: 80%" class="tinymce"></textarea>
                                        <span class="mandatory"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="hadith_ur">Hadith (UR) : </label>
                                    <div class="controls">
                                        <textarea id="hadith_ur" name="hadith_ur" title="Enter hadith in urdu" rows="15" cols="30" style="width: 80%" class="tinymce"></textarea>
                                        <span class="mandatory"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="quote_ur">Quote (UR) : </label>
                                    <div class="controls">
                                        <textarea id="quote_ur" name="quote_ur" title="Enter quote in urdu" rows="15" cols="30" style="width: 80%" class="tinymce"></textarea>
                                        <span class="mandatory"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="ayat_en">Ayat (EN) : </label>
                                    <div class="controls">
                                        <textarea id="ayat_en" name="ayat_en" title="Enter ayat-e-kareema in english" rows="15" cols="30" style="width: 80%" class="tinymce"></textarea>
                                        <span class="mandatory"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="hadith_en">Hadith (EN) : </label>
                                    <div class="controls">
                                        <textarea id="hadith_en" name="hadith_en" title="Enter hadith in english" rows="15" cols="30" style="width: 80%" class="tinymce"></textarea>
                                        <span class="mandatory"></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="quote_en">Quote (EN) : </label>
                                    <div class="controls">
                                        <textarea id="quote_en" name="quote_en" title="Enter quote in english" rows="15" cols="30" style="width: 80%" class="tinymce"></textarea>
                                        <span class="mandatory"></span>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" title="Click to add new record" id="submit" name="submit">Add</button>
                                    <a href="<?php echo $base_url; ?>/pearls">Cancel</a>
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