<div class="bayan">
    <h1>طارق جمیل کے نئے البیان</h1>
    <img src="images/tariqjamil.png">
    <p>
        لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر"  والتي حوت أيضاً على نسخ من نص لوريم إيبسوم. 
    </p>
    <a href="#">تفصیلات ملاحظہ کریں <img src="images/bullet.png"></a>
</div>
<div class="banner">

    <div class="advanced-slider" id="responsive-slider">
        <ul class="slides">

			
            <?php
						$query = 'SELECT * FROM article WHERE `is_featured`=1 LIMIT 5';
						if (!$result = $sql->query($query)) {
							dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
						}
						if ($result->num_rows > 0) {
							while ($record = $result->fetch_array()) {
								$active_class='';
								if(isset($_GET['category']) && $record["slug"]==$_GET['category']){
									$active_class='active';
									
								}
								?>
                                
                                <?php 
									$queryarticleimg = 'SELECT * FROM article_image WHERE article_id="'.$record['article_id'].'"';
									if (!$resultarticleimg = $sql->query($queryarticleimg)) {
										dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $queryarticleimg);
									}
									
									if ($resultarticleimg->num_rows > 0) {
									
									while($recordarticleimg = $resultarticleimg->fetch_array())
									{
										?>
                                        	 <li class="slide rounded-caption">
                                                <img class="image" src="<?php echo $base_url."/".$recordarticleimg['slider_full_img']; ?>" alt=""/>
                                                <img class="thumbnail" src="<?php echo $base_url."/".$recordarticleimg['slider_thumbnail']; ?>" alt="<?php echo $record['title_ur']; ?>"/>
                                            </li>
			                                <img src="<?php echo $base_url."/".$recordarticleimg['thumb_original_name']; ?>">
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