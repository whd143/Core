<?php
include "include/header.inc.php";
?>

<?php
//$query = "SELECT * FROM `golden_word` WHERE `is_active`=1 AND `show_as_menu`=1 ORDER BY `display_order` ASC";
//if (!$result = $sql->query($query)) {
//    dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
//}
//if ($result->num_rows > 0) {
//
//    while ($record = $result->fetch_array()) {
//        $active_class = '';
//        if (isset($_GET['category']) && $record["slug"] == $_GET['category']) {
//            $active_class = 'active';
//        }
//        echo '<li class="' . $active_class . '" style="background-image: url(\'' . $record['icon'] . '\');">
//                                            <a href="' . $base_url . '/category.php?category=' . $record["slug"] . '">' . $record['title_' . $_SESSION['lang']] . '</a>
//                                    </li>';
//    }
//}
?>


<?php
include "include/headlines.inc.php";
?>
<?php
include "include/subheader.inc.php";
?>


<section id="content-bg">
    <article class="content">

        <?php
        include "include/featured.inc.php";
        ?>

        <div class="content_area">
            <?php
            include "include/leftpanel.inc.php";
            ?>
            
        </div>

    </article>
</section>
<?php
include "include/footer.inc.php";
?>