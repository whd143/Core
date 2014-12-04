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
                    UPDATE  `golden_word` 
                    SET 
                        `ayat_en`  = '{$sql->real_escape_string($ayat_en)}',
                        `ayat_ur` =  '{$sql->real_escape_string($ayat_ur)}',
                        `hadith_en` =  '{$sql->real_escape_string($hadith_en)}',
                        `hadith_ur` =  '{$sql->real_escape_string($hadith_ur)}',
                        `quote_en` =  '{$sql->real_escape_string($quote_en)}',
                        `publish_on` =  '{$sql->real_escape_string($publish_on)}',
                        `modified_by` =  '{$_SESSION['id']}'  
                    WHERE `golden_word_id`  = '{$sql->real_escape_string($golden_word_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been updated successfully.';
    header('LOCATION: index.php');
} else {
    $golden_word_id = isset($_GET['golden_word_id']) ? $_GET['golden_word_id'] : NULL;
    if (is_null($golden_word_id)) {
        header('LOCATION: index.php');
    }
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
                    <div class="panel-header"><i class="icon-tasks"></i>  Golden Words Management</div>
                    <div class="panel-content">
                        <?php
                        $query = <<<HDOC
                                SELECT * 
                                FROM `golden_word` 
                                WHERE `golden_word_id`= '{$sql->real_escape_string($golden_word_id)}'
HDOC;
                        if (!$result = $sql->query($query)) {
                            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                        }

                        if ($result->num_rows) {
                            $record = $result->fetch_object();
                            ?>
                            <form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                <input type="hidden" id="golden_word_id" name="golden_word_id" value="<?php echo $record->golden_word_id; ?>" />

                                <fieldset>

                                    <legend>Edit Golden Words</legend>

                                    <div class="control-group">
                                        <label class="control-label" for="publish_on">Publish Date : </label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge" title="Choose publish date" id="publish_on" name="publish_on" value="<?php echo $record->publish_on; ?>" />
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="ayat_ur">Ayat (UR) : </label>
                                        <div class="controls">
                                            <textarea id="ayat_ur" name="ayat_ur" title="Enter ayat-e-kareema in urdu" rows="15" cols="30" style="width: 80%" class="tinymce"><?php echo $record->ayat_ur; ?></textarea>
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="hadith_ur">Hadith (UR) : </label>
                                        <div class="controls">
                                            <textarea id="hadith_ur" name="hadith_ur" title="Enter hadith in urdu" rows="15" cols="30" style="width: 80%" class="tinymce"><?php echo $record->hadith_ur; ?></textarea>
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="quote_ur">Quote (UR) : </label>
                                        <div class="controls">
                                            <textarea id="quote_ur" name="quote_ur" title="Enter quote in urdu" rows="15" cols="30" style="width: 80%" class="tinymce"><?php echo $record->quote_ur; ?></textarea>
                                            <span style="color:red;"> * </span>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="ayat_en">Ayat (EN) : </label>
                                        <div class="controls">
                                            <textarea id="ayat_en" name="ayat_en" title="Enter ayat-e-kareema in english" rows="15" cols="30" style="width: 80%" class="tinymce"><?php echo $record->ayat_en; ?></textarea>
                                            <span style="color:red;"></span>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="hadith_en">Hadith (EN) : </label>
                                        <div class="controls">
                                            <textarea id="hadith_en" name="hadith_en" title="Enter hadith in english" rows="15" cols="30" style="width: 80%" class="tinymce"><?php echo $record->hadith_en; ?></textarea>
                                            <span style="color:red;"></span>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="quote_en">Quote (EN) : </label>
                                        <div class="controls">
                                            <textarea id="quote_en" name="quote_en" title="Enter quote in english" rows="15" cols="30" style="width: 80%" class="tinymce"><?php echo $record->quote_en; ?></textarea>
                                            <span style="color:red;"></span>
                                        </div>
                                    </div>


                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" title="Click to add new record" id="submit" name="submit">Add</button>
                                        <a href="<?php echo $base_url; ?>/pearls">Cancel</a>
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
