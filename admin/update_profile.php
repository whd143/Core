<?php

require_once "include/setting.inc.php";

if (isset($_REQUEST['submit'])) {
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
    $new_password = isset($_REQUEST['new_password']) ? $_REQUEST['new_password'] : '';
    $confirm_password = isset($_REQUEST['confirm_password']) ? $_REQUEST['confirm_password'] : '';

    if ($new_password == $confirm_password && md5($password) == $_SESSION['password']) {
        /**
         * A string literal can be specified in four different ways
         * 
         * http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
         */
        $query = <<<HDOC
        UPDATE  `admin` 
        SET 
            `name`=  '{$sql->real_escape_string($name)}',
            `username`=  '{$sql->real_escape_string($username)}',   
            `email`=  '{$sql->real_escape_string($email)}',  
            `password`=  MD5('$new_password')  
        WHERE `admin_id` = '{$sql->real_escape_string($_SESSION['id'])}' AND `password`=MD5('$password')
HDOC;

        if (!$result = $sql->query($query)) {
            dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
        }
        $_SESSION['success_message'] = "Your profile has been updated successfuly . . . . .";
        $_SESSION["name"] = $name;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = md5($password);
        header("LOCATION: edit_profile.php");
    } else {
        if ($new_password != $confirm_password) {
            $_SESSION['error_message'] = "Your new password doesn't match . . . . .";
        } else { //current password is invalid
            $_SESSION['error_message'] = "Your current password is wrong . . . . .";
        }
        header("LOCATION: edit_profile.php");
    }
}
?>