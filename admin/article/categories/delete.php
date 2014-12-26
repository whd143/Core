<?php

$include_prefix = '../../';
include $include_prefix . "include/header.inc.php";

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : NULL;
if (is_null($category_id)) {
    header('LOCATION: index.php');
} else {

    $query = <<<HDOC
                    SELECT * 
                    FROM `category` 
                    WHERE `category_id`= '{$sql->real_escape_string($category_id)}'
HDOC;
    if (!$result = $sql->query($query)) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    //fetch record to delete the files
    $record = $result->fetch_object();


    $query = <<<HDOC
                    DELETE FROM `category`  
                    WHERE `category_id`  = '{$sql->real_escape_string($category_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }

    /**
     * remove assets
     */
    $destination = $_SERVER['DOCUMENT_ROOT'];
    @unlink($destination . '/demo' . $record->icon);
    @unlink($destination . '/demo' . $record->thumb);

    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: index.php');
}
