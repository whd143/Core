<?php
$include_prefix = '../';
include $include_prefix . "include/header.inc.php";
?>

<div id="content">
    <div class="container"> 
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Golden Words Management<a href="<?php echo $base_url; ?>/pearls/add.php" class="float-right">+ Add New Record</a></div>
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
                                        <th class="text-align-center"><strong>Publish On</strong></th>
                                        <th class="text-align-left pl20 width20"><strong>Ayat</strong></th>
                                        <th class="text-align-left pl20 width20"><strong>Hadith</strong></th>
                                        <th class="text-align-left pl20 width20"><strong>Quote</strong> </th>
                                        <th class="text-align-center"><strong>Control</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `golden_word` ORDER BY `publish_on` DESC";
                                    if (!$result = $sql->query($query)) {
                                        dumpSql("Error Running Query : $sql->error" . "<br /><br /><br />" . $query);
                                    }
                                    if ($result->num_rows > 0) {
                                        while ($record = $result->fetch_object()) {
                                            
                                            echo '<tr class="height60 gradeA">
                                                <td  class="text-align-center">' . $record->publish_on . '</td>
                                                <td  class="text-align-left pl20">' . $record->ayat_ur . '</td>
                                                <td  class="text-align-left pl20">' . $record->hadith_ur . '</td>
                                                <td  class="text-align-left pl20">' . $record->quote_ur . '</td>
                                                <td class="text-align-center">
                                                    <a href="' . $base_url . '/pearls/edit.php?golden_word_id=' . $record->golden_word_id . '">
                                                        <img src="' . $base_url . '/assets/images/edit-icon.png" />  
                                                    </a>
                                                    &nbsp;
                                                    <a href="' . $base_url . '/pearls/delete.php?golden_word_id=' . $record->golden_word_id . '">
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