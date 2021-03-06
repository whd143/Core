<?php

$include_prefix = '../';
include $include_prefix . "include/header.inc.php";

$golden_word_id = isset($_GET['golden_word_id']) ? $_GET['golden_word_id'] : NULL;
if (is_null($golden_word_id)) {
    header('LOCATION: index.php');
} else {
    $query = <<<HDOC
                    DELETE FROM `golden_word`  
                    WHERE `golden_word_id`  = '{$sql->real_escape_string($golden_word_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: index.php');
}
