
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- Integrated and applied validation library -->
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>

<!-- Load TinyMCE -->
<script type="text/javascript" src="tinymce/jquery.tinymce.js"></script>

<!-- datatables -->
<script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js" ></script>
<script src="js/override.js"></script>

</body>
</html>
<?php
if (isset($sql)) {
    $sql->close();
}
ob_end_flush();
?>