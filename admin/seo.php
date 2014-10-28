<?php include("include/header.php"); ?>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                
                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Search Engine Optimization</div>
                    <div class="panel-content">
                        <div class="bord">
                        <table width="100%" height="100%" border="1" style="text-align:center;">
                        	<tr>
	                        	<td><strong>Name: </strong></td>
                            	<td><strong>Keywords:</strong> </td> 
                            	<td><strong>Description:</strong> </td> 
                                <td><strong>Edit</strong></td>
                            </tr>
                            	
                                <?php 
								$query = mysql_query("SELECT * FROM seo");
								while($res = mysql_fetch_array($query))
								{
								?>
                            	<tr height="60px;">
                                    <td><?php echo $res['page_name']; ?></td>
                            		<td>
                                     <?php echo $res['keywords']; ?>
                                    </td>
                                    <td>
                                     <?php echo $res['description']; ?>
                                    </td>
                                	<td style="width:20%"><a href="edit_seo.php?seo_id=<?php echo $res['id']; ?>"><img src="img/edit-icon.png" />  </a></td>
                                    
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

