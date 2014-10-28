<?php
	// Some settings
	$msg = "";
	$username = "demo";
	$password = "demo"; // Change the password to something suitable

	
			session_start();
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['user'] = $username;

			$return =  htmlentities($_REQUEST['return_url']);
			header("location: " . $return);
		
		

?>
