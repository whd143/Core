<?php
include "includes/dbconnect.php";
unset($_SESSION['user']);
header("location:index.php");
?>