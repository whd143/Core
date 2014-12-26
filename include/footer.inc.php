<div style="clear:both"></div>
<!------Footer------>
<footer >
    <div id="footer-bg">
        <div  class="footer">
            <?php
            $query = "SELECT * FROM `static_page` WHERE `is_active`=1";
            if (!$result = $sql->query($query)) {
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
            if ($result->num_rows > 0) {
                while ($record = $result->fetch_array()) {
                    echo '<a href="' . $base_url . '/page.php?slug=' . $record["slug"] . '" style="font-weight:bold;">' . $record['title_' . $_SESSION['lang']] . '</a>';
                    echo '<span style="color:#fff;">&nbsp;&nbsp;|&nbsp;&nbsp;</span>';
                }
            }
            ?>

            <span ><a href="javascript:void(0);"><img src="images/fb.png" style="vertical-align: middle"></a></span>
            <a href="javascript:void(0);"><img src="images/tw.png" style="vertical-align: middle"></a> 


            <div class="clear"></div> 
            <br />
            <div>کاپی رائٹ © 2014 الفلاح، جملہ حقوق محفوظ ہیں</p>
            </div>
        </div>
        <div style="clear:both"></div>
</footer>
<!------Footer------>

</body>
</html>
