<?php

$include_prefix = '../../../';
include $include_prefix . "include/header.inc.php";

$article_id = isset($_GET['article_id']) ? $_GET['article_id'] : NULL;
$article_image_id = isset($_GET['article_image_id']) ? $_GET['article_image_id'] : NULL;
if (is_null($article_id) || is_null($article_image_id)) {
    header('LOCATION: ' . $base_url . '/admin/article/posts');
} else {

    $query = <<<HDOC
                                SELECT * 
                                FROM `article_image` 
                                WHERE `article_image_id`= '{$sql->real_escape_string($article_image_id)}'
HDOC;
    if (!$result = $sql->query($query)) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }
    $record = $result->fetch_object();

    $query = <<<HDOC
                    DELETE FROM `article_image`  
                    WHERE `article_image_id`  = '{$sql->real_escape_string($article_image_id)}'
HDOC;
    if ($sql->query($query) == FALSE) {
        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
    }

    /**
     * remove assets
     */
    $destination = $_SERVER['DOCUMENT_ROOT'];
    @unlink($destination . '/' . $record->uri);
    @unlink($destination . $record->thumb);


    $_SESSION['success_message'] = ' Record has been deleted successfully.';
    header('LOCATION: ' . $base_url . '/article/posts/images?article_id=' . $article_id);
}
