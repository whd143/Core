<?php
$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";

$article_id = isset($_GET['article_id']) ? $_GET['article_id'] : NULL;
if (is_null($article_id)) {
    header('LOCATION: index.php');
} else {
    $query = <<<HDOC
                    DELETE FROM `article`  
                    WHERE `article_id`  = '{$sql->real_escape_string($article_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: index.php');
}
