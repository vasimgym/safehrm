<?php
include("config.php");

$target_dir = "../assignments/";
$temp_target_dir = "../temp_assign/";


if (!empty($_POST['submitinfo']) || $_POST['overite_assign']=="yes") {

		
	$s_email			= trim(stripslashes($_POST['s_email']));
	$s_firstname		= trim(stripslashes($_POST['s_firstname']));
	$s_lastname			= trim(stripslashes($_POST['s_lastname']));
	$city_name			= trim(stripslashes($_POST['city_name']));
	$state_name			= trim(stripslashes($_POST['state_name']));
	$categoryname		= trim(stripslashes($_POST['categoryname']));
	$s_filepath			= trim(stripslashes($_POST['s_filepath']));	
	$subcatid			= trim(stripslashes($_POST['subcatid']));	
	$s_subject			= implode(",",$_POST['subject']);

	

$state = mysql_query("SELECT id, state_name FROM student_state WHERE id='$_POST[state_name]'");
$rs_state = mysql_fetch_array($state);
$sql_categoryname = mysql_query("SELECT id, categoryname from student_category WHERE id='$_POST[categoryname];'");
$rs_categoryname = mysql_fetch_array($sql_categoryname);

$msg = '<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" ><font color="#FFCC33">Student Info</font></td>
  </tr>
  
 
  <tr>
    <td class="gray-login">E-mail</td>
    <td>'.$_POST["s_email"].'</td>
  </tr>
  <tr>
    <td class="gray-login">First Name </td>
    <td>'.$_POST["s_firstname"].'</tr>
  <tr>
    <td class="gray-login">Last Name </td>
    <td>'.$_POST["s_lastname"].'</td>
  </tr>
  <tr>
    <td class="gray-login">City</td>
    <td>'.$_POST["city_name"].'</td>
  </tr>
  <tr>
    <td class="gray-login">State</td>
    <td>'.$rs_state["state_name"].'</td>
  </tr>
  <tr>
    <td class="gray-login">Category</td>
    <td>'.$rs_categoryname["categoryname"].'</td>
  </tr>
  <tr>
    <td colspan="2" ><font color="#FFCC33">Assignment Info</font></td>
  </tr>
  <tr>
    <td class="gray-login" valign="top">Subject</td>
    <td class="gray-login">';
	$postid	 = $_POST['subject'];
	$subject_name = '';
	for ($i = 0; $i < count($postid); $i++ ) {
	$sub_id = $postid[$i];
	$subject = mysql_query("SELECT id, subject_name FROM student_subject WHERE id='$sub_id'");
	$rs_subject = mysql_fetch_array($subject);
          $subject_name	.= $rs_subject['subject_name']."<br />";
		
        }
		$msg .= $subject_name.'</td>
  </tr>
  <tr>
    <td class="gray-login" valign="top">Assignment file </td>
    <td class="gray-login">'.$s_filepath.'</td>
  </tr>
</table>';







	/* Insert Student Info*/
	
	$checkemail	= mysql_query("SELECT s_id, s_email, s_filepath FROM student_information WHERE s_email='$s_email'");
	$rowcount	= mysql_num_rows($checkemail);	

	if ($rowcount == 0) {
	$studentinfo	= "INSERT INTO student_information 
						( s_id, s_firstname, s_email, s_lastname,  s_subject,  s_category, 
						s_city, s_state, s_filepath, s_posted_date, s_subcategory)
						VALUES (
						NULL, '$s_firstname', '$s_email', '$s_lastname', '$s_subject', 
						'$categoryname', '$city_name', '$state_name', '$s_filepath', NOW(), '$subcatid'
						)";

						$executequery	= mysql_query($studentinfo);
						copy($temp_target_dir.$s_filepath, $target_dir.$s_filepath);
						if ($temp_target_dir.$s_filepath) {
							unlink($temp_target_dir.$s_filepath);
						 }

						/* Mail for student*/
						$sql_student = mysql_query("SELECT mailid, mail_sendto, mail_txt, mail_status FROM teacher_mailbody 
											WHERE mailid='1' AND mail_status='Enable'");
						$count_student = mysql_num_rows($sql_student);
						if ($count_student == 1) {
							$rs_student = mysql_fetch_array($sql_student);
							$mail_student	= nl2br($rs_student['mail_txt']);
							$message = "<p>".$mail_student."</p>".$msg;
							$subject  = "Confirmation mail";
							$headers  = "MIME-Version: 1.0;\n";
							$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
							
							/* additional headers */		
							$headers .= "From: info@student-teacher.com;\n";
							/* and now mail it */
							@mail($s_email, $subject, $message, $headers); 
							
						}

						/* End */

						/* Mail for teacher*/
						$sql = mysql_query("SELECT mailid, mail_sendto, mail_txt, mail_status FROM teacher_mailbody 
											WHERE mailid='2' AND mail_status='Enable'");
						$rowcount = mysql_num_rows($sql);
						if ($rowcount == 1) {
							$rows = mysql_fetch_array($sql);
							$mail_teacher	= nl2br($rows['mail_txt']);
							$msg_teacher = "<p>".$mail_teacher."</p>".$msg;
							$headers .= "From: $s_email;\n";
							$teacher_query	= mysql_query("SELECT emailid FROM teacher_information");
							while($rs_teach		= mysql_fetch_array($teacher_query)) {
								$teacher_email	= $rs_teach['emailid'];
								@mail($teacher_email, $subject, $msg_teacher, $headers); 								
							}
						}
						/* End */
						header("location:../thankyou.php");

	} else {

		$rs	= mysql_fetch_array($checkemail);
		$filename	= $rs['s_filepath'];		
		if (!empty($filename) && is_file($target_dir.$filename)) {				
			unlink($target_dir.$filename);
		}		
		
		$studentinfo	= "UPDATE  student_information SET
						 s_firstname='$s_firstname',
						 s_lastname='$s_lastname',
						 s_subject='$s_subject',
						 s_category='$categoryname',
						 s_city='$city_name',
						 s_state='$state_name',
						 s_posted_date = NOW(),
						 s_filepath='$s_filepath',
						 s_subcategory='$subcatid'
						 WHERE s_email='$s_email'";
						 $executequery	= mysql_query($studentinfo);
						 copy($temp_target_dir.$s_filepath, $target_dir.$s_filepath);
						 if ($temp_target_dir.$s_filepath) {
							unlink($temp_target_dir.$s_filepath);
						 }						 

						/* Mail for student*/
						$sql_student = mysql_query("SELECT mailid, mail_sendto, mail_txt, mail_status FROM teacher_mailbody 
											WHERE mailid='1' AND mail_status='Enable'");
						$count_student = mysql_num_rows($sql_student);
						if ($count_student == 1) {
							$rs_student = mysql_fetch_array($sql_student);
							$mail_student	= nl2br($rs_student['mail_txt']);
							$message = "<p>".$mail_student."</p>".$msg;
							$subject  = $rs_student['mail_sendto'];
							$headers  = "MIME-Version: 1.0;\n";
							$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
							
							/* additional headers */		
							$headers .= "From: info@student-teacher.com;\n";
							/* and now mail it */
							@mail($s_email, $subject, $message, $headers); 
						}
						/* End */

						/* Mail for teacher*/
						$sql = mysql_query("SELECT mailid, mail_sendto, mail_txt, mail_status FROM teacher_mailbody 
											WHERE mailid='2' AND mail_status='Enable'");
						$rowcount = mysql_num_rows($sql);
						if ($rowcount == 1) {
							$rows = mysql_fetch_array($sql);
							$mail_teacher	= nl2br($rows['mail_txt']);
							$msg_teacher = "<p>".$mail_teacher."</p>".$msg;							
							$sub_teacher  = $rows['mail_sendto'];
							$headers .= "From: $s_email;\n";
							$teacher_query	= mysql_query("SELECT emailid FROM teacher_information");
							while($rs_teach		= mysql_fetch_array($teacher_query)) {
								$teacher_email	= $rs_teach['emailid'];
								@mail($teacher_email, $sub_teacher, $msg_teacher, $headers); 
							}
						}

						/* End */

						 header("location:../thankyou.php");
	}
	

	/* End Info*/

		

	
}

if (!empty($_POST['cancle']) || $_POST['overite_assign']=="no") {

	$s_filepath		= trim(stripslashes($_POST['s_filepath']));
	if ($temp_target_dir.$s_filepath) {
		unlink($temp_target_dir.$s_filepath);
	}
	header("location:../index.php");
}
?>