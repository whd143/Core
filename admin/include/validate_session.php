<?php
if (!isset($_SESSION['username'])) {
    $_SESSION["error_message"] = "Please log in to access the secure area.";
    header("LOCATION: index.php");
}