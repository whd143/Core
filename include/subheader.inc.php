<!------hadees------>
<section id="hadees-bg" >
    <article class="hadees">
        <div class="mubarak-bg">

            <?php
            $query = "SELECT * FROM `golden_word` WHERE `publish_on`<=NOW() LIMIT 0,1";
            if (!$result = $sql->query($query)) {
                dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
            }
            if ($result->num_rows > 0) {
                $record = $result->fetch_array();
                ?>
                <div class="mubarak" id="ehkaam">
                    <h3 >شروع اللہ کے نام سے جو بے انتہا مہربان، رحم فرمانے والا ہے</h3>
                    <?php echo $record['ayat_' . $_SESSION['lang']]; ?>
                </div>

                <div class="mubarak hide" id="hadees">
                    <h3 >حدیث نبویﷺ</h3>
                    <?php echo $record['hadith_' . $_SESSION['lang']]; ?>
                </div>

                <div class="mubarak  hide" id="akwal_zaree">
                    <h3 >اقوال زریں</h3>
                    <?php echo $record['quote_' . $_SESSION['lang']]; ?>
                </div>
                <?php
            }
            ?>
            <div>
                <a href="javascript:void(0);" class="nice_words" data-target="#akwal_zaree">اقوال زریں</a>
                <a href="javascript:void(0);" class="nice_words" data-target="#hadees">حدیث نبوی</a>
                <a href="javascript:void(0);" class="nice_words active" data-target="#ehkaam">احکام الھی</a>
            </div>
        </div>
        <div class="voda">
            <img src="images/subHeaderAD.png" alt="Ad 261x198" class="round-border" />
        </div>

        <!-- weather widget -->
        <div  id="weather" style="float:left;">
            <p style="display: block !important; width: 160px; text-align: center; font-family: sans-serif; font-size: 12px;">
                <a href="http://weathertemperature.com/forecast/?q=Lahore,Punjab,Pakistan" title="Lahore, Punjab, Pakistan Weather Forecast" onclick="this.target = '_blank'">
                    <img src="http://widget.addgadgets.com/weather/v1/?q=Lahore,Punjab,Pakistan&amp;s=2&amp;u=1" alt="Weather temperature in Lahore, Punjab, Pakistan" width="160" height="198" style="border:0" />
                </a>
                <br />
                <a href="http://weathertemperature.com/" title="Get latest Weather Forecast updates" style="font-family: sans-serif; font-size: 12px" onclick="this.target = '_blank'">Weather Forecast</a>
            </p>
            <div style="clear:both"></div>
        </div> 
    </article>
</section>