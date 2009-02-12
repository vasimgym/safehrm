<?php
session_start();
include('../include/config.php');

if (isset($_POST['adminlogin'])) {
	$user_class  =  trim($_POST['user_class']); 
	$user_name   =  trim($_POST['user_name']); 
	$user_pass   =  trim($_POST['user_pass']);

	$chksql     =  "SELECT user_id, user_name, user_pass, user_class FROM dup_admin 
								WHERE  user_name='$user_name' AND user_pass='$user_pass' AND user_class = '$user_class' limit 1";
	$chkres  =  mysql_query($chksql);
	$chknuum  =  mysql_num_rows($chkres);
		
							  
	if($chknuum > 0) {
		$chkarray  =  mysql_fetch_array($chkres);
		$_SESSION['adUser']  = $chkarray['user_name'];
		$_SESSION['adminID'] = $chkarray['user_id'];
		$_SESSION['adminClass'] = $chkarray['user_class'];
		header('location:admin_home.php');
	} else {
		$err = 'Login failed! Please use correct username and password!';
	}
}

include("header.php");
?>



	<form name="loginfrm" action="" method="post">
	<div align="left" style="text-align:justify; float:left; height:476px;"><br /><br /><br /><br />
	  <br />
	  <br />
	  <br />
	  <table width="770" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="100" height="10" align="left" valign="top"></td>
      <td width="0" height="10" align="left" valign="top"></td>
      </tr>
	  <?php if (!empty($err)) { ?>
	  <tr>
      <td width="100" height="10" align="left" valign="top"></td>
      <td width="0" height="10" align="left" valign="top"><font color="#FF0000"><?php echo $err; ?></font></td>
      </tr>
	  <?php } ?>
	  
      <tr>
      <td width="106" height="45" align="left" valign="top"><img src="../images/du-login.jpg" alt="students sign in"  /></td>
      <td height="45" align="left" valign="top">
      <input type="radio" name="user_class" id="radio1" value="superadmin"  checked="checked"/><strong>Super Admin</strong>
      <input type="radio" name="user_class" id="radio2" value="admin" /><strong>Admin</strong>
      <input type="radio" name="user_class" id="radio3" value="user" /><strong>User</strong> </td>
      </tr>
	  </table>
	  <table>
      <tr>
      <td width="105" height="25" align="left" valign="top"> User Name</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top"><input name="user_name" type="text" class="form" id="user_name" style="width:190px;"/></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top">Password</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="0" height="25" align="left" valign="top"><input name="user_pass" type="password" class="form" id="pass" style="width:190px;"/></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top"></td>
      <td width="20" height="25" align="left" valign="top"></td>
      <td width="0" height="25" align="left" valign="top">
	  <input name="adminlogin" type="hidden" value="1" />
	  <input type="image" src="../images/du-btn-login.jpg" name="submitbtn" id="submitbtn" value="Submitbtn"  onclick="document.loginfrm.submit();"/></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="middle"></td>
      <td height="25" align="left" valign="middle"></td>
      <td width="0" height="25" align="left" valign="middle"></td>
      </tr>
      </table>

	</div>
      
<?php
include("footer.php");?>