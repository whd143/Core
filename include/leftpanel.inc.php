<div class="left">


    <?php
    $query = "SELECT * FROM `category` WHERE `is_active`=1 AND `show_as_menu`=0 ORDER BY `display_order` ASC";
    if (!$result = $sql->query($query)) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    if ($result->num_rows > 0) {
        while ($record = $result->fetch_array()) {
            $active_class = '';
            if (isset($_GET['category']) && $record["slug"] == $_GET['category']) {
                $active_class = 'active';
            }
            if (isset($category_id)) {
                $category_id = $record['category_id'];
            }
            ?>
            <div class="news">
                <div class="ftr">

                    <h1><a href="category.php?category_id=<?php echo $record["category_id"]; ?>"><?php echo $record['title_ur']; ?></a></h1>
                    <img src="<?php echo $base_url . "/" . $record['thumb']; ?>">
                </div>

        <?php
        $queryarticle = 'SELECT * FROM article WHERE category_id="7" LIMIT 3';
        if (!$resultarticles = $sql->query($queryarticle)) {
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $queryarticle);
        }

        if ($resultarticles->num_rows > 0) {
            if (isset($art_id)) {
                $art_id = $recordarticles['article_id'];
            }
            while ($recordarticles = $resultarticles->fetch_array()) {
                ?>
                        <div class="psts">


                        <?php
                        $queryarticleimg = 'SELECT * FROM article_image WHERE article_id=2';
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

                            <p>
                            <?php echo substr($recordarticles['description_ur'], 0, 80); ?>

                            </p>
                            <a href="<?php echo $base_url?>/inner.php?article_id=<?php echo $recordarticles['article_id']; ?>">تفصیلات ملاحظہ کریں </a>
                            <span><?php echo $recordarticles['publish_on']; ?></span>
                        </div>
                                <?php
                            }
                        }
                        ?>
            </div>
        <?php
    }
}
?>
</div>

