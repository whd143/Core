<?php
ob_start();
if (isset($include_prefix)) {
    require_once $include_prefix . 'include/setting.inc.php';
    require_once $include_prefix . 'include/validate_session.php';
} else {
    require_once 'include/setting.inc.php';
    require_once 'include/validate_session.php';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Panel</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--File and script for text editor-->
        <script type="text/javascript" src="<?php echo $base_url ?>/tinymce/js/tinymce/tinymce.min.js"></script>
     
        
        
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste "
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>
        
                <!--End of file and script for text editor-->
        
        
        <link href="<?php echo $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/assets/css/jasny-bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/assets/css/jquery-ui.css" rel="stylesheet" />

        <link href="<?php echo $base_url ?>/assets/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <link href="<?php echo $base_url ?>/assets/css/admin.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/assets/css/admin_override.css" rel="stylesheet" />
        
        
    </head>
    <body>
        <div id="top-strip">
            <div class="container"  >
                <div class="row">
                    <div class="offset8 span4">
                        <div class="pull-right">
                            <?php
                            if (isset($_SESSION["name"])) {
                                echo '<span style="font-size:12px;">Welcome ' . $_SESSION['name'] . '</span>';
                            }
                            ?>
                            |
                            <a href="<?php echo $base_url ?>/logout.php">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="logo-strip"  >
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="logo">
                            <img src="<?php echo $base_url ?>/assets/images/logo.png" alt="Logo" >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="nav-strip" >

            <div class="container">
                <div class="row">
                    <div class="span12">

                        <div class="navbar">
                            <div class="navbar-inner">
                                <div class="container">
                                    <div class="nav-collapse">
                                        <?php
                                        if (isset($include_prefix)) {
                                            include $include_prefix . 'include/menu.inc.php';
                                        } else {
                                            include 'include/menu.inc.php';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div id="subnav-strip">

            <div class="container">
                <div class="row">
                    <div class="span12">

                    </div>
                </div>
            </div>

        </div>
