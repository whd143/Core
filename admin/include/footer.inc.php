
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="divider"></div>
                <div class="pull-right">
                    <p>Developed by <a href="javascript:void(0);" target="_blank">Janab Pvt Ltd.</a></p>
                </div>
                <div class="pull-left">
                    <p>Copyright 2015 . All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo $base_url ?>/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $base_url ?>/assets/js/jquery-ui.js"></script>
<script src="<?php echo $base_url ?>/assets/js/functions.js"></script>

</body>
</html>
<?php
if (isset($sql)) {
    $sql->close();
}
ob_end_flush();
?>