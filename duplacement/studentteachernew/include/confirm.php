<?php
include("config.php");

$target_dir = _ROOT_DIR_."assignments/";


if (!empty($_POST['submitinfo']) || $_POST['overite_assign']=="yes") {
		
	$s_email			= trim(stripslashes($_POST['s_email']));
	$s_firstname		= trim(stripslashes($_POST['s_firstname']));
	$s_lastname			= trim(stripslashes($_POST['s_lastname']));
	$city_name			= trim(stripslashes($_POST['city_name']));
	$state_name			= trim(stripslashes($_POST['state_name']));
	$categoryname		= trim(stripslashes($_POST['categoryname']));
	$s_filepath			= trim(stripslashes($_POST['s_filepath']));
	
			
	//$s_subject			= implode(",",$_POST['sub']);

	

	/* Insert Student Info*/
	
	$checkemail	= mysql_query("SELECT s_id, s_email, s_filepath FROM student_information WHERE s_email='$s_email'");
	$rowcount	= mysql_num_rows($checkemail);	

	if ($rowcount == 0) {
	$studentinfo	= "INSERT INTO student_information 
						( s_id, s_firstname, s_email, s_lastname,  s_subject,  s_category, s_city, s_state, s_filepath)
						VALUES (
						NULL, '$s_firstname', '$s_email', '$s_lastname', '$s_subject', '$categoryname', '$city_name', '$state_name', '$s_filepath'
						)";

						$executequery	= mysql_query($studentinfo);

	$msg = $str;
	$subject  = "Confirmation Mail";
	$headers  = "MIME-Version: 1.0;\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
	
	/* additional headers */		
	$headers .= "From: $rs[mail_from];\n";
	/* and now mail it */
	@mail($js_email, $subject, $msg, $headers);

						header("location:../studentinfo.php");
	} else {

		$rs	= mysql_fetch_array($checkemail);
		$filename	= $rs['s_filepath'];		
		if (!empty($filename)) {				
			unlink($target_dir."/".$filename);
		}

		
		$studentinfo	= "UPDATE  student_information SET
						 s_firstname='$s_firstname',
						 s_lastname='$s_lastname',
						 s_subject='$s_subject',
						 s_category='$categoryname',
						 s_city='$city_name',
						 s_state='$state_name',
						 s_filepath='$s_filepath'
						 WHERE s_email='$s_email'";
						 $executequery	= mysql_query($studentinfo);
						 header("location:../studentinfo.php");
	}
	

	/* End Info*/

		

	
}

if (!empty($_POST['cancle']) || $_POST['overite_assign']=="no") {

	$s_filepath		= trim(stripslashes($_POST['s_filepath']));
	unlink($target_dir.$s_filepath);
	header("location:../studentinfo.php");
}
?>