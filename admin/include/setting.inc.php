<?php

session_start();


        const CSS_PATH = '';

function getBaseURI() {
    return sprintf(
            "%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME']
    );
}

$base_url = getBaseURI() . '/angular.local';
/**
 * Error / Notice Settings
 */
if (strstr($base_url, 'local') != FALSE) { // local server
    error_reporting(E_ALL); // & ~E_NOTICE & ~ E_WARNING
    ini_set('display_errors', 'On');
}

/**
 * Database connection settings
 */
if (strstr($base_url, 'local') == FALSE) { // live server settings
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = '';
} else { //local server settings
	$host = '127.0.0.1';
    $user = 'root';
    $password = 'secret';
    $db_name = 'deenoduniya';
}

//echo $host.' - '.$user.' - '.$password.' - '.$db_name;
//exit;
$sql = new mysqli($host, $user, $password, $db_name);
if ($sql->connect_errno > 0) {
    die('Unable to connect to database [' . $sql->connect_error . ']');
}

/**
 * Dump sql errors 
 */
function dumpSql($msg) {
    global $base_url;
    if (strstr($base_url, 'local') != FALSE) { // local server
        exit($msg);
    } else {
        exit('Apologize..Our website is temporarily down, please visit later:(');
    }
}

/**
 * 
 * @param string $mime_type
 * @return string
 */
function retrieveFileExtension($mime_type) {
    switch ($mime_type) {
        case "image/png": return '.png';
            break;
        case "image/jpeg":
        case "image/jpg":
            return '.jpg';
            break;
    }
}
