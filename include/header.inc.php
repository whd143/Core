<?php
ob_start();
require_once 'include/setting.inc.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>AlFalah</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/base/advanced-slider-base.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/glossy-square/gray/glossy-square-gray.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/responsive-slider.css" media="screen"/>

        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>/css/override.css" />

        <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery.transition.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery.advancedSlider.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/js/functions.js"></script>
        <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery.quick.pagination.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function() {
            $("ul.pagination").quickPagination({pagerLocation:"both",pageSize:"1"});
        });
        </script>
    </head>

    <body>
        <!------Header------>
        <header>
            <div id="header-bg">
                <div class="header">
                    <a href="<?php echo $base_url; ?>" class="logo">
                        <img src="<?php echo $base_url ?>/images/logo.png">
                    </a>
                    <nav>
                        <ul>
                            <li class="<?php echo !isset($_GET['category']) ? 'active':''?>" style="background-image: url('<?php echo $base_url ?>/images/islam.png');">
                                <a href="<?php echo $base_url ?>">                                
                                    <span>Main Page</span>
                                </a>
                            </li>
                            <?php
                            $query = "SELECT * FROM `category` WHERE `is_active`=1 AND `show_as_menu`=1 ORDER BY `display_order` ASC";
                            if (!$result = $sql->query($query)) {
                                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                            }
                            if ($result->num_rows > 0) {

                                while ($record = $result->fetch_array()) {
                                    $active_class='';
                                    if(isset($_GET['category']) && $record["slug"]==$_GET['category']){
                                        $active_class='active';
                                    }
                                    echo '<li class="'.$active_class.'" style="background-image: url(\''.$record['icon'].'\');">
                                            <a href="' . $base_url . '/category.php?category=' . $record["slug"] . '"><span>'.$record['title_'.$_SESSION['lang']].'</span></a>
                                    </li>';
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!------Header------>
