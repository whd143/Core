<?php
$include_prefix = '../';
include $include_prefix . "include/header.inc.php";

$page_id = isset($_GET['page_id']) ? $_GET['page_id'] : NULL;
if (is_null($page_id)) {
    header('LOCATION: index.php');
} else {
    $query = <<<HDOC
                    DELETE FROM `static_page`  
                    WHERE `page_id`  = '{$sql->real_escape_string($page_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: index.php');
}
