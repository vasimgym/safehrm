<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");

if($_GET["action"]=="delete")
{
	$delid = $_GET["delid"];
 	mysql_query("DELETE FROM `student_state` WHERE id='$delid'");
}

$sql = "SELECT id, state_name FROM student_state";
$res = mysql_query($sql);



include("header.php");
?>
  <tr>
	<td width="100%" height="480" valign="top">
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="1%"><img border="0" src="../images/lo1.gif" width="16" height="14"></td>
		<td width="98%" background="../images/lo3.gif"><img border="0" src="../images/lo3.gif" width="16" height="14"></td>
		<td width="1%"><img border="0" src="../images/lo4.gif" width="16" height="14"></td>
	  </tr>              <tr>
		<td width="1%" background="../images/lo2.gif"><img border="0" src="../images/lo2.gif" width="16" height="14"></td>
		<td width="98%" bgcolor="#FAFAFA" >
		  <table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="20%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="100%" valign="top">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top1.gif" width="26" height="26"></td>
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">&nbsp;</td>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top3.gif" width="26" height="26"></td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top" background="../images/admin_back.gif" class="border-gray">
					  <table border="0" width="100%" cellspacing="5" cellpadding="0" height="250">
						<tr>
						  <td width="100%" valign="top" class="admin-gray">
						<?php include("left.php");?>
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
				</table></td>
			  <td width="2%" valign="top"></td>
			  <td width="78%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  
				  <tr>
					<td width="100%" valign="top">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top1.gif" width="26" height="26"></td>
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">&nbsp;</td>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top3.gif" width="26" height="26"></td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top" class="border-gray">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="100%">
							<table border="0" width="100%" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="100%" valign="top" height="250">
								  <form id="form1" name="form1" method="post" action="" >
								    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td class="orange" height="16">Manage State </td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey"><a href="#" class="left-heading" onclick="window.open('add_state.php','newWin','width=500,height=200,menubar=no,location=no,resizable=yes,scrollbars=yes');">Add New State </a></td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><table width="100%" border="0">
                                              <tr bgcolor="#EBEBEB" class="blue">
                                                <td>State Name </td>
                                                <td align="center">Action</td>
                                              </tr>
                                              <?php
												$i=0;
												while($row=mysql_fetch_array($res))
												{
													$i++;
													$i%2==0 ? $bgcolor="#F4F4F4" : $bgcolor="#FFFFFF";
												?>
                                              <tr bgcolor="<?php echo $bgcolor;?>" class="MS12_blk">
                                                <td class="left-none"><?php echo $row['state_name'];?></td>
                                                <td align="center"><a href="#" class="blue1" onclick="window.open('add_state.php?action=edit&amp;editid=<?php echo $row['id']?>','newWin','width=500,height=200,menubar=no,location=no,resizable=yes,scrollbars=yes');">EDIT </a><span class="blue">|</span> <a href="manage_state.php?delid=<?php echo $row['id']?>&amp;action=delete"  class="blue1" onclick="return confirm('Are you sure to delete this State?')">DELETE</a></td>
                                              </tr>
                                              <?php
												}
											  ?>
                                          </table></td>
                                        </tr>
                                      </tbody>
							        </table>
								  </form>
								  </td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td width="100%" background="../images/admin_back_gray.gif" height="19">&nbsp;</td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top"></td>
				  </tr>
				</table></td>
			</tr>
			<tr>
			  <td width="20%" valign="top" class="search">&nbsp;
				
			  </td>
			  <td width="2%" valign="top" class="search"></td>
			  <td width="78%" valign="top" class="search"></td>
			</tr>
		  </table>
		</td>
		<td width="1%" valign="top" background="../images/lo5.gif"><img border="0" src="../images/lo5.gif" width="16" height="14"></td>
	  </tr>
	<tr>
		<td width="1%"><img border="0" src="../images/lo8.gif" width="16" height="37"></td>
		<td width="98%" background="../images/lo7.gif"><img border="0" src="../images/lo7.gif" width="16" height="37"></td>
		<td width="1%"><img border="0" src="../images/lo6.gif" width="16" height="37"></td>
	  </tr>
	</table>
	</td>
  </tr>
</table>

</td>
</tr>
</table>
</div>
</body>
</html>
