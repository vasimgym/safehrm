<?php
$state = mysql_query("SELECT id, state_name FROM student_state WHERE id='$_POST[state_name]'");
$rs_state = mysql_fetch_array($state);
$categoryname = mysql_query("SELECT id, categoryname from student_category WHERE id='$_POST[categoryname];'");
$rs_categoryname = mysql_fetch_array($categoryname);

$msg = '<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" class="orange">Student Info</td>
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
    <td colspan="2" class="orange">Assignment Info</td>
  </tr>
  <tr>
    <td class="gray-login" valign="top">Subject</td>
    <td class="gray-login">';
	$postid	 = $_POST['subject'];
	for ($i = 0; $i < count($postid); $i++ ) {
	$sub_id = $postid[$i];
	$subject = mysql_query("SELECT id, subject_name FROM student_subject WHERE id='$sub_id'");
	$rs_subject = mysql_fetch_array($subject);
         $subject	= $msg.$rs_subject['subject_name']."<br />";
		
        }
		$msg = $subject.'</td>
  </tr>
</table>';
