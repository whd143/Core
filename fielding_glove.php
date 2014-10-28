<?php include "includes/header.php"; 

if(isset($_REQUEST['fieldsubmit']))
{
$custom_glove_type=$_REQUEST['fieldingglovetype'];
$custom_glove_name=$_REQUEST['glovename'];
$date=date("Ymd");
	
	mysql_query('INSERT INTO products (custom_prod_id,glove_made_type,date_created,gloves_type,name) 
	VALUES 
	("35","custom","'.$date.'","'.$custom_glove_type.'","'.$custom_glove_name.'")');
	$cat_last_id=mysql_insert_id();
	foreach($_POST as $option_title_id=>$sub_option_id)
	{
		if(gettype($option_title_id)=="integer")
		{
			$option_title_id."=>".$sub_option_id."<br />";
			mysql_query('INSERT INTO product_user_option 
			(product_id,option_title_id,sub_option_id) 
			VALUES 
			("'.$cat_last_id.'","'.$option_title_id.'","'.$sub_option_id.'")');
	
		}
	}	
	mysql_query('INSERT INTO fielding_attribute 
	(prod_id,stamp,stamp_bg,laces,web,welting,palm,finger_pad,outside_1,outside_2,binding,wing,wrist,embroidery_style,embroidery_name,embroidery_color,upload_logo,upload_flag,person_name_select) 
	VALUES (
	"'.$cat_last_id.'","white","white","white","white","white","white","white","white","white","white","white","white","white","no name","white","No image","No image","No name")');
}

?>



<!--  Feilding Glove starts  -->

<script type="text/javascript">
	$(document).ready(function(){
		$(".showers").hide();
		$(".glove_content").click(function(){
			$(".glove_content").removeClass("activer");
			$(this).addClass("activer");
			$(".showers").slideDown();
		});
		$(".colorcode").click(function(){

			if($(".activer").text() == "outside 1"){
				$(".outside").attr("src","images/fielding/outside/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("outside_1").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "web"){
				$(".web").attr("src","images/fielding/web/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("web").value=$(this).attr("data-value");
			}			
			else if($(".activer").text() == "stamp"){
				$(".stamp").attr("src","images/fielding/thumb/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("stamp").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "laces"){
				$(".laces").attr("src","images/fielding/laces/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("laces").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "outside 2"){
				$(".outside2").attr("src","images/fielding/outside2/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("outside_2").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "stamp bg"){
				$(".stamp_bg").attr("src","images/fielding/thumb_bg/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("stamp_bg").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "welting"){
				$(".welting").attr("src","images/fielding/welting/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("welting").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "binding"){
				$(".binding").attr("src","images/fielding/binding/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("binding").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "Finger Pad"){
				$(".finger_pad").attr("src","images/fielding/finger_pad/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("finger_pad").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "palm"){
				$(".palm").attr("src","images/fielding/palm/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("palm").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "wing"){
				$(".wing").attr("src","images/fielding/wing/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("wing").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "wrist"){
				$(".wrist").attr("src","images/fielding/wrist/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("wrist").value=$(this).attr("data-value");
			}
});

			$(".slidingDiv").hide();
			$(".show_hide").show();
			$(".show_hide").click(function(){
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

<!--Feilding gloves ends-->



</div><!--header-->
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
                    <div class="outside_fielding"><img class="outside" alt="" src="" /></div><!--outside_fielding-->
                    <div class="web_fielding"><img class="web" alt="" src="" /></div><!--web_fielding-->
                    <div class="thumb_fielding"><img class="stamp" alt="" src="" /></div><!--thumb_fielding-->
                    <div class="laces_fielding"><img class="laces" alt="" src="" /></div><!--laces_fielding-->
                    <div class="outside2_fielding"><img class="outside2" alt="" src="" /></div><!--binding_fielding-->
                    <div class="thumb_bg_fielding"><img class="stamp_bg" alt="" src="" /></div><!--thumb_bg_fielding-->
                    <div class="welting_fielding"><img class="welting" alt="" src="" /></div><!--welting_fielding-->
                    <div class="binding_fielding"><img class="binding" alt="" src="" /></div><!--rolin_text_fielding-->
                    <div class="finger_pad_fielding"><img class="finger_pad" alt="" src="" /></div><!--finger_pad_fielding-->
                    <div class="palm_fielding"><img class="palm" alt="" src="" /></div><!--palm_fielding-->
                    <div class="wing_fielding"><img class="wing" alt="" src="" /></div><!--wing_fielding-->
                    <div class="wrist_fielding"><img class="wrist" alt="" src="" /></div><!--wrist_fielding-->
            </div><!--glove_customization-->
        <div class="glove_buttons">
            <div class="glove_content"><button>stamp</button></div><!--glove_content-->
            <div class="glove_content"><button>stamp bg</button></div><!--glove_content-->
            <div class="glove_content"><button>laces</button></div><!--glove_content-->
            <div class="glove_content"><button>web</button></div><!--glove_content-->
            <div class="glove_content"><button>welting</button></div><!--glove_content-->
            <div class="glove_content"><button>palm</button></div><!--glove_content-->
            <div class="glove_content"><button>Finger Pad</button></div><!--glove_content-->
            <div class="glove_content"><button>outside 1</button></div><!--glove_content-->
            <div class="glove_content"><button>outside 2</button></div><!--glove_content-->
            <div class="glove_content"><button>binding</button></div><!--glove_content-->
            <div class="glove_content"><button>wing</button></div><!--glove_content-->
            <div class="glove_content"><button>wrist</button></div><!--glove_content-->
            <div class="glove_content">
				<button class="show_hide">embroidery</button>
                    <div class="slidingDiv">
                        <label><input type="radio" name="embroidery_style" value="I-Web" checked="Checked" />I-Web</label>
                        <label><input type="radio" name="embroidery_style" value="Y-Web" />Y-Web</label>
                        <label><input type="radio" name="embroidery_style" value="E-Web"/>E-Web</label>
                        <label><input type="radio" name="embroidery_style" value="Camo"/>Camo</label>
                        <label><input type="radio" name="embroidery_style" value="H-Web"/>H-Web</label>
                        <label><input type="radio" name="embroidery_style" value="V-Web"/>V-Web</label>
                        <label><input type="radio" name="embroidery_style" value="Trapeze Web"/>Trapeze Web</label>
                        <label><input type="radio" name="embroidery_style" value="Camo"/>Camo</label>
                        <label><input type="radio" name="embroidery_style" value="Basket Web"/>Basket Web</label>
                        <label><input type="radio" name="embroidery_style" value="Mod Trapeze Web"/>Mod Trapeze Web</label>
                        <label><input type="radio" name="embroidery_style" value="Cross Web"/>Cross Web</label>
                        <label><input type="radio" name="embroidery_style" value="1-Piece Web"/>1-Piece Web</label>
                        <label><input type="radio" name="embroidery_style" value="2-Piece Web"/>2-Piece Web</label>
                    	
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
            
        </div><!--glove_buttons-->
        
        
        
        <div class="cartonprd">
                <div class="cartonprdprc">
                
                
                <?php 
				$query=mysql_query("SELECT * FROM products WHERE prod_id='35'");
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
                    <input type="hidden" name="stamp" id="stamp" value="White">
                    <input type="hidden" name="stamp_bg" id="stamp_bg" value="White">
                    <input type="hidden" name="laces" id="laces" value="White">
                    <input type="hidden" name="web" id="web" value="White">
                    <input type="hidden" name="welting" id="welting" value="White">
                    <input type="hidden" name="palm" id="palm" value="White">
                    <input type="hidden" name="finger_pad" id="finger_pad" value="White">
                    <input type="hidden" name="outside_1" id="outside_1" value="White">
                    <input type="hidden" name="outside_2" id="outside_2" value="White">
                    <input type="hidden" name="binding" id="binding" value="White">
                    <input type="hidden" name="wing" id="wing" value="White">
                    <input type="hidden" name="wrist" id="wrist" value="White">
                    <input type="hidden" name="embroidery_style" id="embroidery_style" value="None" />
                    <input type="hidden" name="embroidery_name" id="embroidery_name" value="No Name" />
                    <input type="hidden" name="embroidery_color" id="embroidery_color" value="None" />
                    <input type="hidden" name="upload_logo" id="upload_logo" value="None" />
                    <input type="hidden" name="upload_flag" id="upload_flag" value="None" />
                    <input type="hidden" name="person_name_select" id="person_name_select" value="No Name" />
            		<input type="text" name="qtys" id="qtys" value="1" onkeyup="checkvalue()" />
                    <input class="cartonprdadd" type="button" value="Add To Cart" onclick="fieldcart(<?php echo $result['prod_id']; ?>)" />
                </form>
            </div>
            
        </div>
        
    </div><!--glove_design-->                                
</div><!--glove_img-->
    </div><!--design_glove-->
        <div class="clear"></div><!--clear-->
            </div><!--main_content-->
                </div><!--container-->
            </div><!--main_body-->
        <div class="clear"></div><!--clear-->

<?php include "includes/footer.php"; ?>