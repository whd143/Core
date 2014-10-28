<?php 

include "includes/header.php";

if(isset($_REQUEST['catchersubmit']))
{
$custom_glove_type=$_REQUEST['catcherglovetype'];
$custom_glove_name=$_REQUEST['glovename'];
$date=date("Ymd");
	
	mysql_query('INSERT INTO products (custom_prod_id,glove_made_type,date_created,gloves_type,name) VALUES ("34","custom","'.$date.'","'.$custom_glove_type.'","'.$custom_glove_name.'")');
	$cat_last_id=mysql_insert_id();
	foreach($_POST as $option_title_id=>$sub_option_id)
	{
		if(gettype($option_title_id)=="integer")
		{
			$option_title_id."=>".$sub_option_id."<br />";
			mysql_query('INSERT INTO product_user_option (product_id,option_title_id,sub_option_id) VALUES ("'.$cat_last_id.'","'.$option_title_id.'","'.$sub_option_id.'")');
	
		}
	}	
	mysql_query('INSERT INTO catcher_attribute (prod_id,gog_text,gog_bg,laces,web,palm,outside,binding,crown,embroidery_option,embroidery_name,embroidery_color,personalize_logo,personalize_flag,personalize_name) VALUES ("'.$cat_last_id.'","white","white","white","white","white","white","white","white","white","no name","white","No image","No image","No name")');
}

?>

<!--Catcher code starts-->

<script type="text/javascript">
	$(document).ready(function(){
		$(".showers").hide();
		$(".glove_content").click(function(){
			$(".glove_content").removeClass("activer");
			$(this).addClass("activer");
			$(".showers").slideDown();
		});
		$(".colorcode").click(function(){
			
			
			if($(".activer").text() == "GOG Text"){
				$(".logo_gog").attr("src","images/catcher/logo/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("gogtext").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "GOG BG"){
				$(".logo_gog_bg").attr("src","images/catcher/thumb_bg/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("gogbg").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "laces"){
				$(".laces_catcher").attr("src","images/catcher/laces/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("laces").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "web"){
				$(".web").attr("src","images/catcher/web/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("web").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "palm"){
				$(".palm").attr("src","images/catcher/palm/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("palm").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "outside"){
				$(".outside").attr("src","images/catcher/outside/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("outside").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "binding"){
				$(".binding").attr("src","images/catcher/binding/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
			    document.getElementById("binding").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "crown"){
				$(".crown").attr("src","images/catcher/crown/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("crown").value=$(this).attr("data-value");
			}
			
			
			
		});

			$(".slidingDiv").hide();
			$(".show_hide").show();
			$('.show_hide').click(function(){
				
				$(".slidingDiv").slideToggle();
				
		    });

			$(".slidingDiv2").hide();
			$(".show_hide2").show();
			$('.show_hide2').click(function(){
			$(".slidingDiv2").slideToggle();
		});
			$(".close").click(function(){
				$(".showers").slideUp();
				
			});
		});
</script>

<!--Catcher code ends-->

    </div><!--container-->
<div class="clear"></div><!--clear-->

    	<div class="main_body">
        <div class="clear"></div><!--clear-->
    <div class="container">
        <div class="main_content">
            <div class="design_glove">
                <div class="glove_img">
                    <div class="glove_design">
                        <div class="showers">
                            <div class="colorcode pink_color" data-value="pink">Pink</div>
                            <div class="colorcode purple_color" data-value="purple">Purple</div>
                            <div class="colorcode maroon_color" data-value="maroon">maroon</div>
                            <div class="colorcode red_color" data-value="red">red</div>
                            <div class="colorcode orange_color" data-value="orange">orange</div>
                            <div class="colorcode yellow_color" data-value="yellow">yellow</div>
                            <div class="colorcode white_color" data-value="white">white</div>
                            <div class="colorcode grey_color" data-value="grey">grey</div>
                            <div class="colorcode black_color" data-value="black">black</div>
                            <div class="colorcode navy_color" data-value="navy">navy</div>
                            <div class="colorcode blue_color" data-value="blue">blue</div>
                            <div class="colorcode ltblue_color" data-value="ltblue">ltblue</div>
                            <div class="colorcode aqua_color" data-value="aqua">aqua</div>
                            <div class="colorcode green_color" data-value="green">green</div>
                            <div class="colorcode drkgreen_color" data-value="drkgreen">drkGreen</div>
                            <div class="colorcode drkbrown_color" data-value="drkbrown">drkBrown</div>
                            <div class="colorcode tan_color" data-value="tan">tan</div>
                            <div class="colorcode bone_color" data-value="bone">bone</div>
                            <div class="close"><img src="images/close_button.png" alt="" /></div>
                        </div><!--showers-->
                    <div class="clear"></div><!--clear-->
                <div class="glove_customization">
                    <div class="gog_text_catcher"><img class="logo_gog" alt="" src="" /></div><!--outside_catcher-->
                    <div class="logo_gog_cacher"><img class="logo_gog_bg" alt="" src="" /></div><!--outside_catcher-->
                    <div class="fingerpad_catcher"><img class="finger_pad_catcher" alt="" src="" /></div><!--web_catcher-->
                    <div class="laces-catcher"><img class="laces_catcher" alt="" src="" /></div><!--laces_catcher-->
                    <div class="web_catcher"><img class="web" alt="" src="" /></div><!--thumb_catcher-->
                    <div class="outside_catcher"><img class="outside" alt="" src="" /></div><!--binding_catcher-->
                    <div class="thumb_bg_catcher"><img class="thumb_bg" alt="" src="" /></div><!--thumb_bg_catcher-->
                    <div class="palm_catcher"><img class="palm" alt="" src="" /></div><!--palm_catcher-->
                    <div class="binding_catcher"><img class="binding" alt="" src="" /></div><!--palm_catcher-->
                    <div class="crown_catcher"><img class="crown" alt="" src="" /></div><!--palm_catcher-->
                    
                    
            </div><!--glove_customization-->
        <div class="glove_buttons">
            <div class="glove_content"><button>GOG Text</button></div><!--glove_content-->
            <div class="glove_content"><button>GOG BG</button></div><!--glove_content-->
            <div class="glove_content"><button>laces</button></div><!--glove_content-->
            <div class="glove_content"><button>web</button></div><!--glove_content-->
            <div class="glove_content"><button>palm</button></div><!--glove_content-->
            <div class="glove_content"><button>outside</button></div><!--glove_content-->
            <div class="glove_content"><button>binding</button></div><!--glove_content-->
            <div class="glove_content"><button>crown</button></div><!--glove_content-->
            <div class="glove_content">
				<button class="show_hide">embroidery</button>
                    <div class="slidingDiv">
                        <label><input type="radio" name="embroidery_style_check" value="None" checked="checked" />None</label>
                        <label><input type="radio" name="embroidery_style_check" value="Green Digital Camo" />Green Digital Camo</label>
                        <label><input type="radio" name="embroidery_style_check" value="B&amp;W Digital Camo" />B&amp;W Digital Camo</label>
                        <label><input type="radio" name="embroidery_style_check" value="Camo" />Camo</label>
                        <label><input type="radio" name="embroidery_style_check" value="Silver Mesh" />Silver Mesh</label>
                        <label><input type="radio" name="embroidery_style_check" value="Black Mesh" />Black Mesh</label>
                        <label><input type="radio" name="embroidery_style_check" value="Brown Mesh" />Brown Mesh</label>
                        
                        <p>Embroidery name</p>
                        <input type="text" name="emb_name" id="emb_name" value="" />
                        
                        <p>Select Color</p>
                        <ul class="select_color">
                        	<li><a href="javascript:void(0)" class="pink_color" data-color="#FF69B4"></a></li>
                        	<li><a href="javascript:void(0)" class="purple_color" data-color="#800080" ></a></li>
                        	<li><a href="javascript:void(0)" class="maroon_color" data-color="#800000" ></a></li>
                        	<li><a href="javascript:void(0)" class="red_color" data-color="#FF0000" ></a></li>
                        	<li><a href="javascript:void(0)" class="orange_color" data-color="#FFA500" ></a></li>
                        	<li><a href="javascript:void(0)" class="yellow_color" data-color="#FFFF00" ></a></li>
                        	<li><a href="javascript:void(0)" class="white_color" data-color="#ffffff" ></a></li>
                        	<li><a href="javascript:void(0)" class="grey_color" data-color="#CCCCCC" ></a></li>
                        	<li><a href="javascript:void(0)" class="black_color" data-color="#000000" ></a></li>
                        	<li><a href="javascript:void(0)" class="navy_color" data-color="#000080" ></a></li>
                        	<li><a href="javascript:void(0)" class="blue_color" data-color="#0000FF" ></a></li>
                        	<li><a href="javascript:void(0)" class="ltblue_color" data-color="#CCFFFF"></a></li>
                        	<li><a href="javascript:void(0)" class="aqua_color" data-color="#028482" ></a></li>
                        	<li><a href="javascript:void(0)" class="green_color" data-color="##00FF00" ></a></li>
                        	<li><a href="javascript:void(0)" class="drkgreen_color" data-color="#006400"></a></li>
                        	<li><a href="javascript:void(0)" class="drkbrown_color" data-color="#2D1813" ></a></li>
                        	<li><a href="javascript:void(0)" class="tan_color" data-color="#D2B48C" ></a></li>
                        	<li><a href="javascript:void(0)" class="bone_color" data-color="#E1D4C0" ></a></li>
                        </ul>

                    </div><!--slidingDiv-->

            </div><!--glove_content-->

            <div class="glove_content">
				<button class="show_hide2">Personalize</button>
                    <div class="slidingDiv2">
                    	<p>Upload Logo</p>
                        <input type="file" name="logo" id="logo" class="uploadlogo" />
                    	<p>Flag</p>
                        <input type="file" name="flag" id="flag" class="uploadflag" />
                    	<p>Add your Name</p>
                        <input type="text" name="personalize_name" id="personalize_name" />
                        
                    </div><!--slidingDiv-->

            </div><!--glove_content-->
			
            
            <div class="cartonprd">
                <div class="cartonprdprc">
                
                
                <?php 
				$query=mysql_query("SELECT * FROM products WHERE prod_id='34'");
				$result=mysql_fetch_array($query);
                ?>
                <div class="cartonprdprc">
                	<strong>Price :</strong> <p>$<?php echo $result['price']; ?></p>
                </div>
               
                <h3>Quantity: </h3>
                
                <form action="" name="catcherform" id="catcherform">
                
                    <input type="hidden" name="productid" />
                    <input type="hidden" id="qtsval" name="qtsval" />
                    <input type="hidden" name="command"  />
                    <input type="hidden" value="<?php echo $cat_last_id; ?>" name="updateid" id="updateid">
                    <input type="hidden" name="gogtext" id="gogtext" value="White">
                    <input type="hidden" name="gogbg" id="gogbg" value="White">
                    <input type="hidden" name="laces" id="laces" value="White">
                    <input type="hidden" name="web" id="web" value="White">
                    <input type="hidden" name="palm" id="palm" value="White">
                    <input type="hidden" name="outside" id="outside" value="White">
                    <input type="hidden" name="binding" id="binding" value="White">
                    <input type="hidden" name="crown" id="crown" value="White">
                    <input type="hidden" name="embroidery_style" id="embroidery_style" value="None" />
                    <input type="hidden" name="embroidery_name" id="embroidery_name" value="No Name" />
                    <input type="hidden" name="embroidery_color" id="embroidery_color" value="None" />
                    <input type="hidden" name="upload_logo" id="upload_logo" value="None" />
                    <input type="hidden" name="upload_flag" id="upload_flag" value="None" />
                    <input type="hidden" name="person_name_select" id="person_name_select" value="No Name" />
            		<input type="text" name="qtys" id="qtys" value="1" onkeyup="checkvalue()" />
                    <input class="cartonprdadd" type="button" value="Add To Cart" onclick="catchercart(<?php echo $result['prod_id']; ?>)" />
                </form>
            </div>
            
        </div><!--glove_buttons-->
    </div><!--glove_design-->                                
</div><!--glove_img-->
    </div><!--design_glove-->
        <div class="clear"></div><!--clear-->
            </div><!--main_content-->
                </div><!--container-->
            </div><!--main_body-->
<div class="clear"></div><!--clear-->


<?php include "includes/footer.php"; ?>


