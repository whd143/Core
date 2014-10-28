<?php include "includes/header.php"; 

if(isset($_REQUEST['softballsubmit']))
{
$custom_glove_type=$_REQUEST['softballglovetype'];
$custom_glove_name=$_REQUEST['glovename'];
$date=date("Ymd");
	
	mysql_query('INSERT INTO products (custom_prod_id,glove_made_type,date_created,gloves_type,name) 
	VALUES 
	("36","custom","'.$date.'","'.$custom_glove_type.'","'.$custom_glove_name.'")');
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
		
	mysql_query('INSERT INTO softball_attribute 
	(prod_id,stamp,stamp_bg,laces,web,welting,binding,palm,finger_pad,outside,outside_2,wrist,wing_tip,black_laces,embroidery_style,embroidery_name,embroidery_color,upload_logo,upload_flag,person_name_select) 
	VALUES (
	"'.$cat_last_id.'","white","white","white","white","white","white","white","white","white","white","white","white","white","None","no name","white","No image","No image","No name")');
	
	}



?>





<!--Soft base start-->

<script type="text/javascript">
	$(document).ready(function(){
		$(".showers").hide();
		$(".glove_content").click(function(){
			$(".glove_content").removeClass("activer");
			$(this).addClass("activer");
			$(".showers").slideDown();
		});
		$(".colorcode").click(function(){

			if($(".activer").text() == "outside"){
				$(".outside").attr("src","images/soft_base/outside/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("outside").value=$(this).attr("data-value");
			}
			if($(".activer").text() == "outside 2"){
				$(".outside2").attr("src","images/soft_base/outside2/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("outside_2").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "web"){
				$(".web").attr("src","images/soft_base/web/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("web").value=$(this).attr("data-value");
			}			
			else if($(".activer").text() == "stamp"){
				$(".thumb").attr("src","images/soft_base/thumb/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("stamp").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "laces"){
				$(".laces").attr("src","images/soft_base/laces/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("laces").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "binding"){
				$(".binding").attr("src","images/soft_base/binding/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("binding").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "stamp bg"){
				$(".thumb_bg").attr("src","images/soft_base/thumb_bg/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("stamp_bg").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "welting"){
				$(".welting").attr("src","images/soft_base/welting/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("welting").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "base"){
				$(".base").attr("src","images/soft_base/base/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("base").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "palm"){
				$(".palm").attr("src","images/soft_base/palm/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("palm").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "wing"){
				$(".wing").attr("src","images/soft_base/wing/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("wing").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "wrist"){
				$(".wrist").attr("src","images/soft_base/border/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("wrist").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "finger pad"){
				$(".finger_pad").attr("src","images/soft_base/finger_pad/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("finger_pad").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "wing tip"){
				$(".wing_tip").attr("src","images/soft_base/wing_tip/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("wing_tip").value=$(this).attr("data-value");
			}
			else if($(".activer").text() == "back laces"){
				$(".back_laces").attr("src","images/soft_base/back_laces/"+$(this).attr("data-value") +"_"+ $(".activer").text()+".png");
				document.getElementById("back_laces").value=$(this).attr("data-value");
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

<!--Soft base ends-->

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
                    <div class="thumb_soft_base"><img class="thumb" alt="" src="" /></div><!--thumb_soft_base-->
                    <div class="outside_soft_base"><img class="outside" alt="" src="" /></div><!--outside_soft_base-->
                    <div class="outside2_soft_base"><img class="outside2" alt="" src="" /></div><!--outside_soft_base-->
                    <div class="thumb_bg_soft_base"><img class="thumb_bg" alt="" src="" /></div><!--thumb_bg_soft_base-->
                    <div class="web_soft_base"><img class="web" alt="" src="" /></div><!--web_soft_base-->
                    <div class="laces_soft_base"><img class="laces" alt="" src="" /></div><!--laces_soft_base-->
                    <div class="welting_soft_base"><img class="welting" alt="" src="" /></div><!--welting_soft_base-->
                    <div class="binding_soft_base"><img class="binding" alt="" src="" /></div><!--binding_soft_base-->
                    <div class="palm_soft_base"><img class="palm" alt="" src="" /></div><!--palm_soft_base-->
                    <div class="finger_soft_base"><img class="finger_pad" alt="" src="" /></div><!--palm_soft_base-->
                    <div class="wrist_pad_soft_base"><img class="wrist" alt="" src="" /></div><!--palm_soft_base-->
                    <div class="wingtip_pad_soft_base"><img class="wing_tip" alt="" src="" /></div><!--palm_soft_base-->
                    <div class="back_laces_soft_base"><img class="back_laces" alt="" src="" /></div><!--palm_soft_base-->
            </div><!--glove_customization-->
        <div class="glove_buttons">
            <div class="glove_content"><button>stamp</button></div><!--glove_content-->
            <div class="glove_content"><button>stamp bg</button></div><!--glove_content-->
            <div class="glove_content"><button>laces</button></div><!--glove_content-->
            <div class="glove_content"><button>web</button></div><!--glove_content-->
            <div class="glove_content"><button>welting</button></div><!--glove_content-->
            <div class="glove_content"><button>binding</button></div><!--glove_content-->
            <div class="glove_content"><button>palm</button></div><!--glove_content-->
            <div class="glove_content"><button>finger pad</button></div><!--glove_content-->
            <div class="glove_content"><button>outside</button></div><!--glove_content-->
            <div class="glove_content"><button>outside 2</button></div><!--glove_content-->
            <div class="glove_content"><button>wrist</button></div><!--glove_content-->
            <div class="glove_content"><button>wing tip</button></div><!--glove_content-->
            <div class="glove_content"><button>back laces</button></div><!--glove_content-->
            <div class="glove_content">
				<button class="show_hide">embroidery</button>
                    <div class="slidingDiv">
                        <label><input type="radio" name="embroidery_style" value="I-Web" />I-Web</label>
                        <label><input type="radio" name="embroidery_style" value="Y-Web" />Y-Web</label>
                        <label><input type="radio" name="embroidery_style" value="E-Web" />E-Web</label>
                        <label><input type="radio" name="embroidery_style" value="Camo" />Camo</label>
                        <label><input type="radio" name="embroidery_style" value="H-Web" />H-Web</label>
                        <label><input type="radio" name="embroidery_style" value="V-Web" />V-Web</label>
                        <label><input type="radio" name="embroidery_style" value="Trapeze Web" />Trapeze Web</label>
                        <label><input type="radio" name="embroidery_style" value="Camo" />Camo</label>
                        <label><input type="radio" name="embroidery_style" value="Basket Web" />Basket Web</label>
                        <label><input type="radio" name="embroidery_style" value="Mod Trapeze Web" />Mod Trapeze Web</label>
                        <label><input type="radio" name="embroidery_style" value="Cross Web" />Cross Web</label>
                        <label><input type="radio" name="embroidery_style" value="1-Piece Web" />1-Piece Web</label>
                        <label><input type="radio" name="embroidery_style" value="2-Piece Web" />2-Piece Web</label>
                    	
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
            
        </div>
        
        
        <div class="cartonprd">
                <div class="cartonprdprc">
                
                
                <?php 
				$query=mysql_query("SELECT * FROM products WHERE prod_id='36'");
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
                    <input type="hidden" name="binding" id="binding" value="White">
                    <input type="hidden" name="palm" id="palm" value="White">
                    <input type="hidden" name="finger_pad" id="finger_pad" value="White">
                    <input type="hidden" name="outside" id="outside" value="White">
                    <input type="hidden" name="outside_2" id="outside_2" value="White">
                    <input type="hidden" name="wrist" id="wrist" value="White">
                    <input type="hidden" name="wing_tip" id="wing_tip" value="White">
                    <input type="hidden" name="back_laces" id="back_laces" value="White">
                    <input type="hidden" name="embroidery_style" id="embroidery_style" value="None" />
                    <input type="hidden" name="embroidery_name" id="embroidery_name" value="No Name" />
                    <input type="hidden" name="embroidery_color" id="embroidery_color" value="None" />
                    <input type="hidden" name="upload_logo" id="upload_logo" value="None" />
                    <input type="hidden" name="upload_flag" id="upload_flag" value="None" />
                    <input type="hidden" name="person_name_select" id="person_name_select" value="No Name" />
            		<input type="text" name="qtys" id="qtys" value="1" onkeyup="checkvalue()" />
                    <input class="cartonprdadd" type="button" value="Add To Cart" onclick="softballcart(<?php echo $result['prod_id']; ?>)" />
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
