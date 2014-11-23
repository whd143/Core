<?php

$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : NULL;
if (is_null($category_id)) {
    header('LOCATION: index.php');
} else {
    $query = <<<HDOC
                    DELETE FROM `category`  
                    WHERE `category_id`  = '{$sql->real_escape_string($category_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: index.php');
}
