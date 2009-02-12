<?php
include('include/config.php');
include('include/commonfunctions.php');


if (!empty($_POST['add'])) {
	$st_username  		= trim($_POST['st_username']); 
	$st_pass  		= trim($_POST['st_pass']);
	$st_name  		= trim($_POST['st_name']); 
	$st_email       = trim($_POST['st_email']);
	$st_mobile		= trim($_POST['st_mobile']);
	$st_location	= trim($_POST['st_location']);
	
	if ($cn = ChkExists("dup_students", "st_username", $st_username, "err_student") == 0)
	{
	
		$query	=  "INSERT INTO dup_students ( st_id, st_username, st_pass, st_email,
								st_name, st_location, st_created, st_mobile,
								st_status)							  
								VALUES 
								('','$st_username','$st_pass','$st_email','$st_name',
								'$st_location', NOW(), '$st_mobile','active')";
		$res = mysql_query($query);
		if ($res)
		{
			header("location:student_afterreg.php");
		} else {
			triggerMessage("err_student", "Error: Registration Failed!");	
		}
	}
}
include('header.php');
?>  
<form action="" method="post" name="frm" >
  	<div style="width:770px; height:450px; float:left;">
      <div align="left" style="text-align:justify;"><img src="images/du-student.jpg" alt="student"/><br /><br /><br />
      <strong>REGISTER TO FIND JOBS ::....</strong><br /><br />
		<table width="580" border="0" cellspacing="0" cellpadding="0">
		
	<tr>
	  <td width="150" height="25" align="left" valign="top">&nbsp;</td>
	  <td width="20" height="25" align="left" valign="top"></td>
	  <td width="450" height="25" align="left" valign="top"><?php outputTrigger('err_student'); ?></td>
	  </tr>
	  
	  <tr>
	  <td width="150" height="25" align="left" valign="top">User Name</td>
	  <td width="20" height="25" align="left" valign="top">:</td>
	  <td width="450" height="25" align="left" valign="top"><input name="st_username" type="text" class="form" id="st_username" size="27"  value="<?php echo $st_username; ?>"/></td>
	  </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top">Password</td>
	  <td width="20" height="25" align="left" valign="top">:</td>
	  <td width="450" height="25" align="left" valign="top"><input name="st_pass" type="password" class="form" id="pass" size="27" /></td>
	  </tr>
	  <tr>
	    <td height="5" align="left" valign="top">&nbsp;</td>
	    <td height="5" align="left" valign="top">&nbsp;</td>
	    <td height="5" align="left" valign="top">&nbsp;</td>
	    </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"><span class="star">* </span> Name</td>
	  <td width="20" height="25" align="left" valign="top">:</td>
	  <td width="450" height="25" align="left" valign="top"><input name="st_name" type="text" class="form" id="st_name" size="27" value="<?php echo $st_name; ?>"/></td>
	  </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Location (City)</td>
	  <td width="20" height="25" align="left" valign="top">:</td>
	  <td width="450" height="25" align="left" valign="top"><input name="st_location" type="text" class="form" id="loc" size="27" value="<?php echo $st_location; ?>"/></td>
	  </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Mobile No.</td>
      <td width="20" height="25" align="center" valign="top">:</td>
      <td width="450" height="25" align="left" valign="top"><input name="st_mobile" type="text" class="form" id="st_mobile" value="<?php echo $st_mobile; ?>"/></td>
      </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Email Id</td>
	  <td width="20" height="25" align="left" valign="top">:</td>
	  <td width="450" height="25" align="left" valign="top"><input name="st_email" type="text" class="form" id="email" size="27" value="<?php echo $st_email; ?>"/></td>
	  </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"></td>
	  <td width="20" height="25" align="left" valign="top"></td>
	  <td width="450" height="25" align="left" valign="top">
	  <input type="hidden" name="add" value="1" />
      <input type="image" src="images/du-btn-submit.jpg" name="submit1" id="submit1" value="Submit"  onclick="return ValidateStSignup();"/></td>
	  </tr>
	  </table>
	  </div>
  </div>
  </form>
  <?php include('footer.php'); ?>