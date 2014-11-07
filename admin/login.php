<?php

require_once "include/setting.inc.php";

$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : NULL;
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : NULL;

/**
 * A string literal can be specified in four different ways
 * 
 * http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
 */
$query = <<<HDOC
    SELECT *
        FROM `admin` 
        WHERE `username` = '{$sql->real_escape_string($username)}'
        AND `password` =  MD5('$password')
HDOC;
if (!$result = $sql->query($query)) {
    dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
}
if ($result->num_rows) {
    /**
     * storing record details into session
     */
    $record = $result->fetch_object();
    $_SESSION["id"] = $record->admin_id;
    $_SESSION["name"] = $record->name;
    $_SESSION["username"] = $record->username;
    $_SESSION["email"] = $record->email;
    $_SESSION["password"] = $record->password;
    /**
     * redirect to dashboard page
     */
    header("LOCATION: dashboard.php");
} else {
    $_SESSION["error_message"] = "Please enter valid username and password";
    /**
     * invalid credentials, redirect to login page
     */
    header("LOCATION: index.php");
}
