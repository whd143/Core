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
			
			$qtyquery=mysql_query("SELECT qty FROM order_detail WHERE prod_id='34' ORDER BY id DESC LIMIT 1");
			$qtyres=mysql_fetch_array($qtyquery);
			
			$email=$res['email'].",";
			$subject="Catcher Selection";												
			$message = '<html><body>';
			$message.='<table cellpadding="0" cellspacing="0" width="100%"><tr><td>';
			$message.=' <table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">GroundOutGloves</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">Dear '.$res["name"].',<br /><br /></strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Congratulation! You have purchased '.$qtyres['qty'].'  item(s) from GroundOutGloves.</p>
			<br />
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Order information is as following</p>
			<p style="font:bold 12px Arial, Helvetica, sans-serif;">Order No : <strong style="color:#d8160d"># '.$rs['id'].'</strong></p>
				<br />
			</td>
			</tr></table>';
			
			
			$message.='<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td>
    
    <table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Name</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Type</td>
            
        </tr>
        <tr>
        
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['name'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['gloves_type'].'</td>
            
        </tr>
    </table>
     
    
    </td>
    
    </tr>
<td height="20"></td>
    
     <tr>
    <td>
    
    <table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Specs</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gog Text</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gog Bg</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Laces</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Web</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Palm</td>
            
        </tr>
        <tr>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">';
			
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
		$message.='</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['gog_text'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['gog_bg'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['laces'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['web'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['palm'].'</td>
            
        </tr>
    </table>
     
    
    </td>
    
    </tr>
    
    
    <td height="20"></td>
    
     <tr>
    <td>
    
    <table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Outside</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Binding</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Crown</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Option</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Name</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Color</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Logo</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Flag</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Personalize Name</td>
            
        </tr>
        <tr>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['outside'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['binding'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['crown'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_option'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_name'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_color'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['personalize_logo'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['personalize_flag'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['personalize_name'].'</td>
            
        </tr>
    </table>
     
    
    </td>
    
    </tr>
    
    
    </table>';
			
	$message.='<table>
    <tr>
    <td>
    <h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">Thank You</h3>
    <strong style="font:bold 12px Arial, Helvetica, sans-serif;">The GroundOutGloves Team</strong>
    <p style="font:normal 12px Arial, Helvetica, sans-serif; color:#ccc;">Please do not respond to this email. As this is the system generated email.</p>
    </td>
    </tr>
    
    </table>';
			
			$message.='</td></tr></table>';
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
			
			$qtyquery=mysql_query("SELECT qty FROM order_detail WHERE prod_id='35' ORDER BY id DESC LIMIT 1");
			$qtyres=mysql_fetch_array($qtyquery);
			
			$email=$res['email'].",";
			$subject="Fielding Selection";												
			$message = '<html><body>';
			$message.='<table cellpadding="0" cellspacing="0" width="100%"><tr><td>';
			$message.=' <table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">GroundOutGloves</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">Dear '.$res["name"].',<br /><br /></strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Congratulation! You have purchased  '.$qtyres['qty'].' item(s) from GroundOutGloves.</p>
			<br />
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Order information is as following</p>
			<p style="font:bold 12px Arial, Helvetica, sans-serif;">Order No : <strong style="color:#d8160d"># '.$rs['id'].'</strong></p>
				<br />
			</td>
			</tr></table>';
			
			
			
			
			$message.='<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td>
    
    <table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Name</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Type</td>
            
        </tr>
        <tr>
        
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['name'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['gloves_type'].'</td>
            
        </tr>
    </table>
     
    
    </td>
    
    </tr>
<td height="20"></td>
    
     <tr>
    <td>
    
    <table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Specs</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Stamp</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Stamp Bg</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Laces</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Web</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Welting</td>
            
        </tr>
        <tr>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">';
			
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
		$message.='</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['stamp'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['stamp_bg'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['laces'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['web'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['welting'].'</td>
            
        </tr>
    </table>
     
    
    </td>
    
    </tr>
    
    
    <td height="20"></td>
    
     <tr>
    <td>
    
    <table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Palm</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Finger Pad</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Out side 1</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Out side 2</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Binding</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Wing</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Wrist</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Option</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Name</td>
            
        </tr>
        <tr>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['palm'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['finger_pad'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['outside_1'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['outside_2'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['binding'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['wing'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['wrist'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_style'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_name'].'</td>
            
        </tr>
    </table>
     
    
    </td>
    
    </tr>
    
    
    </table>';
			
			
		$message.='<table border="0" cellpadding="5" width="100%">
		<tr>
		<td>
				<tr style="background:#ccc">
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Color</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Logo</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Flag</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Personalize Name</td>
				</tr>
				<tr>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_color'].'</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">'.$alldataresult['upload_logo'].'</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">'.$alldataresult['upload_flag'].'</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">'.$alldataresult['person_name_select'].'</td>
				</tr>
				
		</td>
		</tr>
		</table>';
			
			
			$message.='<table>
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">Thank You</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">The GroundOutGloves Team</strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif; color:#ccc;">Please do not respond to this email. As this is the system generated email.</p>
			</td>
			</tr>
			
			</table>
			</td>
			</tr>
		</table>';
			
			$message.='</tr></td></table>';
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
			
			$qtyquery=mysql_query("SELECT qty FROM order_detail WHERE prod_id='37' ORDER BY id DESC LIMIT 1");
			$qtyres=mysql_fetch_array($qtyquery);
			
			$email=$res['email'].",";
			$subject="First Base Selection";												
			$message = '<html><body>';
			$message.='<table cellpadding="0" cellspacing="0" width="100%"><tr><td>';
			$message.=' <table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">GroundOutGloves</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">Dear '.$res["name"].',<br /><br /></strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Congratulation! You have purchased '.$qtyres['qty'].'  item(s) from GroundOutGloves.</p>
			<br />
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Order information is as following</p>
			<p style="font:bold 12px Arial, Helvetica, sans-serif;">Order No : <strong style="color:#d8160d"># '.$rs['id'].'</strong></p>
			<br />
			</td>
			</tr></table>';

			$message.='<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			
			<table border="0" cellpadding="5" width="100%">
				<tr style="background:#ccc">
			  
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Name</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Type</td>
				</tr>
				<tr>
				
				<td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['name'].'</td>
				<td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['gloves_type'].'</td>
					
				</tr>
			</table>
     
    
			</td>
			
			</tr>
		<td height="20"></td>
			
			 <tr>
			<td>
			
			<table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Specs</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Outside</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Web</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Stamp</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Laces</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Binding</td>
            
        </tr>
        <tr>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">';
			
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
		$message.='</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['outside'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['web'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['stamp'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['laces'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['binding'].'</td>
            
        </tr>
    </table>';
			
				
		$message.='<table border="0" cellpadding="5" width="100%">
		<tr>
		<td>
				<tr style="background:#ccc">
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Stamp Bg</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Palm</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Option</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Name</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Color</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Logo</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Flag</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Personalize Name</td>
				</tr>
				<tr>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['stamp_bg'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['palm'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_style'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_name'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_color'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['upload_logo'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['upload_flag'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['person_name_select'].'</td>
				</tr>
				
		</td>
		</tr>
		</table>';

			$message.='<table>
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">Thank You</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">The GroundOutGloves Team</strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif; color:#ccc;">Please do not respond to this email. As this is the system generated email.</p>
			</td>
			</tr>
			
			</table>
			</td>
			</tr>
		</table>';
			
			
			
			$message.='</tr></td></table>';
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
			
			
			$qtyquery=mysql_query("SELECT qty FROM order_detail WHERE prod_id='36' ORDER BY id DESC LIMIT 1");
			$qtyres=mysql_fetch_array($qtyquery);
			
			$email=$res['email'].",";
			$subject="SoftBall Selection";												
			$message = '<html><body>';
			$message.='<table cellpadding="0" cellspacing="0" width="100%"><tr><td>';
			$message.=' <table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">GroundOutGloves</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">Dear '.$res["name"].',<br /><br /></strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Congratulation! You have purchased '.$qtyres['qty'].'  item(s) from GroundOutGloves.</p>
			<br />
			<p style="font:normal 12px Arial, Helvetica, sans-serif;">Order information is as following</p>
			<p style="font:bold 12px Arial, Helvetica, sans-serif;">Order No : <strong style="color:#d8160d"># '.$rs['id'].'</strong></p>
			<br />
			</td>
			</tr></table>';

			$message.='<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			
			<table border="0" cellpadding="5" width="100%">
				<tr style="background:#ccc">
			  
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Name</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Type</td>
				</tr>
				<tr>
				
				<td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['name'].'</td>
				<td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['gloves_type'].'</td>
					
				</tr>
			</table>
     
    
			</td>
			
			</tr>
		<td height="20"></td>
			
			 <tr>
			<td>
			
			<table border="0" cellpadding="5" width="100%">
        <tr style="background:#ccc">
      
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Gloves Specs</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Stamp</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Stamp Bg</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Laces</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Web</td>
        <td style="font:bold 12px Arial, Helvetica, sans-serif;">Welting</td>
            
        </tr>
        <tr>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">';
			
			$titlequeryall=mysql_query('SELECT * FROM product_user_option WHERE product_id="'.$updtid.'"');
			while($titlequeryres=mysql_fetch_array($titlequeryall))
			{
				
				
				$titlequery=mysql_query('SELECT title FROM option_title WHERE option_title_id="'.$titlequeryres['option_title_id'].'"');
				$titleresult=mysql_fetch_array($titlequery);
				
				$suboptionquery=mysql_query('SELECT options FROM sub_option WHERE sub_option_id="'.$titlequeryres['sub_option_id'].'"');
				$suboptionresult=mysql_fetch_array($suboptionquery);
				
				$message.='<strong>'.$titleresult['title'].": "."</strong> &nbsp;&nbsp;".$suboptionresult['options']."<br />";
			}
			
		$message.='</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['stamp'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['stamp_bg'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['laces'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['web'].'</td>
        <td style="font:normal 12px Arial, Helvetica, sans-serif;">'.$alldataresult['welting'].'</td>
            
        </tr>
    </table>';
			
				
		$message.='<table border="0" cellpadding="5" width="100%">
		<tr>
		<td>
				<tr style="background:#ccc">
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Binding</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Palm</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Finger Pad</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Outside</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Outside 2</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Wrist</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Wing_tip</td>
				</tr>
				<tr>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['binding'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['palm'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['finger_pad'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['outside'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['outside_2'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['wrist'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['wing_tip'].'</td>
				</tr>
				
		</td>
		</tr>
		
		
		
		<tr>
		<td>
				<tr style="background:#ccc">
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Black Laces</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Option</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Name</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Embroidery Color</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Logo</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Flag</td>
				<td style="font:bold 12px Arial, Helvetica, sans-serif;">Personalize Name</td>
				</tr>
				<tr>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['black_laces'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_style'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_name'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['embroidery_color'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['upload_logo'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['upload_flag'].'</td>
				<td style="font:12px Arial, Helvetica, sans-serif;">'.$alldataresult['person_name_select'].'</td>
				</tr>
				
		</td>
		</tr>
		
		
		
		
		
		</table>';

			$message.='<table>
			<tr>
			<td>
			<h3 style="font:bold 20px Arial, Helvetica, sans-serif; color:#d8160d">Thank You</h3>
			<strong style="font:bold 12px Arial, Helvetica, sans-serif;">The GroundOutGloves Team</strong>
			<p style="font:normal 12px Arial, Helvetica, sans-serif; color:#ccc;">Please do not respond to this email. As this is the system generated email.</p>
			</td>
			</tr>
			
			</table>
			</td>
			</tr>
		</table>';
			
	$message.='</tr></td></table>';
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

