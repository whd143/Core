<?php  
	 include "includes/dbconnect.php";

	$active=$_REQUEST['activationkey']; 
	if($_REQUEST['activationkey'])
	{
		$empty="";
		$activelink=$_REQUEST['activationkey'];
		$query = mysql_query('SELECT email FROM members WHERE token="'.$active.'"');
		$result = mysql_fetch_array($query);
		$email = $result['email'];
		$_SESSION['user']  = $email;
		mysql_query('UPDATE members SET token="'.$empty.'",status=1,token_is_active=1 WHERE token="'.$active.'"');
		echo "Your account has been activated...";
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $base_url; ?>";
		</script>
		<?php
	}
	else{
		echo "Your token has been expired . . . .";
	}
?>
                   