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
                    <div class="panel-header"><i class="icon-tasks"></i> Registered members</div>
                    <div class="panel-content">
                        <div class="bord">
                        <table cellpadding="0" cellspacing="0" class="display" id="example" width="100%" height="100%" border="0" style="text-align:center;">
                        <thead>
                        	<tr>
                            	<th>Rendering engine</th>
                                <th>Name: </th>
                                <th>Last Name :</th>
                                <th>Email :</th>
                                <th>Phone :</th>
                                <th>user created :</th>
                                <th>Status :</th>
                                <th>View  More :</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
								$date=date("Y-m-d");
                                $query = mysql_query("SELECT * FROM members ORDER BY id DESC");
                                while($res = mysql_fetch_array($query))
                                {
                                ?>
                                <tr class="gradeA" style="height:50px;">
                               		 <td class="none">rendering</td>
                                    <td><?php echo $res['name']; ?></td>
                                    <td><?php echo $res['last_name']; ?></td>
                                    <td><?php echo $res['email']; ?></td>
                                    <td><?php echo $res['phone']; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td>
									<?php if($res['status']==1)
									{	
									?>
                                        <span class="label label-success">active</span>
                                    <?php 
									}
									else
									{
									?>
                                       <span class="label">disabled</span>
                                    <?php 
									}
									?>
                                    </td>
                                    <td><a href="complete-mem.php?user_id=<?php echo $res['id']; ?>">View complete detail</a></td>
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

