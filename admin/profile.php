<?php include "include/header.inc.php"; ?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Your Profile</div>
                    <div class="panel-content">
                        <form id="table table-bordered dataTable" action="edit_profile.php" id="example_form" class="form-horizontal" method="post" enctype="multipart/form-data" />
                        <fieldset>
                            <legend>Profile information: </legend>
                            <div class="control-group">
                                <label class="control-label" for="name">Name : </label>
                                <div class="controls">
                                    <p style="margin-top:5px;"><?php echo $_SESSION['name']; ?></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="email">UserName : </label>
                                <div class="controls">
                                    <p style="margin-top:5px;"><?php echo $_SESSION['username']; ?></p>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="email">Email : </label>
                                <div class="controls">
                                    <p style="margin-top:5px;"><?php echo $_SESSION['email']; ?></p>
                                </div>
                            </div>

                            <div class="control-group">
                                
                                <div class="controls">
                                    <a href="edit_profile.php" style="margin-top:10px;display:block;">Edit profile</a>
                                </div>
                            </div>
                        </fieldset>
                        </form>
                        <!-- Datepicker -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("include/footer.inc.php"); ?>

