<?php include("header.php");
//$target_dir = "assignments";
$target_dir = "temp_assign";

$s_filepath			= trim(stripslashes($_FILES['s_filepath']['name']));
$s_email			= trim(stripslashes($_POST['s_email']));

$checkemail	= mysql_query("SELECT s_id, s_email, s_filepath FROM student_information WHERE s_email='$s_email'");
$rowcount	= mysql_num_rows($checkemail);

if (!empty($s_filepath)) {
		if (!is_dir($target_dir)) {
			mkdir($target_dir,0777);
		}
		$ext = substr($s_filepath, strrpos($s_filepath, '.') + 1);
		
		$s_filepath = $s_email.".".$ext;
		$path		   = $target_dir."/".$s_filepath;
		$tmp_name	   = $_FILES['s_filepath']['tmp_name'];

		if (!move_uploaded_file($tmp_name,$path)) {
			$errors[] = "Error in image Uploading!";
		} 
	}
	
$subcatid = array_unique($_POST['subcatid']);
$subcategoryname = '';
for ($i=0; $i < count($subcatid); $i++) {
	$subcategory	= $subcatid[$i];
	$select = mysql_query("SELECT * FROM student_category WHERE id=$subcategory");
	$sub_rs = mysql_fetch_array($select);
	$subcategoryname	.= $sub_rs['categoryname']."<br>";
}
	?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

		
										  <form id="studentassign" name="studentassign" method="post"  action="include/student.php" 
										  enctype="multipart/form-data">									    											<table width="80%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
                                                  <tr>
                                                    <td colspan="2" class="orange">Student Info: </td>
                                                  </tr>
                                                 <?php if ($rowcount >=1) {?>
												  <tr>
												    <td colspan="2" bgcolor="#CCCCCC" class="gray-login" align="center"><p><span class="style1">**</span> Your email address already exist. Do you want to overwrite email address and assignments. </p>
											        <p>Either you accept then click on Confirm Submission or Cancle. </p></td>
										    </tr>
												  <!--<tr>
                                                    <td colspan="2" class="gray-login">The  previous assignment will be overwrite.. <input type="radio" name="overite_assign" value="yes" />Yes
<input type="radio" name="overite_assign" value="no" />No</td>
                                                  </tr> -->
												  <?php }?>
												   <tr>
                                                    <td class="gray-login">E-mail</td>
                                                    <td>
													<input name="s_email" type="hidden" id="s_email" size="30" 
													value="<?php echo $_POST['s_email'];?>" />
													<?php echo $_POST['s_email'];?>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">First Name </td>
                                                    <td>
													<input name="s_firstname" type="hidden" id="s_firstname" size="30" 
													value="<?php echo $_POST['s_firstname']?>" />
												  <?php echo $_POST['s_firstname'];?>                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">Last Name </td>
                                                    <td>
													<input name="s_lastname" type="hidden" id="s_lastname" size="30" 
													value="<?php echo $_POST['s_lastname']?>" />
													<?php echo $_POST['s_lastname'];?>													</td>
                                                  </tr>
                                                 
                                                  <tr>
                                                    <td class="gray-login">City</td>
                                                    <td>
													<input type="hidden" name="city_name" 
													value="<?php echo $_POST['city_name'];?>" />
													<?php echo $_POST['city_name'];?>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">State</td>
                                                    <td>
													<input type="hidden" name="state_name" 
													value="<?php echo $_POST['state_name'];?>">
													
													
<?php $state = mysql_query("SELECT id, state_name FROM student_state WHERE id='$_POST[state_name]'");
  	  $rs_state = mysql_fetch_array($state);
	  echo $rs_state['state_name'];
?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login">Category</td>
                                                    <td>
													<input name="categoryname" type="hidden" 
													value="<?php echo $_POST['categoryname'];?>">
													
<?php 
$categoryname = mysql_query("SELECT id, categoryname from student_category WHERE id='$_POST[categoryname];'");
	  $rs_categoryname = mysql_fetch_array($categoryname);
	  echo $rs_categoryname['categoryname'];
?></td>
                                                  </tr>
												  <tr>
												    <td valign="top" class="gray-login">Subcategory</td>
										            <td >
													<input type="hidden"  name="subcatid" value="<?php echo implode(array_unique($_POST['subcatid']),",");?>" />
<?php echo $subcategoryname;?>
													</td>
										    </tr>
												  <tr>
												    <td colspan="2" class="orange">Assignment Info: </td>
										    </tr>
												  <tr>
                                                    <td class="gray-login" valign="top">Subject<span class="errormsg">*</span></td>
                                                    <td class="gray-login">
													<?php 
													$postid	 = $_POST['subject'];
													for ($i = 0; $i < count($postid); $i++ ) {
													$sub_id = $postid[$i];
													$subject = mysql_query("SELECT id, subject_name FROM student_subject WHERE id='$sub_id'");
													$rs_subject = mysql_fetch_array($subject);																												
													?>
														<input type="hidden" value="<?php echo $rs_subject['id'];?>" 
															name="subject[]" />
															<?php echo $rs_subject['subject_name'];?><br />
													<?php }?>													</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="gray-login" valign="top">Assignment file </td>
                                                    <td><input type="hidden"  name="s_filepath" 
													value="<?php echo $s_filepath;?>" />
													 <a href="download.php?file=<?php echo $s_filepath;?>">Assignments</a>                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" bgcolor="#CCCCCC">Uplodaed file will be replaced if exists previously for this email. </td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="submit" name="submitinfo" value="Confirm Submission" />
                                                    <input type="submit" name="cancle" value="Cancle" /></td>
                                                  </tr>                                                
                                                  
                                                </table>												
                                          </form></td>
<?php include("footer.php");?>                                    