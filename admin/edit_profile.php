<?php
include "include/header.inc.php";
?>

<!--
/**
 * Integrated and applied validation library
 */
-->
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript">
    var jq = $.noConflict();
    jq(document).ready(function () {
        jq('#validate').validationEngine({promptPosition: "bottomLeft", scroll: false});
    });
</script>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Profile</div>
                    <div class="panel-content">

                        <form id="validate" action="update_profile.php" class="form-horizontal" method="post" enctype="multipart/form-data" />
                        <fieldset>
                            <legend>Edit profile information: </legend>
                            <div class="control-group">
                                <label class="control-label" for="name">Name : </label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge validate[required]" id="name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" /><span style="color:red;"> * </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="name">UserName : </label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge validate[required]" name="username" id="admin_username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" /><span style="color:red;"> * </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="email">Email : </label>
                                <div class="controls">
                                    <input type="email" class="input-xlarge validate[required,custom[email]]" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" id="email" /><span style="color:red;"> * </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="name">Current password : </label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge validate[required]" name="password" value="" id="password" placeholder="Enter your current password"/><span style="color:red;"> * </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="name">Enter new password : </label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge validate[required]" name="new_password" placeholder="Enter your new password" id="new-pass" /><span style="color:red;"> * </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="name">Re enter password : </label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge validate[required]" name="confirm_password" placeholder="Re-enter your new password"  id="re-pass" /><span style="color:red;"> * </span>
                                </div>
                            </div>

                            <?php
                            if (!empty($_SESSION["success_message"])) {
                                echo '<div class="alert alert-success">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Success! </strong>
                                            ' . $_SESSION["success_message"] . '
                                        </div>';
                                unset($_SESSION["success_message"]);
                            }
                            if (isset($_SESSION["error_message"])) {
                                echo '<div class="alert alert-error">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Error! </strong>
                                            ' . $_SESSION["error_message"] . '
                                        </div>';
                                unset($_SESSION["error_message"]);
                            }
                            ?>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                <a href="profile.php">Back</a>
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