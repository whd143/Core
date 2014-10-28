<?php
include("include/header.inc.php");
/**
 * form submit action
 */
if (isset($_REQUEST['submit'])) {
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
    $query = <<<HDOC
                    INSERT INTO  `info_pages` (`name`,`description`,`last_modify`,`modifyby`) 
                    VALUES('{$sql->real_escape_string($name)}','{$sql->real_escape_string($description)}',NOW(),'{$_SESSION['id']}') 
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been added successfuly.';
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
                        <form id="validate" action="" class="form-horizontal" method="post" enctype="multipart/form-data" />
                        <fieldset>

                            <legend>Add page information</legend>

                            <div class="control-group">
                                <label class="control-label" for="name">Title : </label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge validate[required,custom[onlyLetterNumberHyphen]]" name="name" id="name" value="" maxlength="30" /><span style="color:red;"> * </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="email">Description :</label>
                                <div class="controls">
                                    <textarea id="elm1" name="description" rows="15" cols="80" class="tinymce width80"></textarea>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" name="submit" value="submit">Add</button>
                                <a href="pages.php">Back</a>
                            </div>

                        </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("include/footer.inc.php"); ?>

