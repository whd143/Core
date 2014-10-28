<?php
include "includes/header.php";
include	"FirstData.php";

?>
</div><!--header-->
	<div class="clear"></div><!--clear-->
    	<div class="main_body">
        	<!--mission_bar-->
                <div class="clear"></div><!--clear-->
                	<div class="container">
                        <div class="main_content">
                        	<div class="about_content">
                            
							<?php 
							
							$query=mysql_query("SELECT * FROM orders order by id DESC");
							$res=mysql_fetch_array($query);
							
							/*****With Demo account**********/
							
							$firstData = new FirstData("AG5744-01", "3k67o98en08v6169km11l418d5l1280e", true);
							
							//$firstData = new FirstData(API_LOGIN, API_KEY, true);
							
							
							// Charge
							$firstData->setTransactionType(FirstData::TRAN_PREAUTH);
							$firstData->setCreditCardType($_REQUEST['cardtype'])
									->setCreditCardNumber($_REQUEST['cardnumber'])
									->setCreditCardName($_REQUEST['cardholdername'])
									->setCreditCardExpiration($_REQUEST['expirydate'])
									->setAmount($_SESSION['totalprice'])
									->setReferenceNumber($res['id']);
							/*
							$firstData->setCreditCardType($data['type'])
									->setCreditCardNumber($data['number'])
									->setCreditCardName($data['name'])
									->setCreditCardExpiration($data['exp'])
									->setAmount($data['amount'])
									->setReferenceNumber($orderId);
							*/
							
							if($data['zip']) {
								$firstData->setCreditCardZipCode($data['zip']);
							}
							
							if($data['cvv']) {
								$firstData->setCreditCardVerification($data['cvv']);
							}
							
							if($data['address']) {
								$firstData->setCreditCardAddress($data['address']);
							}
							
							$firstData->process();
							
							// Check
							if($firstData->isError()) {
								echo '<h2 style="red">Error !</h2>';
								?>
                                	<p style="color:red">
                                    <?php 
										echo $firstData->getErrorMessage();
										$response=$firstData->getErrorMessage();
										if($response=="")
										{
											echo "Invalid Data...";
										}
									?>
                                    </p>
                                <?php
							} 
							else {
								echo '<h2 style="color:green;">Success !</h2>';
								echo '<p style="color:green;">Your order has been placed successfully...</p>';
								
								
								
								$sub_total = 0;
								$data1 =$_SESSION['cart'];
								$i=1;
								$arr=array();
								$user_id = $_SESSION['user']['user_id'];
								$que = mysql_query('select * from members where id ="'.$user_id.'"');
								$res = mysql_fetch_array($que);
								$arr['member_id'] = $res['id'];
								$data= get_order_total();
								$arr['amount'] = $data;
								$arr['order_date']=date("Ymd");;
								$arr['order_status']="new";
							
								$saved=insert($arr,"orders");
							
								$orderid=$saved;
							
								foreach($data1 as $product)
								{
								  $product_id = $product["productid"];
								  $product_qty = $product["qty"];
								  $result=mysql_query('select * from products where prod_id="'.$product_id.'"');
								  $product_array  = mysql_fetch_array($result);
					
								  $product_amount = $product_array['price'];
								  $d= array();
								  $d['order_id']=$orderid;
								  $d['product_id']=$product_id;
								  $d['qty']=$product_qty;
								  $d['unit_rate']=$product_amount;
								  insert($d,"order_detail");
								}
				
								$qy=mysql_query("SELECT * FROM orders order by id DESC");
								$rs=mysql_fetch_array($qy);
								
								foreach($_SESSION['cart'] as $key=>$val)
								{
									$pid=$val['productid']."<br />";
									$qty=$val['qty']."<br />";
									
									$pricequery=mysql_query('SELECT price FROM products WHERE prod_id="'.$pid.'"');
									$priceresult=mysql_fetch_array($pricequery);
									mysql_query('INSERT INTO order_detail (order_id,prod_id,qty,unit_rate) VALUES("'.$rs['id'].'","'.$pid.'","'.$qty.'","'.$priceresult['price'].'")');
									
									
									
									
		/******Catcher Email template****/
		
		if($pid==34)
		{
			$start=1;
			$querygetpaypallid=mysql_query('SELECT * FROM products WHERE custom_prod_id="34" ORDER BY prod_id DESC LIMIT 1');
			$paypalresult=mysql_fetch_array($querygetpaypallid);
			$updtid=$paypalresult['prod_id'];
			
			$alldataquery=mysql_query('SELECT * FROM products INNER JOIN product_user_option  ON products.prod_id = product_user_option.product_id INNER JOIN catcher_attribute ON product_user_option.product_id = catcher_attribute.prod_id WHERE products.prod_id="'.$updtid.'" group by products.prod_id');
			$alldataresult=mysql_fetch_array($alldataquery);
			
			$id=$_SESSION['user']['user_id'];
			$query=mysql_query('SELECT * FROM members WHERE id="'.$id.'"');
			$res=mysql_fetch_array($query);
			
			$email=$res['email'].",";
			$subject="Catcher Selection";												
			$message = '<html><body>';
			$message.='<div style="width:500px;">';
			$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
			$message.='Dear '.$res["name"].",".'<br /><br />';
			
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Order Id :</h3>';
			$message.=$rs['id'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Name :</h3>';
			$message.=$alldataresult['name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Type :</h3>';
			$message.=$alldataresult['gloves_type'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Specs :</h3>';
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gog Text :</h3>';
			$message.=$alldataresult['gog_text'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gog Bg :</h3>';
			$message.=$alldataresult['gog_bg'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Laces :</h3>';
			$message.=$alldataresult['laces'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Web :</h3>';
			$message.=$alldataresult['web'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Palm :</h3>';
			$message.=$alldataresult['palm'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Outside :</h3>';
			$message.=$alldataresult['outside'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Binding :</h3>';
			$message.=$alldataresult['binding'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Crown :</h3>';
			$message.=$alldataresult['crown'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Option :</h3>';
			$message.=$alldataresult['embroidery_option'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Name :</h3>';
			$message.=$alldataresult['embroidery_name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Color :</h3>';
			$message.=$alldataresult['embroidery_color'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Logo :</h3>';
			$message.=$alldataresult['personalize_logo'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Flag :</h3>';
			$message.=$alldataresult['personalize_flag'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Personalize Name :</h3>';
			$message.=$alldataresult['personalize_name'];
			
			$message.='<br /><br /><br />Thank you,<br />';
			$message.='The GroundOutGloves Team<br /><br />';
			$message.='<span style="color:grey;font-size:12px;">Please do not respond to this email. As this is the system generated email.</span>';
			$message.='</div>';
			$message .= "</body></html>";
			$headers = "From: admin@groundoutgloves.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			mail($email,$subject,$message,$headers);
			
		}
		/******Catcher Email template****/
							
							
							
							
							
							
		/******fielding Email template****/
		else if($pid==35)
		{
			$start=1;
			$querygetpaypallid=mysql_query('SELECT * FROM products WHERE custom_prod_id="35" ORDER BY prod_id DESC LIMIT 1');
			$paypalresult=mysql_fetch_array($querygetpaypallid);
			$updtid=$paypalresult['prod_id'];
			
			
			$alldataquery=mysql_query('SELECT * FROM products INNER JOIN product_user_option ON products.prod_id = product_user_option.product_id INNER JOIN fielding_attribute ON product_user_option.product_id = fielding_attribute.prod_id WHERE products.prod_id="'.$updtid.'" group by products.prod_id');
			$alldataresult=mysql_fetch_array($alldataquery);
			
			$id=$_SESSION['user']['user_id'];
			$query=mysql_query('SELECT * FROM members WHERE id="'.$id.'"');
			$res=mysql_fetch_array($query);
			
			$email=$res['email'].",";
			$subject="Fielding Selection";												
			$message = '<html><body>';
			$message.='<div style="width:500px;">';
			$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
			$message.='Dear '.$res["name"].",".'<br /><br />';
			
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Order Id :</h3>';
			$message.=$rs['id'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Name :</h3>';
			$message.=$alldataresult['name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Type :</h3>';
			$message.=$alldataresult['gloves_type'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Specs :</h3>';
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Stamp :</h3>';
			$message.=$alldataresult['stamp'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Stamp Bg :</h3>';
			$message.=$alldataresult['stamp_bg'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Laces :</h3>';
			$message.=$alldataresult['laces'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Web :</h3>';
			$message.=$alldataresult['web'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Welting :</h3>';
			$message.=$alldataresult['welting'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Palm :</h3>';
			$message.=$alldataresult['palm'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Finger Pad :</h3>';
			$message.=$alldataresult['finger_pad'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Out side 1 :</h3>';
			$message.=$alldataresult['outside_1'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Out side 2 :</h3>';
			$message.=$alldataresult['outside_2'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Binding :</h3>';
			$message.=$alldataresult['binding'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Wing :</h3>';
			$message.=$alldataresult['wing'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Wrist :</h3>';
			$message.=$alldataresult['wrist'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Option :</h3>';
			$message.=$alldataresult['embroidery_style'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Name :</h3>';
			$message.=$alldataresult['embroidery_name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Color :</h3>';
			$message.=$alldataresult['embroidery_color'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Logo :</h3>';
			$message.=$alldataresult['upload_logo'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Flag :</h3>';
			$message.=$alldataresult['upload_flag'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Personalize Name :</h3>';
			$message.=$alldataresult['person_name_select'];
			
			$message.='<br /><br /><br />Thank you,<br />';
			$message.='The GroundOutGloves Team<br /><br />';
			$message.='<span style="color:grey;font-size:12px;">Please do not respond to this email. As this is the system generated email.</span>';
			$message.='</div>';
			$message .= "</body></html>";
			$headers = "From: admin@groundoutgloves.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			mail($email,$subject,$message,$headers);
		}
		/******fielding Email template****/
									
									
		
		
		
		/******First Base Email template****/
		else if($pid==37)
		{
			$start=1;
			$querygetpaypallid=mysql_query('SELECT * FROM products WHERE custom_prod_id="37" ORDER BY prod_id DESC LIMIT 1');
			$paypalresult=mysql_fetch_array($querygetpaypallid);
			$updtid=$paypalresult['prod_id'];
			
			
			$alldataquery=mysql_query('SELECT * FROM products INNER JOIN product_user_option ON products.prod_id = product_user_option.product_id INNER JOIN firstbase_attribute ON product_user_option.product_id = firstbase_attribute.prod_id WHERE products.prod_id="'.$updtid.'" group by products.prod_id');
			$alldataresult=mysql_fetch_array($alldataquery);
			
			$id=$_SESSION['user']['user_id'];
			$query=mysql_query('SELECT * FROM members WHERE id="'.$id.'"');
			$res=mysql_fetch_array($query);
			
			$email=$res['email'].",";
			$subject="First Base Selection";												
			$message = '<html><body>';
			$message.='<div style="width:500px;">';
			$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
			$message.='Dear '.$res["name"].",".'<br /><br />';
			
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Order Id :</h3>';
			$message.=$rs['id'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Name :</h3>';
			$message.=$alldataresult['name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Type :</h3>';
			$message.=$alldataresult['gloves_type'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Specs :</h3>';
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Outside :</h3>';
			$message.=$alldataresult['outside'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Web :</h3>';
			$message.=$alldataresult['web'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Stamp :</h3>';
			$message.=$alldataresult['stamp'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Laces :</h3>';
			$message.=$alldataresult['laces'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Binding :</h3>';
			$message.=$alldataresult['binding'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Stamp Bg :</h3>';
			$message.=$alldataresult['stamp_bg'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Palm :</h3>';
			$message.=$alldataresult['palm'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Option :</h3>';
			$message.=$alldataresult['embroidery_style'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Name :</h3>';
			$message.=$alldataresult['embroidery_name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Color :</h3>';
			$message.=$alldataresult['embroidery_color'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Logo :</h3>';
			$message.=$alldataresult['upload_logo'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Flag :</h3>';
			$message.=$alldataresult['upload_flag'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Personalize Name :</h3>';
			$message.=$alldataresult['person_name_select'];
			
			$message.='<br /><br /><br />Thank you,<br />';
			$message.='The GroundOutGloves Team<br /><br />';
			$message.='<span style="color:grey;font-size:12px;">Please do not respond to this email. As this is the system generated email.</span>';
			$message.='</div>';
			$message .= "</body></html>";
			$headers = "From: admin@groundoutgloves.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			mail($email,$subject,$message,$headers);
		}
		/******First Base Email template****/
		
			
			
		/******Softball Email template****/
		else if($pid==36)
		{
			$start=1;
			$querygetpaypallid=mysql_query('SELECT * FROM products WHERE custom_prod_id="36" ORDER BY prod_id DESC LIMIT 1');
			$paypalresult=mysql_fetch_array($querygetpaypallid);
			$updtid=$paypalresult['prod_id'];
			
			
			$alldataquery=mysql_query('SELECT * FROM products INNER JOIN product_user_option ON products.prod_id = product_user_option.product_id INNER JOIN  softball_attribute ON product_user_option.product_id = softball_attribute.prod_id WHERE products.prod_id="'.$updtid.'" group by products.prod_id');
			$alldataresult=mysql_fetch_array($alldataquery);
			
			$id=$_SESSION['user']['user_id'];
			$query=mysql_query('SELECT * FROM members WHERE id="'.$id.'"');
			$res=mysql_fetch_array($query);
			
			$email=$res['email'].",";
			$subject="SoftBall Selection";												
			$message = '<html><body>';
			$message.='<div style="width:500px;">';
			$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
			$message.='Dear '.$res["name"].",".'<br /><br />';
			
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Order Id :</h3>';
			$message.=$rs['id'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Name :</h3>';
			$message.=$alldataresult['name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Type :</h3>';
			$message.=$alldataresult['gloves_type'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Gloves Specs :</h3>';
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
			
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Stamp :</h3>';
			$message.=$alldataresult['stamp'];
				
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Stamp Bg :</h3>';
			$message.=$alldataresult['stamp_bg'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Laces :</h3>';
			$message.=$alldataresult['laces'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Web :</h3>';
			$message.=$alldataresult['web'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Welting :</h3>';
			$message.=$alldataresult['welting'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Binding :</h3>';
			$message.=$alldataresult['binding'];
		
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Palm :</h3>';
			$message.=$alldataresult['palm'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Finger Pad :</h3>';
			$message.=$alldataresult['finger_pad'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Outside :</h3>';
			$message.=$alldataresult['outside'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Outside 2 :</h3>';
			$message.=$alldataresult['outside_2'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Wrist :</h3>';
			$message.=$alldataresult['wrist'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Wing_tip :</h3>';
			$message.=$alldataresult['wing_tip'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Black Laces :</h3>';
			$message.=$alldataresult['black_laces'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Option :</h3>';
			$message.=$alldataresult['embroidery_style'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Name :</h3>';
			$message.=$alldataresult['embroidery_name'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Embroidery Color :</h3>';
			$message.=$alldataresult['embroidery_color'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Logo :</h3>';
			$message.=$alldataresult['upload_logo'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Flag :</h3>';
			$message.=$alldataresult['upload_flag'];
			
			$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Personalize Name :</h3>';
			$message.=$alldataresult['person_name_select'];
			
			$message.='<br /><br /><br />Thank you,<br />';
			$message.='The GroundOutGloves Team<br /><br />';
			$message.='<span style="color:grey;font-size:12px;">Please do not respond to this email. As this is the system generated email.</span>';
			$message.='</div>';
			$message .= "</body></html>";
			$headers = "From: admin@groundoutgloves.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			mail($email,$subject,$message,$headers);
		}
		/******Softball Email template****/
			else
			{
				/*
				$id=$_SESSION['user']['user_id'];
				$query=mysql_query('SELECT * FROM members WHERE id="'.$id.'"');
				$res=mysql_fetch_array($query);
				
				$email=$res['email'].",";
				$subject="Your Shopping";												
				$message = '<html><body>';
				$message.='<div style="width:500px;">';
				$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
				$message.='Dear '.$res["name"].",".'<br /><br />';
				
				
				foreach($_SESSION['cart'] as $key=>$val)
				{
					$id=$val['productid']."<br />";
					
					$not_show=array(34,35,36,37);
					
					if(!in_array($id,$not_show))
					{
						echo $id;
					}
				}
				
				$message.='<h3 style="color: #D8160D;font: bold 18px CenturyGothicRegular,Arial,Helvetica,sans-serif;">Order Id :</h3>';
				$message.=$rs['id'];
				
				
				
				
				mail($email,$subject,$message);
				*/
			}
									
								}
								
							}
							?>
                            
                          </div><!--about_content-->
						<div class="clear"></div><!--clear-->
					
</div><!--main_content-->
    </div><!--container-->
        </div><!--main_body-->
        	<div class="clear"></div><!--clear-->


<?php include "includes/footer.php"; ?>

