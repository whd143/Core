<?php include("include/header.php"); ?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                
                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Contact us preview</div>
                    <div class="panel-content">
                        <div class="bord">
                        <table width="100%" height="100%" border="1" style="text-align:center;">
                        	<tr>
                            	<td><strong>Description :</strong> </td> 
                            	<td><strong>General Email :</strong> </td>
                            	<td><strong>Support & Product Usage Email :</strong> </td> 
                            	<td><strong>Contact Email :</strong> </td> 
                                <td><strong>Edit</strong></td>
                            </tr>
                            	
                                <?php 
								$query = mysql_query("SELECT * FROM contact");
								while($res = mysql_fetch_array($query))
								{
								?>
                            	<tr style="height:200px;">
                            		<td style="width:25%;">
                                    <?php
                                    $content = $res['description'];
									echo substr($content, 0, 150)."..."; 
									?>
                                    </td>
                                    <td style="width:15%;">
                                		<?php echo $res['general']; ?>
                                    </td>
                                    <td style="width:15%;">
                                		<?php echo $res['support']; ?>
                                    </td>
                                    <td style="width:15%;">
                                		<?php echo $res['email']; ?>
                                    </td>
                                	<td style="width:10%;"><a href="edit_contact.php?cont_id=<?php echo $res['cont_id']; ?>"><img src="img/edit-icon.png" />  </a></td>
                                    
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

