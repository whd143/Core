<?php
$query = 'SELECT * FROM article WHERE `category_id`=7 AND `is_featured`=1 AND `publish_on`<=NOW() ORDER BY `publish_on` ASC LIMIT 0,1';
if (!$result = $sql->query($query)) {
    echo "Error Running Query : $sql->error" . "<br /><br /><br />" . $query;
    dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
}
if ($result->num_rows > 0) {
    while ($record = $result->fetch_array()) {
        ?>

        <?php
        $queryarticleimg = 'SELECT * FROM article_image WHERE article_id="' . $record['article_id'] . '"';
        if (!$resultarticleimg = $sql->query($queryarticleimg)) {
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $queryarticleimg);
        }

        if ($resultarticleimg->num_rows > 0) {

            while ($recordarticleimg = $resultarticleimg->fetch_array()) {
                ?>
                <div class="bayan">
                    <h1><?php echo $record['title_' . $_SESSION['lang']]; ?></h1>
                    <img src="<?php echo $base_url . "/" . $recordarticleimg['slider_full_img']; ?>" style="width:250px;" />
                    <p>
                        <?php
                        /**
                         * Make sure string finish with complete word
                         */
                        $description = $record['description_' . $_SESSION['lang']];
                        if (preg_match('/^.{1,410}/s', $description, $match)) { //\b
                            $description = $match[0];
                        }
                        echo $description;
                        ?>
                    </p>
                    <a href="<?php $base_url ?>inner.php?article_id=<?php echo $record['article_id']; ?>">تفصیلات ملاحظہ کریں <img src="images/bullet.png"></a>
                </div>
                <?php
            }
        }
        ?> 
        <?php
    }
}
?>

<div class="banner">

    <div class="advanced-slider" id="responsive-slider">
        <ul class="slides">


            <?php
            $query = 'SELECT * FROM article WHERE `category_id`=7 AND `publish_on`<=NOW() ORDER BY `publish_on` ASC LIMIT 1,5';
            if (!$result = $sql->query($query)) {
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
            if ($result->num_rows > 0) {
                while ($record = $result->fetch_array()) {
                    ?>

                    <?php
                    $queryarticleimg = 'SELECT * FROM article_image WHERE article_id="' . $record['article_id'] . '"';
                    if (!$resultarticleimg = $sql->query($queryarticleimg)) {
                        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $queryarticleimg);
                    }

                    if ($resultarticleimg->num_rows > 0) {

                        while ($recordarticleimg = $resultarticleimg->fetch_array()) {
                            ?>
                            <li class="slide rounded-caption">
                                <img class="image" src="<?php echo $base_url . "/" . $recordarticleimg['slider_full_img']; ?>" alt=""/>
                                <img class="thumbnail" src="<?php echo $base_url . "/" . $recordarticleimg['slider_thumbnail']; ?>" alt="<?php echo $record['title_ur']; ?>"/>
                            </li>
                            <img src="<?php echo $base_url . "/" . $recordarticleimg['thumb_original_name']; ?>">
                            <?php
                        }
                    }
                    ?> 
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>