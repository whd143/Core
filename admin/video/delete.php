<?php

$include_prefix = '../';
include $include_prefix . "include/header.inc.php";

$video_id = isset($_GET['video_id']) ? $_GET['video_id'] : NULL;
if (is_null($video_id)) {
    header('LOCATION: index.php');
} else {
    $query = <<<HDOC
                    DELETE FROM `video`  
                    WHERE `video_id`  = '{$sql->real_escape_string($video_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: index.php');
}
