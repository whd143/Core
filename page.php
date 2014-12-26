<?php
include "include/header.inc.php";
$slug = isset($_REQUEST['slug']) ? $_REQUEST['slug'] : null;
if (is_null($slug)) {
    header('LOCATION: /');
}
include "include/headlines.inc.php";
?>

<section id="content-bg">
    <article class="content">
        <div class="content_area">
            <div class="left">
                <div class="inner">
                    <?php
                    $query = "SELECT * FROM `static_page` WHERE `slug` LIKE '{$sql->real_escape_string($slug)}'";
                    if (!$result = $sql->query($query)) {
                        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                    }
                    if ($result->num_rows > 0) {
                        $record = $result->fetch_array();
                        echo '<h1>' . $record['title_' . $_SESSION['lang']] . '</h1>';
                        echo '<div>' . $record['description_' . $_SESSION['lang']] . '</div>';
                    } else {
                        echo "Oops, You are trying to access invalid information";
                    }
                    ?>
                </div>
            </div>
            <?php include "include/sidebar.inc.php"; ?>
        </div>
        </div>
    </article>
</section>
<?php
include "include/footer.inc.php";
?>