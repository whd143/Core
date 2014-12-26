<?php
include "include/header.inc.php";
include "include/headlines.inc.php";
?>
<section id="content-bg">
    <article class="content">
        <div class="content_area">
            <div class="left" >
                <div class="inner">
                    <ul class="pagination">
                        <?php $slug = isset($_REQUEST['category']) ? $_REQUEST['category'] : NULL; ?>
                        <?php
                        $query = 'SELECT * FROM `article` 
                                  INNER JOIN `category` ON `category`.`category_id`= `article`.`category_id`
                                  WHERE `category`.`slug` like "' . $slug . '"';

                        if (!$result = $sql->query($query)) {
                            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                        }
                        if ($result->num_rows > 0) {
                            while ($record = $result->fetch_array()) {
                                $active_class = '';
                                if ($record["slug"] == $slug) {
                                    $active_class = 'active';
                                }
                                echo "<li>";
                                ?>
                                <h1><?php echo $record['title_ur']; ?></h1>
                                <?php
                                $queryarticleimg = 'SELECT * FROM article_image WHERE article_id="' . $record['article_id'] . '"';
                                if (!$resultarticleimg = $sql->query($queryarticleimg)) {
                                    dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $queryarticleimg);
                                }

                                if ($resultarticleimg->num_rows > 0) {

                                    while ($recordarticleimg = $resultarticleimg->fetch_array()) {
                                        ?>
                                        <img src="<?php echo $base_url . "/" . $recordarticleimg['thumb_original_name']; ?>">
                                        <?php
                                    }
                                }
                                ?>

                                <p><?php echo $record['description_ur']; ?></p>
                                <?php
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php include "include/sidebar.inc.php"; ?>
        </div>
    </article>
</section>
<?php
include "include/footer.inc.php";
?>