<?php include "include/header.inc.php"; ?>

<div id="content">
    <div class="container"> 
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Pages Management<a href="page_add.php" class="float-right">+ Add New Record</a></div>
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
                                        <th class="text-align-left pl20 width20"><strong>Title: </strong></th>
                                        <th class="text-align-left pl20 width60"><strong>Description:</strong> </th> 
                                        <th class="text-align-center"><strong>Edit</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `info_pages`";
                                    $result = $sql->query($query);
                                    if ($result->num_rows > 0) {
                                        while ($record = $result->fetch_object()) {
                                            /**
                                             * Make sure string finish with complete word
                                             */
                                            $description = $record->description;
                                            if (preg_match('/^.{1,210}\b/s', $description, $match)) {
                                                $description = $match[0];
                                            }
                                            echo '<tr class="height60 gradeA">
                                                <td  class="text-align-left pl20">' . $record->name . '</td>
                                                <td  class="text-align-left pl20">' . $description . '...</td>
                                                <td class="text-align-center">
                                                    <a href="page_edit.php?page_id=' . $record->page_id . '">
                                                        <img src="img/edit-icon.png" />  
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
<?php include("include/footer.inc.php"); ?>