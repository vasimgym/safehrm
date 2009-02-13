<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");
//Set comment and change status for an assignment
if($_POST["submitinfo"]=="Submit") 
{
	$studentid = $_POST["editid"];
	$s_teacher_commets = $_POST["s_teacher_commets"];
	$status 	= $_POST["status"];
	$s_category	= $_POST["s_category"];
	$s_city		= $_POST["s_city"];
	$s_state	= $_POST["s_state"];
	if (!empty($_POST['subcatid'])) {
		$s_subcategory	= implode($_POST['subcatid'],",");
	} else {
		$s_subcategory	= implode($_POST['subcatid_old'],",");
	}
	$update = "
		UPDATE student_information 
			SET 	s_teacher_commets='$s_teacher_commets', 
				s_status='$status', 
				s_category='$s_category',
				s_city='$s_city',
				s_state='$s_state',
				s_subcategory='$s_subcategory'
			WHERE 	s_id='$studentid'";
	$updateres = mysql_query($update);
	header("location:manage_assignments.php");
}


//Fetch all data for particular records
$sql = "SELECT * FROM student_information WHERE s_id='".$_GET["viewid"]."' ";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

$q = array();
if (!empty($row['s_subcategory'])) {
	$q = explode(",",$row['s_subcategory']);
}
include("header.php");
?>
<script language="javascript" type="text/javascript" src="../js/functions.js"></script>
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
			  <td width="64%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  
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
								    <form name="form1" method="post" action="">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                                                               
                                        <tr>
                                          <td class="MS11_grey"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                            <tr>
                                              <td colspan="2" class="orange">Student Info: </td>
                                            </tr>
                                            <?php if (!empty($err)) {?>
                                            <tr>
                                              <td class="gray-login">&nbsp;</td>
                                              <td class="errormsg">&nbsp;</td>
                                            </tr>
                                            <?php }?>
                                            <tr>
                                              <td class="gray-login">E-mail</td>
                                              <td><?php echo $row["s_email"];?></td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">First Name </td>
											  <td><?php echo $row["s_firstname"];?></td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">Last Name </td>
											  <td><?php echo $row["s_lastname"];?></td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">City</td>
                                              <td><input name="s_city" type="text" id="s_city" size="30" 
											value="<?php echo $row['s_city'];?>"/></td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">State</td>
                                              <td><select name="s_state">
                                                <option value="">Select State</option>
                                                <?php $state = mysql_query("SELECT id, state_name FROM student_state");
																  while($rs_state = mysql_fetch_array($state)) {
															?>
                                                <option value="<?php echo $rs_state['id'];?>" 
												<?php if($row['s_state'] == $rs_state['id']) { ?> 
												selected="selected" <?php }?>>
                                                <?php 
															echo $rs_state['state_name'];?>
                                                </option>
                                                <?php }?>
                                              </select></td>
                                            </tr>
                                            
                                            <tr>
                                              <td class="gray-login">Category</td>
                                              <td><select name="s_category" 
											  onblur="return showForm('../subcategory.php', this.value,'<?php echo $row['s_subcategory'];?>','a');" 
											  onchange="return showForm('../subcategory.php', this.value,'<?php echo $row['s_subcategory'];?>','a');" 
											  onfocus="return showForm('../subcategory.php', this.value,'<?php echo $row['s_subcategory'];?>','a');">
                                               <!-- <option value="">Select Category</option> -->
                                                <?php $categoryname = mysql_query("SELECT * FROM student_category WHERE parent_node=0");
																  while($rs_categoryname = mysql_fetch_array($categoryname)) {
															?>
                                                <option value="<?php echo $rs_categoryname['id'];?>" 
												<?php if($row['s_category'] == $rs_categoryname['id']) { ?> 
												selected="selected" <?php }?>>
                                                <?php 
															echo $rs_categoryname['categoryname'];?>
                                                </option>
                                                <?php }?>
                                              </select>
											 <!-- <input  type="hidden" name="s_category" value="<?php //echo $row['s_category'];?>" /> -->
											  </td>
                                            </tr>
											<tr>
                                              <td colspan="2"><span id="cpanel"></span></td>
                                              </tr>
<?php
									  if (!empty($_GET['viewid'])) {
									  	/*$q = array();
									  	if (!empty($row['s_subcategory'])) {
									  		$q = explode(",",$row['s_subcategory']);
									  }*/
									 $catid = $row['s_category'];
									  
									  echo '<tr id="hidetr"><td valign="top" class="gray-login">Subcategory</td><td class="gray-rightlogin">';
$subquery = mysql_query("SELECT * FROM student_category WHERE parent_node=$catid");
while ($subrs = mysql_fetch_array($subquery)) {
	if(in_array($subrs["id"],$q)) {
		echo '<input type="checkbox" name="subcatid_old[]"   value="'.$subrs["id"].'" checked="checked" />&nbsp;'.$subrs["categoryname"].'<br>';
	} else {
		echo '<input type="checkbox" name="subcatid_old[]"  value="'.$subrs["id"].'" />&nbsp;'.$subrs["categoryname"].'<br>';
	}
}
echo '</td>
								      </tr>';
}
									  ?>
                                            <tr>
                                              <td colspan="2" class="orange">Assignment Info: </td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login" valign="top">Subject</td>
                                              <td class="gray-login"><?php 
											  $subject = mysql_query("SELECT subject_name FROM student_subject where id='".$row["s_subject"]."'");
												while($rs_subject = mysql_fetch_array($subject)) {
												echo $rs_subject['subject_name'];
                                              }?>                                              </td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login" valign="top">Assignment file </td>
                                              <td><a href="../assignments/<?php echo $row['s_filepath'];?>">Click to view/Download</a></td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td>
										  
										  <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                            <tr>
                                              <td colspan="2" class="orange">Reply </td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">&nbsp;</td>
                                              <td class="orange"><?php echo $msg;?></td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">Comments</td>
                                              <td>
											  <textarea name="s_teacher_commets" rows="5" cols="30"><?php echo $row["s_teacher_commets"];?></textarea>
											  </td>
                                            </tr>
                                            <tr>
                                              <td class="gray-login">Change Status </td>
                                              <td><span class="MS11_grey">
                                                <select name="status" >
                                                 <?php get_status($row["s_status"]);?>
                                                </select>
                                              </span></td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>
											  <input type="hidden" name="editid" value="<?php echo $_GET["viewid"];?>" />
											  <input type="submit" name="submitinfo" value="Submit" /></td>
                                            </tr>
                                          </table>
										  
										  </td>
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
			  <td width="80%" valign="top" class="search"></td>
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
