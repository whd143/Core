<?php include("include/header.php"); ?>

        <style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
			div.giveHeight {
				/* Stop the controls at the bottom bouncing around */
				min-height: 380px;
				padding-bottom:20px;
			}
			.group{
				display:none;
			}
			.none{
				display:none;
			}
		</style>
        
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"fnDrawCallback": function ( oSettings ) {
						if ( oSettings.aiDisplay.length == 0 )
						{
							return;
						}
						var nTrs = $('tbody', oSettings.nTable);
						var iColspan = nTrs[0].getElementsByTagName('td').length;
						var sLastGroup = "";
						for ( var i=0 ; i<nTrs.length ; i++ )
						{
							var iDisplayIndex = oSettings._iDisplayStart + i;
							var sGroup = oSettings.aoData[ oSettings.aiDisplay[iDisplayIndex] ]._aData[0];
							if ( sGroup != sLastGroup )
							{
								var nGroup = document.createElement( 'tr' );
								var nCell = document.createElement( 'td' );
								nCell.colSpan = iColspan;
								nCell.className = "group";
								nCell.innerHTML = sGroup;
								nGroup.appendChild( nCell );
								nTrs[i].parentNode.insertBefore( nGroup, nTrs[i] );
								sLastGroup = sGroup;
							}
						}
					},
					"aoColumnDefs": [
						{ "bVisible": false, "aTargets": [ 0 ] }
					],
				});
			} );
		</script>

<div class="adj">
<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="panel">
                    <div class="panel-header"><i class="icon-tasks"></i> Products preview</div>
                    <div class="panel-content">
                        <div class="bord">
                        <table cellpadding="0" cellspacing="0" class="display" id="example" width="100%" height="100%" border="0" style="text-align:center;">
                        <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Title : </th>
                                <th>Description : </th>
                                <th>Image :</th>
                                <th>Options :</th>
                                <th>Date :</th>
                                <th>Status</th>
                                <th>Edit | Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                                
                                
                                <?php 
                                $query = mysql_query("SELECT * FROM products WHERE glove_made_type='system' AND prod_id=34");
                                $res = mysql_fetch_array($query)
                                ?>
                                <tr class="gradeA">
                                    <td class="none">rendering</td>
                                    
                                    <td><?php echo $res['name']; ?></td>
                                                                      
                                    <td width="20%">
									
									<?php $res['description']; ?>
                                    <?php
                                    $content = $res['description'];
									echo substr($content, 0, 210)."..."; 
									?>
                                    
                                    </td>
                                    
                                    <td><img src="<?php echo $base_url.$res['image']; ?>" style="width:100px;height:auto;margin:10px 0;" /></td>
                                    <td>
                                    	<a href="add_option.php?prod_id=<?php echo $res['prod_id'];  ?>">Add options</a> | 
                                    	<a href="view_options.php?prod_id=<?php echo $res['prod_id'];  ?>">View options</a>
                                    </td>
                                    <td><?php echo $res['date_created']; ?></td>
                                    <td>
									
									<?php 
									if($res['item_status']==1)
									{
										?>
                                        <span class="label label-success">active</span>
                                        <?php
									}
									else{
										?>
                                        <span class="label">disabled</span>
                                        <?php
									}
									?>
                                    
                                    </td>
                                    <td>
                                    	<a href="edit_product_item.php?id=<?php echo $res['prod_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                   	</td>
                                    
                                </tr>
                            
                            
                            	
                                <?php 
                                $query = mysql_query("SELECT * FROM products WHERE glove_made_type='system' AND prod_id=35");
                                $res = mysql_fetch_array($query)
                                ?>
                                <tr class="gradeA">
                                    <td class="none">rendering</td>
                                    
                                    <td><?php echo $res['name']; ?></td>
                                    
                                  
                                    <td width="20%">
									
									<?php $res['description']; ?>
                                    <?php
                                    $content = $res['description'];
									echo substr($content, 0, 210)."..."; 
									?>
                                    
                                    </td>
                                    
                                    <td><img src="<?php echo $base_url.$res['image']; ?>" style="width:100px;height:auto;margin:10px 0;" /></td>
                                   	<td>
                                    	<a href="add_option.php?prod_id=<?php echo $res['prod_id'];  ?>">Add options</a> | 
                                    	<a href="view_options.php?prod_id=<?php echo $res['prod_id'];  ?>">View options</a>
                                    </td>
                                    <td><?php echo $res['date_created']; ?></td>
                                    <td>
									
									<?php 
									if($res['item_status']==1)
									{
										?>
                                        <span class="label label-success">active</span>
                                        <?php
									}
									else{
										?>
                                        <span class="label">disabled</span>
                                        <?php
									}
									?>
                                    
                                    </td>
                                    <td>
                                    	<a href="edit_product_item.php?id=<?php echo $res['prod_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                   	</td>
                                    
                                </tr>
                                
                                
                                <?php 
                                $query = mysql_query("SELECT * FROM products WHERE glove_made_type='system' AND prod_id=36");
                                $res = mysql_fetch_array($query)
                                ?>
                                <tr class="gradeA">
                                    <td class="none">rendering</td>
                                    
                                    <td><?php echo $res['name']; ?></td>
                                    
                                  
                                    <td width="20%">
									
									<?php $res['description']; ?>
                                    <?php
                                    $content = $res['description'];
									echo substr($content, 0, 210)."..."; 
									?>
                                    
                                    </td>
                                    
                                    <td><img src="<?php echo $base_url.$res['image']; ?>" style="width:100px;height:auto;margin:10px 0;" /></td>
                                    <td>
                                    	<a href="add_option.php?prod_id=<?php echo $res['prod_id'];  ?>">Add options</a>  | 
                                    	<a href="view_options.php?prod_id=<?php echo $res['prod_id'];  ?>">View options</a>
                                    </td>
                                    <td><?php echo $res['date_created']; ?></td>
                                    <td>
									
									<?php 
									if($res['item_status']==1)
									{
										?>
                                        <span class="label label-success">active</span>
                                        <?php
									}
									else{
										?>
                                        <span class="label">disabled</span>
                                        <?php
									}
									?>
                                    
                                    </td>
                                    <td>
                                    	<a href="edit_product_item.php?id=<?php echo $res['prod_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                   	</td>
                                    
                                </tr>
                                
                                
                                <?php 
                                $query = mysql_query("SELECT * FROM products WHERE glove_made_type='system' AND prod_id=37");
                                $res = mysql_fetch_array($query)
                                ?>
                                <tr class="gradeA">
                                    <td class="none">rendering</td>
                                    
                                    <td><?php echo $res['name']; ?></td>
                                    
                                  
                                    <td width="20%">
									
									<?php $res['description']; ?>
                                    <?php
                                    $content = $res['description'];
									echo substr($content, 0, 210)."..."; 
									?>
                                    
                                    </td>
                                    
                                    <td><img src="<?php echo $base_url.$res['image']; ?>" style="width:100px;height:auto;margin:10px 0;" /></td>
                                    <td>
                                    	<a href="add_option.php?prod_id=<?php echo $res['prod_id'];  ?>">Add options</a> | 
                                    	<a href="view_options.php?prod_id=<?php echo $res['prod_id'];  ?>">View options</a>
                                    </td>
                                    <td><?php echo $res['date_created']; ?></td>
                                    <td>
									
									<?php 
									if($res['item_status']==1)
									{
										?>
                                        <span class="label label-success">active</span>
                                        <?php
									}
									else{
										?>
                                        <span class="label">disabled</span>
                                        <?php
									}
									?>
                                    
                                    </td>
                                    <td>
                                    	<a href="edit_product_item.php?id=<?php echo $res['prod_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                   	</td>
                                    
                                </tr>
                            	
                                <?php 
                                $query = mysql_query("SELECT * FROM products WHERE prod_id!=34 AND prod_id!=35 AND prod_id!=36 AND prod_id!=37 AND glove_made_type='system' order by prod_id");
                                while($res = mysql_fetch_array($query))
								{
                                ?>
                                <tr class="gradeA">
                                    <td class="none">rendering</td>
                                    
                                    <td><?php echo $res['name']; ?></td>
                                    
                                  
                                    <td width="20%">
									
									<?php $res['description']; ?>
                                    <?php
                                    $content = $res['description'];
									echo substr($content, 0, 210)."..."; 
									?>
                                    
                                    </td>
                                    
                                    <td><img src="<?php echo $base_url.$res['image']; ?>" style="width:100px;height:auto;margin:10px 0;" /></td>
                                    <td>No options</td>
                                    <td><?php echo $res['date_created']; ?></td>
                                    <td>
									
									<?php 
									if($res['item_status']==1)
									{
										?>
                                        <span class="label label-success">active</span>
                                        <?php
									}
									else{
										?>
                                        <span class="label">disabled</span>
                                        <?php
									}
									?>
                                    
                                    </td>
                                    <td><a href="edit_product_item.php?id=<?php echo $res['prod_id']; ?>"><img src="img/edit-icon.png" />  </a> 
                                     |
                                    <a href="#" onclick="products('<?php echo $res['prod_id']; ?>')"> <i class="icon-remove red"></i></a>
                                    
                                    </td>
                                    
                                </tr>
                                <?php 
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
</div>
<?php include("include/footer.php"); ?>

