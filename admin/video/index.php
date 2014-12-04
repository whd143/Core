<?php
$include_prefix = '../';
include $include_prefix . "include/header.inc.php";
?>

<div id="content">
    <div class="container"> 
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i>Video Management<a href="<?php echo $base_url; ?>/video/add.php" class="float-right">+ Add New Record</a></div>
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
                                        <th class="text-align-left pl20"><strong>URL</strong></th>
                                        <th class="text-align-left pl20"><strong>Keywords</strong></th>
                                        <th class="text-align-center"><strong>Control</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `video` ORDER BY `created_on` DESC";
                                    if (!$result = $sql->query($query)) {
                                        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                                    }
                                    if ($result->num_rows > 0) {
                                        while ($record = $result->fetch_object()) {

                                            echo '<tr class="height60 gradeA">
                                                <td  class="text-align-left pl20">' . $record->video_url . '</td>
                                                <td  class="text-align-left pl20">' . $record->video_keyword . '</td>
                                                <td class="text-align-center">
                                                    <a href="' . $base_url . '/video/edit.php?video_id=' . $record->video_id . '">
                                                        <img src="' . $base_url . '/assets/images/edit-icon.png" />  
                                                    </a>
                                                    &nbsp;
                                                    <a href="' . $base_url . '/video/delete.php?video_id=' . $record->video_id . '">
                                                        <img src="' . $base_url . '/assets/images/delete-icon.png" width="17px"/>  
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