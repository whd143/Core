<!------headlines------>
<section id="headline-bg">
    <article class="headline">
        <h1> : اپڈیٹس</h1>
        <?php
        $query = 'SELECT * FROM article WHERE `category_id`=7 AND `is_featured`=1 AND `publish_on`<=NOW() ORDER BY `publish_on` ASC LIMIT 0,6';
        if (!$result = $sql->query($query)) {
            echo "Error Running Query : $sql->error" . "<br /><br /><br />" . $query;
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
        }
        if ($result->num_rows > 0) {
            while ($record = $result->fetch_array()) {
                ?>
                <a href="<?php $base_url ?>inner.php?article_id=<?php echo $record['article_id']; ?>"><?php echo $record['title_' . $_SESSION['lang']]; ?></a>
                <?php
            }
        }
        ?> 


        <marquee direction="right">وريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن</marquee>    		
    </article>
</section>	
<!------headlines------>
