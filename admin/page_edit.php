<?php
include("include/header.inc.php");
$page_id = isset($_REQUEST['page_id']) ? $_REQUEST['page_id'] : NULL;
if (is_null($page_id)) {
    header('LOCATION: pages.php');
}

/**
 * form submit action
 */
if (isset($_REQUEST['submit'])) {
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
    $query = <<<HDOC
                    UPDATE  `info_pages` 
                    SET 
                        `name`=  '{$sql->real_escape_string($name)}',
                        `description`=  '{$sql->real_escape_string($description)}',   
                        `last_modify`=  NOW(),  
                        `modifyby`=  '{$_SESSION['id']}'  
                    WHERE `page_id` = '{$sql->real_escape_string($page_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been updated successfuly.';
    header('LOCATION: pages.php');
}
?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Pages Management</div>
                    <div class="panel-content">
                        <?php
                        $query = <<<HDOC
                                SELECT * 
                                FROM `info_pages` 
                                WHERE `page_id`= '{$sql->real_escape_string($page_id)}'
HDOC;
                        if (!$result = $sql->query($query)) {
                            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                        }

                        if ($result->num_rows) {
                            $record = $result->fetch_object();
                            ?>
                            <form id="validate" action="" class="form-horizontal" method="post" enctype="multipart/form-data" />
                            <fieldset>

                                <legend>Edit page information</legend>

                                <div class="control-group">
                                    <label class="control-label" for="name">Title : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" name="name" id="name" value="<?php echo $record->name; ?>" maxlength="30" /><span style="color:red;"> * </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="email">Description :</label>
                                    <div class="controls">
                                        <textarea id="elm1" name="description" rows="15" cols="80" style="width: 80%" class="tinymce"><?php echo $record->description ?></textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="submit" value="submit">Update</button>
                                    <a href="pages.php">Back</a>
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

<?php include("include/footer.inc.php"); ?>

