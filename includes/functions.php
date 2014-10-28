<?php
include "includes/dbconnect.php";

function catcherinsert(){
	
	$updtid=$_REQUEST['updateid'];
	$gogtext=$_REQUEST['gogtext'];
	$gogbg=$_REQUEST['gogbg'];
	$laces=$_REQUEST['laces'];
	$web=$_REQUEST['web'];
	$palm=$_REQUEST['palm'];
	$outside=$_REQUEST['outside'];
	$binding=$_REQUEST['binding'];
	$crown=$_REQUEST['crown'];
	$embroidery_style=$_REQUEST['embroidery_style'];
	$embroidery_name=$_REQUEST['embroidery_name'];
	$embroidery_color=$_REQUEST['embroidery_color'];
	$upload_logo=$_REQUEST['upload_logo'];
	$upload_flag=$_REQUEST['upload_flag'];
	$person_name_select=$_REQUEST['person_name_select'];
	
	mysql_query('UPDATE catcher_attribute SET 
	gog_text="'.$gogtext.'",
	gog_bg="'.$gogbg.'",
	laces="'.$laces.'",
	web="'.$web.'",
	palm="'.$palm.'",
	outside="'.$outside.'",
	binding="'.$binding.'",
	crown="'.$crown.'",
	embroidery_option="'.$embroidery_style.'",
	embroidery_name="'.$embroidery_name.'",
	embroidery_color="'.$embroidery_color.'",
	personalize_logo="'.$upload_logo.'",
	personalize_flag="'.$upload_flag.'",
	personalize_name="'.$person_name_select.'" 
	WHERE prod_id="'.$updtid.'"');
	
	/*
	$alldataquery=mysql_query('SELECT * FROM products INNER JOIN PRODUCT_USER_OPTION  ON products.prod_id = product_user_option.product_id INNER JOIN catcher_attribute ON product_user_option.product_id = catcher_attribute.prod_id WHERE products.prod_id="'.$updtid.'" group by products.prod_id');
	$alldataresult=mysql_fetch_array($alldataquery);
	
	$id=$_SESSION['user']['user_id'];
	$query=mysql_query('SELECT * FROM members WHERE id="'.$id.'"');
	$res=mysql_fetch_array($query);
	
	
	$email=$res['email'].",";
	$subject="User Selection";												
	$message = '<html><body>';
	$message.='<div style="width:500px;">';
	$message.='<h2 style="color: #D8160D;font: bold 20px CenturyGothicRegular,Arial,Helvetica,sans-serif;">GroundOutGloves</h2>';
	$message.='Dear '.$res["name"].",".'<br /><br />';
	
	
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
	*/								
												
	
	
}

function fieldinginsert(){
	$updtid=$_REQUEST['updateid'];
	$stamp=$_REQUEST['stamp'];
	$stamp_bg=$_REQUEST['stamp_bg'];
	$laces=$_REQUEST['laces'];
	$web=$_REQUEST['web'];
	$welting=$_REQUEST['welting'];
	$palm=$_REQUEST['palm'];
	$finger_pad=$_REQUEST['finger_pad'];
	$outsideone=$_REQUEST['outside_1'];
	$outsidetwo=$_REQUEST['outside_2'];
	$binding=$_REQUEST['binding'];
	$wing=$_REQUEST['wing'];
	$wrist=$_REQUEST['wrist'];
	$embroidery_style=$_REQUEST['embroidery_style'];
	$embroidery_name=$_REQUEST['embroidery_name'];
	$embroidery_color=$_REQUEST['embroidery_color'];
	$upload_logo=$_REQUEST['upload_logo'];
	$upload_flag=$_REQUEST['upload_flag'];
	$person_name_select=$_REQUEST['person_name_select'];
	mysql_query('UPDATE fielding_attribute SET stamp="'.$stamp.'",stamp_bg="'.$stamp_bg.'",laces="'.$laces.'",web="'.$web.'",welting="'.$welting.'",palm="'.$palm.'",finger_pad="'.$finger_pad.'",outside_1="'.$outsideone.'",outside_2="'.$outsidetwo.'",binding="'.$binding.'",wing="'.$wing.'",wrist="'.$wrist.'",embroidery_style="'.$embroidery_style.'",embroidery_name="'.$embroidery_name.'",embroidery_color="'.$embroidery_color.'",upload_logo="'.$upload_logo.'",upload_flag="'.$upload_flag.'",person_name_select="'.$person_name_select.'" WHERE prod_id="'.$updtid.'"');

}

function firstbaseinsert(){
	$updtid=$_REQUEST['updateid'];
	$outside=$_REQUEST['outside'];
	$web=$_REQUEST['web'];
	$stamp=$_REQUEST['stamp'];
	$laces=$_REQUEST['laces'];
	$binding=$_REQUEST['binding'];
	$stamp_bg=$_REQUEST['stamp_bg'];
	$wrist=$_REQUEST['wrist'];
	$palm=$_REQUEST['palm'];
	$embroidery_style=$_REQUEST['embroidery_style'];
	$embroidery_name=$_REQUEST['embroidery_name'];
	$embroidery_color=$_REQUEST['embroidery_color'];
	$upload_logo=$_REQUEST['upload_logo'];
	$upload_flag=$_REQUEST['upload_flag'];
	$person_name_select=$_REQUEST['person_name_select'];
	mysql_query('UPDATE firstbase_attribute SET outside="'.$outside.'",web="'.$web.'",stamp="'.$stamp.'",laces="'.$laces.'",binding="'.$binding.'",stamp_bg="'.$stamp_bg.'",wrist="'.$wrist.'",palm="'.$palm.'",embroidery_style="'.$embroidery_style.'",embroidery_name="'.$embroidery_name.'",embroidery_color="'.$embroidery_color.'",upload_logo="'.$upload_logo.'",upload_flag="'.$upload_flag.'",person_name_select="'.$person_name_select.'" WHERE prod_id="'.$updtid.'"');
}


function softballinsert(){

	$updtid=$_REQUEST['updateid'];
	$stamp=$_REQUEST['stamp'];
	$stamp_bg=$_REQUEST['stamp_bg'];
	$laces=$_REQUEST['laces'];
	$web=$_REQUEST['web'];
	$welting=$_REQUEST['welting'];
	$binding=$_REQUEST['binding'];
	$palm=$_REQUEST['palm'];
	$finger_pad=$_REQUEST['finger_pad'];
	$outside=$_REQUEST['outside'];
	$outsidetwo=$_REQUEST['outside_2'];
	$wrist=$_REQUEST['wrist'];
	$wing_tip=$_REQUEST['wing_tip'];
	$black_laces=$_REQUEST['back_laces'];
	$embroidery_style=$_REQUEST['embroidery_style'];
	$embroidery_name=$_REQUEST['embroidery_name'];
	$embroidery_color=$_REQUEST['embroidery_color'];
	$upload_logo=$_REQUEST['upload_logo'];
	$upload_flag=$_REQUEST['upload_flag'];
	$person_name_select=$_REQUEST['person_name_select'];
	
	mysql_query('UPDATE softball_attribute SET stamp="'.$stamp.'",stamp_bg="'.$stamp_bg.'",laces="'.$laces.'",web="'.$web.'",welting="'.$welting.'",binding="'.$binding.'",palm="'.$palm.'",finger_pad="'.$finger_pad.'",outside="'.$outside.'",outside_2="'.$outsidetwo.'",wrist="'.$wrist.'",wing_tip="'.$wing_tip.'",black_laces="'.$black_laces.'",embroidery_style="'.$embroidery_style.'",embroidery_name="'.$embroidery_name.'",embroidery_color="'.$embroidery_color.'",upload_logo="'.$upload_logo.'",upload_flag="'.$upload_flag.'",person_name_select="'.$person_name_select.'" WHERE prod_id="'.$updtid.'"');
	
	
	
}

function get_product_name($pid) {
    $result = mysql_query("select name from products where prod_id=$pid") or die("select name from products where prod_id=$pid" . "<br/><br/>" . mysql_error());
    $row = mysql_fetch_array($result);
    return $row['name'];
}

function get_price($pid) {
    $result = mysql_query("select price from products where prod_id=$pid") or die("select name from products where prod_id=$pid" . "<br/><br/>" . mysql_error());
    $row = mysql_fetch_array($result);

    return $row['price'];
}

function remove_product($pid) {

    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function insert_id() {
    return intval(mysql_insert_id());
}

function insert($arr, $table_name) {

    $cols = implode(",", array_keys($arr));
    $values = implode("','", $arr);
    $values = "'" . $values . "'";
    $query = "insert into $table_name ($cols) values($values)";
	
	$result = mysql_query($query);
    if ($result) {
        return insert_id();
    } else {
        return false;
    }
}

function get_order_total() {

    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        //echo "\n pid===>".$pid ."\n";
        $q = $_SESSION['cart'][$i]['qty'];
        $price = get_price($pid);
        $sum+=$price * $q;
    }

    return $sum;
}

function addtocart($pid, $q) {
    if ($pid < 1 or $q < 1)
        return;

    if (is_array($_SESSION['cart'])) {
        if (product_exists($pid))
        {
        	$_SESSION['cart'][0]['qty'] = $q;
			return;
		}
		$max = count($_SESSION['cart']);
        $_SESSION['cart'][$max]['productid'] = $pid;
        $_SESSION['cart'][$max]['qty'] = $q;
    }
    else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productid'] = $pid;
        $_SESSION['cart'][0]['qty'] = $q;
    }
}

function product_exists($pid) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            $flag = 1;
            break;
        }
    }
    return $flag;
}

?>