<?php
$include_prefix = '../../../';
include $include_prefix . "include/header.inc.php";
if(!isset($_REQUEST['article_id'])){
    header('LOCATION: '.$base_url.'/article/posts');
}
?>

<div id="content">
    <div class="container"> 
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Article Images Management<a href="<?php echo $base_url; ?>/article/posts/images/add.php?article_id=<?php echo $_REQUEST['article_id']; ?>" class="float-right">+ Add New Record</a></div>
                    <div class="panel-content">
                        <?php if (isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success">
                                <strong>Success! </strong>
                                <?php echo $_SESSION['success_message']; ?>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        endif;
                        ?>
                        <div class="bord">
                            <table class="display" cellspacing="0" width="100%" id="stopNGTable">
                                <thead>
                                    <tr>
                                        <th class="text-align-left pl20 width20"><strong>Thumb: </strong></th>
                                        <th class="text-align-left pl20 width20"><strong>Title(UR): </strong></th>
                                        <th class="text-align-left pl20 width20"><strong>Title(EN): </strong></th>
                                        <th class="text-align-center"><strong>Display Order</strong> </th>
                                        <th class="text-align-center"><strong>Status</strong> </th>
                                        <th class="text-align-center"><strong>Control</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `article_image`";
                                    if (!$result = $sql->query($query)) {
                                        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                                    }
                                    if ($result->num_rows > 0) {
                                        while ($record = $result->fetch_object()) {
                                            //echo "<pre>"; print_r($record); exit;
                                            $thumb = ""; //default thumb url
                                            if (!is_null($record->thumb)) {
                                                $thumb = $record->thumb;
                                            }

                                            echo '<tr class="height60 gradeA">
                                                <td  class="text-align-center"><img src="' . $thumb . '" style="width:30px;"/></td>
                                                <td  class="text-align-left pl20">' . $record->title_ur . '</td>
                                                <td  class="text-align-left pl20">' . $record->title_en . '</td>    
                                                <td  class="text-align-center">' . $record->display_order . '</td>
                                                <td  class="text-align-center">' . (($record->is_active == 1) ? 'Active' : 'Inactive') . '</td>
                                                <td class="text-align-center">
                                                    <a href="' . $base_url . '/article/posts/images/edit.php?article_id=' . $record->article_id . '&article_image_id=' . $record->article_image_id . '">
                                                        <img src="' . $base_url . '/img/edit-icon.png" />  
                                                    </a>
                                                    &nbsp;
                                                    <a href="' . $base_url . '/article/posts/images/delete.php?article_id=' . $record->article_id . '&article_image_id=' . $record->article_image_id . '">
                                                        <img src="' . $base_url . '/img/delete-icon.png" width="17px"/>  
                                                    </a>
                                                </td>
                                        </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($include_prefix)) {
    require_once $include_prefix . 'include/footer.inc.php';
} else {
    require_once 'include/footer.inc.php';
}
?>