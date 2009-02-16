<?php
session_start();
include('../include/config.php');
include('../include/commonfunctions.php');

if (empty($_SESSION['adminID']))
{
	header("location:index.php");
}

if (!empty($_POST['edit'])) {
	$user_name  		= trim($_POST['user_name']); 
	$user_pass  		= trim($_POST['user_pass']);
	$user_class 		= trim($_POST['user_class']);
	$user_email         = trim($_POST['user_email']);
	$user_mobile		= trim($_POST['user_mobile']);
	$user_status		= trim($_POST['user_status']);

	$editid	= trim($_POST['editid']);
	
	$query	=  "update dup_admin  set
					user_name = '$user_name', user_pass = '$user_pass',
					user_email = '$user_email', user_class = '$user_class', user_mobile = '$user_mobile',
							user_status = '$user_status' where user_id = '$editid'";
	$eres = mysql_query($query);
	if (!empty($eres))
		triggerMessage("admin_create_admin", "Account edited successfully!");	
}


if (!empty($_POST['add'])) {
	$user_name  		= trim($_POST['user_name']); 
	$user_pass  		= trim($_POST['user_pass']);
	$user_class 		= trim($_POST['user_class']);
	$user_email         = trim($_POST['user_email']);
	$user_mobile		= trim($_POST['user_mobile']);
	$user_status		= trim($_POST['user_status']);
	
	$query	=  "INSERT INTO dup_admin ( user_id, user_name, user_pass, user_email,
	                        user_class, user_permission, user_created, user_mobile,
							user_status)							  
							VALUES 
							('','$user_name','$user_pass','$user_email','$user_class',
							'$user_permission', NOW(), '$user_mobile','$user_status')";
	$res = mysql_query($query);
	triggerMessage("admin_create_admin", "Admin Created Successfully!");	
}

if ($_GET['act'] == "edit")
{
	$editid = $_GET['id'];
	$esql = mysql_query("select * from dup_admin where user_id = '$editid' limit 1");
	$eresult = mysql_fetch_array($esql);
}
?>


<?php include("header.php");?>
<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { this.submit(); }
});

$().ready(function() {
	
	
	// validate signup form on keyup and submit
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			user_name: {
				required: true,
				minlength: 2
			},
			user_pass: {
				required: true,
				minlength: 5
			},
			
			user_email: {
				required: true,
				email: true
			}			
		},
		messages: {
			user_name: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			user_pass: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			user_email: "Please enter a valid email address"
			
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

	
	<div style="width:770px; float:left;">

	<?php include("menu.php");?>

	<div align="left" class="adminright">
    
    <div style="width:600px; padding-top:5px;">
    
    <div style="width:600px; float:left;">
    <form id="signupForm" action="" method="post" >
    <table width="330" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td align="left" valign="top"><strong><img src="../images/admin-star.jpg" alt="star" /></strong></td>
    <td height="25" align="left" valign="top"><span class="blue"><strong> CREATE ADMIN</strong></span></td>
    <td height="25" align="left" valign="top"></td>
    <td height="25" align="left" valign="top"></td>
    </tr>
	
	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top"></td>
    <td width="20" height="25" align="left" valign="top"></td>
    <td width="170" height="25" align="left" valign="top"><?php outputTrigger('admin_create_admin'); ?></td>
    </tr>

	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">User Name</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top"><input name="user_name" type="text" class="form" id="user_name" size="27" value="<?php echo $eresult['user_name']; ?>"/></td>
    </tr>
    <tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Password</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top"><input name="user_pass" type="password" class="form" id="user_pass" size="27" value="<?php echo $eresult['user_pass']; ?>"/></td>
    </tr>
    <tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Mobile No</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top"><input name="user_mobile" type="text" class="form" id="mobile" size="27" value="<?php echo $eresult['user_mobile']; ?>" /></td>
    </tr>
    <tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Email Id</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top"><input name="user_email" type="text" class="form" id="user_email" size="27" value="<?php echo $eresult['user_email']; ?>"/></td>
    </tr>
	
	<tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Class</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top">
    <select name="user_class" class="form" id="user_class">
    <option value="admin" <?php if ($eresult['user_class'] == "admin") { echo "selected"; } ?>>Admin</option>
	<option value="user" <?php if ($eresult['user_class'] == "user") { echo "selected"; } ?>>User</option>
    </select></td>
    </tr>
	
    <tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="25" align="left" valign="top">Status</td>
    <td width="20" height="25" align="left" valign="top">:</td>
    <td width="170" height="25" align="left" valign="top">
    <select name="user_status" class="form" id="status">
    <option value="active" <?php if ($eresult['user_status'] == "active") { echo "selected"; } ?>>Active</option>
	<option value="inactive" <?php if ($eresult['user_status'] == "inactive") { echo "selected"; } ?>>Inactive</option>
    </select></td>
    </tr>
    <tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="5" align="left" valign="top"></td>
    <td width="20" height="5" align="left" valign="top"></td>
    <td width="170" height="5" align="left" valign="top"></td>
    </tr>
    <tr>
    <td width="30" align="left" valign="top"></td>
    <td width="110" height="35" align="left" valign="top"></td>
    <td width="20" height="35" align="left" valign="top"></td>
    <td width="170" height="35" align="left" valign="top">
	<?php if (!empty($editid)) { ?>
		<input type="hidden" name="edit" value="1" />
		<input type="hidden" name="editid" value="<?php echo $editid; ?>" />
	<?php } else { ?>
		<input type="hidden" name="add" value="1" />
	<?php } ?>
	<!--<input type="submit" name="submit" value="submit" /> -->
	<input type="image" src="../images/du-btn-submit.jpg" name="submit1" id="submit1" value="Submit1" />
	</td>
    </tr>
    </table>
	</form>
	  </div>
		</div>
    	  </div>
    		</div>
           <?php include("footer.php");?>