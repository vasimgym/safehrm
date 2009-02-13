<?php 
include("header.php");

if (!empty($_GET['comid'])) {
$id = $_GET['comid'];
} 

$sql	=	"SELECT * FROM teacher_comments WHERE com_id='$id'";
$res = mysql_query($sql);
$rs	= mysql_fetch_array($res);
?>
																    											<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">                                                  
												 <tr>
                                                    <td>
													<form id="studentassign" name="studentassign" method="post"  action="review.php" 
										  enctype="multipart/form-data" onsubmit="return student_assign();">
													<table width="100%" border="0" cellspacing="3" cellpadding="3">
												  <tr>
												    <td colspan="2" class="orange">
													<?php if (empty($_SESSION['sess_teacher_id'])) {?>
													<table width="100%" border="0" cellspacing="1" cellpadding="5">
                                                      <tr bgcolor="#CCCCCC">
                                                        <td class="blue">Title</td>
                                                        <td class="left-none"><?php echo $rs['com_title'];?></td>
                                                      </tr>
                                                      <tr bgcolor="#CCCCCC">
                                                        <td width="19%" class="blue">Description</td>
                                                        <td width="81%" class="left-none"><?php echo $rs['com_description'];?></td>
                                                      </tr>
                                                    </table>
													<?php }?>
													
													</td>
												    </tr>
												  
												  <tr>
                                                    <td colspan="2" class="orange">Student Info: </td>
                                                  </tr>
                                                 <?php if (!empty($err)) {?>
												  <tr>
                                                    <td width="18%" class="gray-login">&nbsp;</td>
                                                    <td width="82%" class="errormsg"><input name="s_firstname" type="text" id="s_firstname" size="30" value="<?php echo $_POST[s_fullname];?>" /></td>
                                                  </tr>
												  <?php }?>
												   <tr>
                                                    <td class="gray-login">E-mail</td>
                                                    <td><input name="s_email" type="text" id="s_email" 
													 value="<?php echo $_SESSION['sess_teacher_email'];?>" size="30" />
														<span class="errormsg">*</span>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">First Name </td>
                                                    <td><input name="s_firstname" type="text" id="s_firstname" size="30" />
													<span class="errormsg">*</span>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">Last Name </td>
                                                    <td><input name="s_lastname" type="text" id="s_lastname" size="30" />
                                                    <span class="errormsg">*</span></td>
                                                  </tr>
                                                 
                                                  <tr>
                                                    <td class="gray-login">City</td>
                                                    <td>
                                                      <input name="city_name" type="text" id="city_name" size="30" />														
														<span class="errormsg">*</span>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">State</td>
                                                    <td>
													<select name="state_name">
													<option value="">Select State</option>
															<?php $state = mysql_query("SELECT id, state_name FROM student_state");
																  while($rs_state = mysql_fetch_array($state)) {
															?>
															<option value="<?php echo $rs_state['id'];?>"><?php 
															echo $rs_state['state_name'];?></option>
															<?php }?>
														</select>
                                                    <span class="errormsg">*</span></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">Category</td>
                                                    <td>
													<select <?php if (!empty($_SESSION['sess_teacher_id'])) {?> name="categoryname" <?php } else {}?>
													onblur="return showForm('subcategory.php', this.value,<?php 
													if ($_GET['subcatid']) {echo $_GET['subcatid'];} else { echo '0';}?>,'a');" 
													onchange="return showForm('subcategory.php', this.value,<?php if ($_GET['subcatid']) {echo $_GET['subcatid'];} else { echo '0';}?>,'a');" 
													onfocus="return showForm('subcategory.php', this.value,<?php if ($_GET['subcatid']) {echo $_GET['subcatid'];} else { echo '0';}?>,'a');"  
													<?php if (empty($_SESSION['sess_teacher_id'])) {?>disabled="disabled"<?php }?>>
													<!--<option value="">Select Category</option> -->													
													<?php $categoryname = mysql_query("SELECT * from student_category WHERE parent_node=0");
																  while($rs_categoryname = mysql_fetch_array($categoryname)) {
															?>
															<option value="<?php echo $rs_categoryname['id'];?>"
															<?php if ($rs['categoryid'] == $rs_categoryname['id']) {
															?> selected="selected"<?php }?>><?php 
															echo $rs_categoryname['categoryname'];?></option>
															<?php }?>
														</select>
													<input type="hidden" 
													<?php if (empty($_SESSION['sess_teacher_id'])) {?>name="categoryname"
													<?php }?> value="<?php echo $rs['categoryid'];?>" />
													<span class="errormsg">*</span></td>
                                                  </tr>
												 
										  
										  <tr>
										    <td colspan="2" valign="top"><span id="cpanel"></span></td>
								      </tr>
									  <?php
									  if (!empty($_GET['comid'])) {
									  $q 	= $rs['categoryid'];
									  $sq = array();
									  if(!empty($rs['subcategoryid'])){
									  	
									  	$sq = explode(",",$rs['subcategoryid']);
									  }
									  
									  
									  
									  echo '<tr id="hidetr"><td valign="top" class="gray-login">Subcategory</td><td class="gray-rightlogin">';
$subquery = mysql_query("SELECT * FROM student_category WHERE parent_node=$q");
while ($subrs = mysql_fetch_array($subquery)) {
	if ($_GET['subcatid'] == '') {
		if (in_array($subrs['id'], $sq)) {
		echo '<input type="checkbox" name="subcatid[]"   value="'.$subrs["id"].'" checked="checked" disabled="disabled"  />&nbsp;'.$subrs["categoryname"].'<br>';
		echo '<input type="hidden" name="subcatid[]" value="'.$subrs["id"].'" />';
		} else {
			echo '<input type="checkbox" name="subcatid[]"  disabled="disabled"  value="'.$subrs["id"].'" />&nbsp;'.$subrs["categoryname"].'<br>';
		}
	} elseif($_GET['subcatid'] == $subrs['id']) {
		echo '<input type="checkbox" name="subcatid[]"   value="'.$subrs["id"].'" checked="checked" disabled="disabled"  />&nbsp;'.$subrs["categoryname"].'<br>';
		echo '<input type="hidden" name="subcatid[]" value="'.$subrs["id"].'" />';
	} else {
		echo '<input type="checkbox" name="subcatid[]"  disabled="disabled"  value="'.$subrs["id"].'" />&nbsp;'.$subrs["categoryname"].'<br>';
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
                                                    <td class="gray-login" valign="top">Subject<span class="errormsg">*</span></td>
                                                    <td class="gray-rightlogin">
													<?php 
													$subject = mysql_query("SELECT id, subject_name FROM student_subject");
													while($rs_subject = mysql_fetch_array($subject)) {
													?>
														<input type="checkbox" value="<?php echo $rs_subject['id'];?>"
															name="subject[]" />
															<?php echo $rs_subject['subject_name'];?><br />
													<?php }?>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login" valign="top">Assignment file </td>
                                                    <td><input name="s_filepath" type="file" id="s_filepath" size="30" />
                                                    <br />
													<span class="errormsg">*(Only .txt and .doc file)</span></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="submit" name="submitinfo" value="Submit" />
                                                    <input type="reset" name="Submit2" value="Reset" /></td>
                                                  </tr>                                                
                                                </table>
													</form>
												</td></tr></table>												
                              
							<?php include("footer.php");?>