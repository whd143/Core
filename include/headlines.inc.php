<!------headlines------>
<section id="headline-bg">
    <article class="headline">
        <h1> : اپڈیٹس</h1>
        <div id="example">

            <?php
            $query = 'SELECT * FROM article WHERE `category_id`=2 AND `publish_on`<=NOW() ORDER BY `publish_on` ASC LIMIT 0,6'; //`is_featured`=1 AND 
            if (!$result = $sql->query($query)) {
                echo "Error Running Query : $sql->error" . "<br /><br /><br />" . $query;
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
            if ($result->num_rows > 0) {
                echo '<ul >';
                while ($record = $result->fetch_array()) {
                    ?>
                    <li >
                        <a href="<?php $base_url ?>inner.php?article_id=<?php echo $record['article_id']; ?>"><?php echo $record['title_' . $_SESSION['lang']]; ?></a>
                    </li>
                        <?php
                    }
                    echo '</ul>';
                }
                ?> 
        </div>

    </article>
</section>	
<!------headlines------>
