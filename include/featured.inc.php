<?php
$query = 'SELECT * FROM article WHERE `is_featured`=1 LIMIT 0,1';
if (!$result = $sql->query($query)) {
    dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
}
if ($result->num_rows > 0) {
    while ($record = $result->fetch_array()) {

        $queryarticleimg = 'SELECT * FROM article_image WHERE article_id="' . $record['article_id'] . '" limit 0,1';
        if (!$resultarticleimg = $sql->query($queryarticleimg)) {
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $queryarticleimg);
        }
        $article_image .='<ul>';
        if ($resultarticleimg->num_rows > 0) {

            while ($recordarticleimg = $resultarticleimg->fetch_array()) {
                $article_image .='<li><img src = "' . $base_url . "/" . $recordarticleimg['slider_full_img'] . '" class="w258"></li>';
            }
        } else {
            $article_image .='<li><img src = "' . $base_url . '/images/no_image.jpg" class="w258"></li>';
        }
        $article_image .='</ul>';

        /**
         * Make sure string finish with complete word
         */
        $description = $record['description_ur'];
        if (preg_match('/^.{1,1100}/s', $description, $match)) {
            $description = $match[0];
        }
        echo '<div class = "bayan">
                <h1>' . $record['title_ur'] . '</h1>
                    ' . $article_image . '
                    <p>
                        ' . $description . '
                    </p>
                    <a href ="' . $base_url . "/inner.php?article=" . $record['slug'] . '">تفصیلات ملاحظہ کریں <img src = "' . $base_url . '"/images/bullet.png"></a>
            </div>';
    }
}
?> 

<div class = "banner">
    <?php
    $query = 'SELECT * FROM `article` WHERE `is_featured`=1 LIMIT 1,5';
    if (!$result = $sql->query($query)) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    if (0) {
        echo '<div class = "advanced-slider" id = "responsive-slider">
                    <ul class = "slides">';
        while ($record = $result->fetch_array()) {
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
        echo '</ul>
        </div>';
    }
    ?>
</div>