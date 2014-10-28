<?php
error_reporting(0);

/********Live server*********/
list($a,$b,$c,$d,$parameter)=explode('/',$_SERVER['SCRIPT_FILENAME']);
$curent=$parameter;
/********Live server*********/

/********Local server*********/
//list($a,$b,$c,$d,$parameter)=explode('/',$_SERVER['SCRIPT_FILENAME']);
//$curent=$parameter;
/********Local server*********/

include "includes/functions.php";
include "includes/dbconnect.php";


if (isset($_REQUEST['command']) && $_REQUEST['command'] == 'delete' && $_REQUEST['pid'] > 0) {
	
    remove_product($_REQUEST['pid']);
	
} else if ($_REQUEST['command'] == 'clear') {
    
	unset($_SESSION['cart']);
	
} else if ($_REQUEST['command'] == 'update') {
	
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = intval($_REQUEST['product' . $pid]);
        if ($q > 0 && $q <= 999) {
            $_SESSION['cart'][$i]['qty'] = $q;
        } else {
            $msg = 'Some proudcts not updated!, quantity must be a number between 1 and 999';
        }
    }
	
}

if ($_REQUEST['command'] == 'add'  && $_REQUEST['productid'] > 0) {
    	
		$pid = $_REQUEST['productid'];
		
		//$qtys = isset($_REQUEST['qtys2']) ? $_REQUEST['qtys2'] : 1;
	
		if(isset($_REQUEST['qtsval']))
		{
			$qtys=$_REQUEST['qtsval'];
		}
		

	addtocart($pid,$qtys);
	
	if($pid=="34")
	{
		catcherinsert();
	}
	if($pid=="35")
	{
		fieldinginsert();
	}
	if($pid=="36")
	{		
		softballinsert();
	}
	if($pid=="37")
	{
		firstbaseinsert();
	}
	//catcherinsert();
	//fieldinginsert();
	//firstbaseinsert();
	//softballinsert();
	header("location:shoppingcart.php");
    exit();	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php 
	$query=mysql_query('SELECT * FROM seo WHERE pg_php="'.$curent.'"');
	if($result=mysql_fetch_array($query))
	{
	?>
	<meta name="Keywords" content="<?php echo $result['keywords']; ?>"/>
	<meta name="Description" content="<?php echo $result['description']; ?>"/> 
	<?php 
	}
	else
	{
	?>
	<meta name="Keywords" content="Normal Keywords"/>
	<meta name="Description" content="Normal descriptions"/> 
	<?php
    }
	?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/glove.css" />
<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css" />
<title>Welcome to Our Website</title>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>

<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider();
	});
</script>

<script src="js/toucheffects.js"></script>

<script src="js/owl.carousel.js"></script>

<script type="text/javascript">

	/***********************Catcher Product*********************************/
	
	function checkvalue() {
	 	
		$("input").focusout(function(){
  			var x=document.getElementById("qtys").value;
			if(x < 1){
				alert("Please enter valid value");
			   document.getElementById('qtys').value = "1";
			}
		});
	}
  	
	$(function()
	{
		$('.slidingDiv input[type=radio]').change(function(){
			record=$(this).val();
			document.getElementById('embroidery_style').value=record;
		})
		
		$("input").keyup(function(){
			embname=document.getElementById("emb_name").value;
			document.getElementById("embroidery_name").value=embname;
		});
		
		$("input").keyup(function(){
			persname=document.getElementById("personalize_name").value;
			document.getElementById("person_name_select").value=persname;
		});
		
		$(".select_color li a").click(function(){
			embroiderycolor=$(this).attr("data-color");
			document.getElementById("embroidery_color").value=embroiderycolor;
		});
		
		$('.slidingDiv2 .uploadlogo').change(function(){
			uploadlogo=document.getElementById("logo").value;
			document.getElementById("upload_logo").value=uploadlogo;
		})
		
		
		$('.slidingDiv2 .uploadflag').change(function(){
			flag=document.getElementById("flag").value;
			document.getElementById("upload_flag").value=flag;
		})
		
	});
	
	/***********************Catcher Product*********************************/
  
  
  	
	
  
</script>
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
</script>
<script>
$(document).ready(function() {

  $("#owl-demo").owlCarousel({
	items :1,
	lazyLoad : true,
	navigation : true
  });
	
});
</script>

<script type="text/javascript">

        $(function() {

            $("[name=toggler]").click(function() {

                $('.toHide').hide();

                $("#blk-" + $(this).val()).show('slow');

            });

        });

    </script>

<script type="text/javascript">
$(document).ready(function(){
	
	$('input[name=toggler]').click(function()
	{
		var CreditCardType;
		CreditCardType =$('input[name=toggler]:checked').attr("data-title");
		document.getElementById('mastercardtype').value=CreditCardType;
		document.getElementById('visa').value=CreditCardType;
		document.getElementById('discover').value=CreditCardType;
		document.getElementById('dinersclub').value=CreditCardType;
		document.getElementById('americanexpress').value=CreditCardType;
		document.getElementById('jcb').value=CreditCardType;
	});
	
	$(".glove_types_select a").click(function(){
		
		var CatcherGloveType;
		CatcherGloveType = $('input[name=select_type]:checked').val();
		document.getElementById('catcherglovetype').value=CatcherGloveType;
		
		var FieldingGloveType;
		FieldingGloveType = $('input[name=select_type]:checked').val();
		document.getElementById('fieldingglovetype').value=FieldingGloveType;
		
		var FirstbaseGloveType;
		FirstbaseGloveType = $('input[name=select_type]:checked').val();
		document.getElementById('firstbaseglovetype').value=FirstbaseGloveType;
		
		var SoftballGloveType;
		SoftballGloveType = $('input[name=select_type]:checked').val();
		document.getElementById('softballglovetype').value=SoftballGloveType;
		
		//$('.formErrorContent').hide();
		var curr = this;
		if($(".glove_type:visible").length){
		$(".glove_type:visible").slideUp("slow");
			$(curr).siblings("a").removeClass("active");
				$(curr).toggleClass("active");
				$(curr).next(".glove_type").slideToggle("slow")
		}
		else{
			$(curr).siblings("a").removeClass("active");
			$(curr).toggleClass("active");
			$(curr).next(".glove_type").slideToggle("slow")
		}
	});
});
</script>
    
    
    
<script type="text/javascript">

            function addtocart(pid) {
				document.form1.productid.value = pid;
				document.form1.qtsval.value = document.getElementById('qtys').value;
                document.form1.command.value = 'add';
                document.form1.submit();
            }

			function catchercart(pid) {
				document.catcherform.productid.value = pid;
				document.catcherform.qtsval.value = document.getElementById('qtys').value;
                document.catcherform.command.value = 'add';
                document.catcherform.submit();
            }
			
			function fieldcart(pid) {
				document.catcherform.productid.value = pid;
				document.catcherform.qtsval.value = document.getElementById('qtys').value;
                document.catcherform.command.value = 'add';
                document.catcherform.submit();
            }
			
			function firstbasecart(pid) {
				document.catcherform.productid.value = pid;
				document.catcherform.qtsval.value = document.getElementById('qtys').value;
                document.catcherform.command.value = 'add';
                document.catcherform.submit();
            }
			
			function softballcart(pid) {
				document.catcherform.productid.value = pid;
				document.catcherform.qtsval.value = document.getElementById('qtys').value;
                document.catcherform.command.value = 'add';
                document.catcherform.submit();
            }
			
            function del(pid) {

                if (confirm('Do you really want to delete this item')) {

                    document.form2.pid.value = pid;
                    document.form2.command.value = 'delete';
                    document.form2.submit();

                }

            }

            function clear_cart() {

                if (confirm('This will empty your shopping cart, continue?')) {

                    document.form2.command.value = 'clear';
                    document.form2.submit();

                }

            }

            function update_cart() {

                document.form2.command.value = 'update';
                document.form2.submit();

            }
			
			
			function valid() {

                if (confirm("Are you sure you want to continue?")) {

                    document.form2.command.value = 'saveorder';

                    return true;

                }

                else

                    return false;

            }
			
</script>
  


</head>

<body>
	
    <form name="form1" >

        <input type="hidden" name="productid" />
		<input type="hidden" id="qtsval" name="qtsval" />
        <input type="hidden" name="command"  />

    </form>

	<div class="wrapper">
    	<div class="header">
            <div class="container">
            	<div class="logo"><a href="<?php echo $base_url; ?>"><img src="images/logo.png" alt="" /></a></div><!--logo-->
                <div class="header_right">
                	<div class="social_links_cart">
                    	<div class="social_links">
                        	<ul>
                            	<?php $fbquery=mysql_query("SELECT * FROM social WHERE social_id=1"); 
									  $fb=mysql_fetch_array($fbquery);
								?>
                            	<li><a href="<?php echo $fb['links']; ?>" target="_blank" class="facebook_btn roll_over"></a></li>
                            	
								<?php $twquery=mysql_query("SELECT * FROM social WHERE social_id=2"); 
									  $tw=mysql_fetch_array($twquery);
								?>
                                <li><a href="<?php echo $tw['links']; ?>" target="_blank" class="twittwe_btn roll_over"></a></li>
                            	
								<?php $gquery=mysql_query("SELECT * FROM social WHERE social_id=6"); 
									  $g=mysql_fetch_array($gquery);
								?>
                                <li><a href="<?php echo $g['links']; ?>" target="_blank" class="google_btn roll_over"></a></li>
                            	
								<?php $prquery=mysql_query("SELECT * FROM social WHERE social_id=5"); 
									  $pr=mysql_fetch_array($prquery);
								?>
                                <li><a href="<?php echo $pr['links']; ?>" target="_blank" class="pintrest_btn roll_over"></a></li>
                            	
								<?php $igquery=mysql_query("SELECT * FROM social WHERE social_id=7"); 
									  $ig=mysql_fetch_array($igquery);
								?>
                                <li><a href="<?php echo $ig['links']; ?>" target="_blank" class="instagram_btn roll_over"></a></li>
                            </ul>
                        </div><!--social_links-->
                        <div class="register">
							
							<?php
                        	if(isset($_SESSION['user']))
							{
								
								$username=$_SESSION['user'];
                        	    $result = mysql_query('SELECT id FROM members WHERE name LIKE "' . $username . '"');
							    $entry = mysql_fetch_array($result);
							    $member_id = $entry['id'];
								
								?>
									<h4>Welcome </h4><p><?php echo $_SESSION['user']['uname']; ?></p>
                                    <div class="clear"></div>
                                    <a href="profile.php?member_id=<?php echo $member_id; ?>">My account</a>
                                    <a href="logout.php">Signout</a>
								<?php
                            }
							else
							{
							?>
                        	<a href="register.php">Register</a>
                        	<a href="login.php">Login</a>
                            <?php 
							}
							?>
                            
                        </div><!--cart_btn-->
                        <div class="cart_btn">
                        	
                        	<a href="shoppingcart.php">Shopping Cart</a><div class="numb-cont">
							<?php 
								echo count($_SESSION['cart']);
							?>
                            </div>
                        </div><!--cart_btn-->
                    </div><!--social_links_cart-->
				<div class="clear"></div><!--clear-->
			<div class="nav">
				<ul>
                	<li><a href="<?php echo $base_url; ?>"
                    <?php if($curent=="index.php") 
					{
						?>
                        class="active"
                        <?php
					}?>>Home</a></li>
                    
                    <li><a href="about.php" 
					<?php if($curent=="about.php") 
					{
						?>
                        class="active"
                        <?php
					}?>>
                    about
                    </a></li>
                    
                    <li>
                    <a href="gallery.php"
                    <?php if($curent=="gallery.php") 
					{
						?>
                        class="active"
                        <?php
					}?>>catalogue</a></li>
                    
                    <li><a href="#create_glove"
                    <?php if($curent=="design_glove.php") 
					{
						?>
                        class="active"
                        <?php
					}?> class="fancybox">design glove</a>
                    	
                    <ul>
                        <li><a href="#">First</a></li>
                        <li><a href="#">Second</a></li>
                        <li><a href="#">Third</a></li>
                        <li><a href="#">Fourth</a></li>
                    </ul>		
                            
                    </li>
                    <li><a href="contact.php"
                    <?php if($curent=="contact.php") 
					{
						?>
                        class="active"
                        <?php
					}?>>Contact</a></li>
                </ul>
            </div><!--nav-->
        </div><!--header_right-->
    </div><!--container-->
<div class="clear"></div><!--clear-->