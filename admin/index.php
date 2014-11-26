<?php
require_once "include/setting.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="./assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
        <link href="./assets/css/jasny-bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="./assets/css/font-awesome.css" rel="stylesheet" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'> -->
        <link href="./assets/css/admin.css" rel="stylesheet" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5./assets/js/"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="./img/ico/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./img/ico/apple-touch-icon-144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./img/ico/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./img/ico/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="./img/ico/apple-touch-icon-57-precomposed.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>

        <div id="top-strip">
            <div class="container">
                <div class="row">
                    <div class="offset8 span4">
                        <div class="pull-right">
                            <a href="../index.php">Visit Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="logo-strip">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="logo">
                            <img src="../images/logo.png"  alt="Stop Ng Logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="nav-strip">

            <div class="container">
                <div class="row">
                    <div class="span12"></div>
                </div>
            </div>

        </div>

        <div class="container-signin">
            <div class="panel">
                <div class="panel-header"><i class="icon-lock icon-large"></i> Login </div>
                <div class="panel-content">
                    <form action="login.php"/>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope icon-large"></i></span><input class="span3" placeholder="Username" id="prependedInput" size="16" type="text" name="username" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-key icon-large"></i></span><input class="span3" placeholder="Password" id="prependedInput" size="16" type="password" name="password" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="btn btn-large" type="submit" value="Login"  style="margin-bottom:10px;">
                            <br />

                        </div>
                    </div>
                    <div class="control-group" style="margin-top:13px;">
                        <div class="controls">
                            <span class="text-small" style="padding-bottom:30px;"><a href="register.html"> </a>
                                <div class="invalid">
                                    <?php
                                    if (!empty($_SESSION["error_message"])) {
                                        ?>
                                        <div class="alert alert-error">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Error! </strong>
                                            <?php
                                            echo $_SESSION["error_message"];
                                            unset($_SESSION['error_message']);
                                            ?>     
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>   
        </div>
    </body>
</html>