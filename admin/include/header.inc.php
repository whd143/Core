<?php
ob_start();
if (isset($include_prefix)) {
    require_once $include_prefix . 'include/setting.inc.php';
    require_once $include_prefix . 'include/validate_session.php';
} else {
    require_once 'include/setting.inc.php';
    require_once 'include/validate_session.php';
}
//if (isset($_REQUEST['slider']) && $_REQUEST['slider'] == 'del') {
//    $id = $_REQUEST['id'];
//    mysql_query("DELETE FROM slider WHERE slider_id='$id'");
//    header("LOCATION: slider.php#slid ");
//}
//
//if (isset($_REQUEST['product']) && $_REQUEST['product'] == 'del') {
//    $id = $_REQUEST['prod_id'];
//    mysql_query("DELETE FROM products WHERE prod_id=" . $id);
//}
//
//if (isset($_REQUEST['suboption']) && $_REQUEST['suboption'] == 'del') {
//    $id = $_REQUEST['sub_option_id'];
//    mysql_query("DELETE FROM sub_option WHERE sub_option_id=" . $id);
//}
//
//if (isset($_REQUEST['option']) && $_REQUEST['option'] == 'del') {
//    $option_title_id = $_REQUEST['option_id'];
//    mysql_query("DELETE FROM sub_option WHERE option_title_id=" . $option_title_id);
//    mysql_query("DELETE FROM option_title WHERE option_title_id=" . $option_title_id);
//}
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

        <link href="<?php echo $base_url ?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/css/jasny-bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/css/jasny-bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo $base_url ?>/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="<?php echo $base_url ?>/css/admin.css" rel="stylesheet" />
        <link class="jsbin" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

        <!--  validation -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/validationEngine.jquery.css" />
        <!-- datatables -->
        <link href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

        <link href="<?php echo $base_url ?>/css/admin_override.css" rel="stylesheet" />



<!--        <script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
                        .width(100);

                $('#blah').css({
                    display: 'block'
                });

            };

            $("#blah img").css("display:block");
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">

    var baseURL = '<?php echo $base_url; ?>';

    function slider(id)
    {
        if (confirm("Are you sure you want to delete?"))
        {
            window.location = 'slider.php?id=' + id + "&slider=del";

        }
        else
        {
            return false;
        }
    }
    function deletesuboptionid(id)
    {
        if (confirm("Are you sure you want to delete?"))
        {

            window.location = 'view_products.php?sub_option_id=' + id + "&suboption=del";
        }
        else
        {
            return false;
        }
    }
    function products(id)
    {
        if (confirm("Are you sure you want to delete?"))
        {

            window.location = 'view_products.php?prod_id=' + id + "&product=del";
        }
        else
        {
            return false;
        }
    }
    function options(id)
    {
        if (confirm("Are you sure you want to delete?"))
        {

            window.location = 'view_products.php?option_id=' + id + "&option=del";
        }
        else
        {
            return false;
        }
    }
    function multiimage(name, id)
    {
        if (confirm("Are you sure you want to delete?"))
        {

            window.location = 'edit_portfolio.php?image_name=' + name + '&multi_id=' + id + "&specimage=del";
        }
        else
        {
            return false;
        }
    }



</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#parent_cat").change(function () {
            $.get('loadsubcat.php?cat_id=' + $(this).val(), function (data) {
                $("#sub_cat").html(data);
                $('#loader').slideUp(200, function () {
                    $(this).remove();
                });
            });
        });

        $("#file").change(function (e) {
            if (this.disabled)
                return alert('File upload not supported!');
            allowedWidth = $(this).attr('allowedWidth');
            allowedHeight = $(this).attr('allowedHeight');
            var F = this.files;
            if (F && F[0])
                for (var i = 0; i < F.length; i++)
                    readImage(F[i]);
        });
    });
</script>-->
    </head>
    <body>
        <div id="top-strip">
            <div class="container">
                <div class="row">
                    <div class="offset8 span4">
                        <div class="pull-right">
                            <?php
                            if (isset($_SESSION["name"])) {
                                echo '<span style="font-size:12px;">Welcome ' . $_SESSION['name'] . '</span>';
                            }
                            ?>
                            |
                            <a href="<?php echo $base_url?>/logout.php">Sign Out</a>
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
                            <img src="<?php echo $base_url ?>/images/logo.png" alt="Logo" >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="nav-strip">

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
