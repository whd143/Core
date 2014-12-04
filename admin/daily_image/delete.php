<?php

$include_prefix = '../';
include $include_prefix . "include/header.inc.php";

$daily_image_id = isset($_GET['daily_image_id']) ? $_GET['daily_image_id'] : NULL;
if (is_null($daily_image_id)) {
    header('LOCATION: ' . $base_url . '/admin/daily_image');
} else {


    $query = <<<HDOC
                    DELETE FROM `daily_image`  
                    WHERE `daily_image_id`  = '{$sql->real_escape_string($daily_image_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }

    /**
     * remove assets
     */
    $post_destination_path = '/public/daily_images/' . $daily_image_id;
    $destination = $_SERVER['DOCUMENT_ROOT'] . $post_destination_path;
    $file_uri_parts = explode('/', $record->uri);
    @unlink($destination . '/' . $file_uri_parts[count($file_uri_parts) - 1]);
    $file_uri_parts = explode('/', $record->thumb);
    @unlink($destination . '/' . $file_uri_parts[count($file_uri_parts) - 1]);
    @unlink($destination); //remove directory 
    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: ' . $base_url . '/daily_image');
}
