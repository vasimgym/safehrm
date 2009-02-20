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
<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { this.submit(); }
});

$().ready(function() {
	
	
	// validate signup form on keyup and submit
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			st_username: {
				required: true,
				minlength: 2
			},
			st_pass: {
				required: true,
				minlength: 5
			},
			
			st_email: {
				required: true,
				email: true
			},
			st_name: {
				required: true				
			},
			st_location: {
				required: true				
			},
			st_mobile: {
				required: true				
			}				
		},
		messages: {
			st_username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			st_pass: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			st_email: "Please enter a valid email address",
			st_name:"Please enter name",
			st_location: "Please enter location",
			st_mobile: "Please enter a valid phone number"
			
		}
	});
		
});
</script>

<style type="text/css">
#signupForm .error {
	width: auto;
	display:block;
	color:#FF0000;
}

</style>

<form action="" method="post" id="signupForm" >
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
	  <td width="450" height="25" align="left" valign="top"><input name="st_pass" type="password" class="form" id="st_pass" size="27" /></td>
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
	  <td width="450" height="25" align="left" valign="top">
	  <select name="st_location" class="required form" id="st_location" style="width:172px;">
       <option value="0" selected>-- Location --</option>
        <?php echo $options = ListOptions("dup_location", "locationid", "locationname", $st_location); ?>
      </select>
	  </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Mobile No.</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="450" height="25" align="left" valign="top"><input name="st_mobile" type="text" class="form" id="st_mobile" value="<?php echo $st_mobile; ?>"/></td>
      </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"><span class="star">* </span>Email Id</td>
	  <td width="20" height="25" align="left" valign="top">:</td>
	  <td width="450" height="25" align="left" valign="top"><input name="st_email" type="text" class="form" id="st_email" size="27" value="<?php echo $st_email; ?>"/></td>
	  </tr>
	  <tr>
	  <td width="150" height="25" align="left" valign="top"></td>
	  <td width="20" height="25" align="left" valign="top"></td>
	  <td width="450" height="25" align="left" valign="top">
	  <input type="hidden" name="add" value="1" />
      <input type="image" src="images/du-btn-submit.jpg" name="submit1" id="submit1" value="Submit" /></td>
	  </tr>
	  </table>
	  </div>
  </div>
  </form>
  <?php include('footer.php'); ?>