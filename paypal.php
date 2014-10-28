<?php 
	include "includes/dbconnect.php";
?>
                
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="payPalForm">
                <input type="hidden" name="business" value="ahsanghias4@gmail.com">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="upload" value="1">
                <input type='hidden' name='rm' value='2'>
                <?php
                $data1 =$_SESSION['cart'];
                //print_r($_SESSION['cart']);
                $i=1;
				foreach($data1 as $product)
				{
				  $product_id = $product["productid"];
				  $product_qty = $product["qty"];
				  $result=mysql_query('select * from products where prod_id="'.$product_id.'"');
				  $product_array  = mysql_fetch_array($result);
				  $product_amount = $product_array['price'];
				?>
				 <input name="amount_<?php echo $i?>" type="hidden" id="amount" value="<?php echo $product_amount; ?>" size="45">
				 <input name="item_name_<?php echo $i?>" type="hidden" id="item_name" value="<?php echo $product_array['name']; ?>"  size="45">
				 <input type="hidden" name="quantity_<?php echo $i?>" value="<?php echo $product_qty; ?>">
				 <input type="hidden" name="item_number_<?php echo $i?>" value="<?php echo  $product_array['prod_id']; ?>">
				 <?php $i++; } ?>
                   <input type="hidden" name="shipping" value="0" />
    <input type="hidden" name="no_note" value="1" />
				 <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="notify_url" value="<?php echo $base_url; ?>">
				 <input type="hidden" name="return" value="<?php echo $base_url; ?>welcome.php">
                 </form>
				 <script type="text/javascript">
					document.forms["payPalForm"].submit();
				 </script>