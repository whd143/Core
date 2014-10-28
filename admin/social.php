<?php include("include/header.php"); ?>
<script type="text/javascript" src="./js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="./js/jquery.validationEngine-en.js"></script>
<script type="text/javascript">
var jq = $.noConflict();
	jq(document).ready(function () {
		jq('#validate').validationEngine({ promptPosition: "bottomLeft", scroll: false });
		//{promptPosition : "centerRight", scroll: false}
	});
</script>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                
                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Social links preview</div>
                    <div class="panel-content">
                        <div class="bord">
                        <table width="100%" height="100%" border="1" style="text-align:center;">
                        	<tr>
                            	<td><strong>Name:</strong> </td> 
                            	<td><strong>Link:</strong> </td> 
                                <td><strong>Edit</strong></td>
                            </tr>
                            	
                                <?php 
								$query = mysql_query("SELECT * FROM social");
								while($res = mysql_fetch_array($query))
								{
								?>
                            	<tr style="height:50px;">
                                    <td><?php echo $res['name']; ?></td>
                            		<td><?php echo $res['links']; ?></td>
                                	<td> 
                                    <a href="edit_social.php?social_id=<?php echo $res['social_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                    </td>
                                    
                                </tr>
								<?php
                                }
								
								?>
                            	
                        </table>
                       
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php"); ?>

