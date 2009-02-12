<?php
include('include/config.php');
include('include/commonfunctions.php');

if (isset($_POST['slogin'])) {
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

include('header.php');
?>

	<div align="left" style="text-align:justify; float:left; height:476px;"><img src="images/du-login.jpg" /><br /><br /><br /><br /><br /><br /><br />
	<table width="770" border="0" cellspacing="0" cellpadding="0">
      <tr>
	  <td align="right" valign="top">
	  <form name="slogin" action="" method="post">
	  <table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="105" height="25" align="left" valign="top"><img src="images/du-studs.jpg" alt="students sign in"  /></td>
      <td height="25" align="left" valign="top"></td>
      <td width="225" height="25" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="105" height="10" align="left" valign="top"></td>
      <td height="10" align="left" valign="top"></td>
      <td width="225" height="10" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top"> User Name</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="225" height="25" align="left" valign="top"><input name="st_username" type="text" class="form" id="user_name" /></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top">Password</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="225" height="25" align="left" valign="top"><input name="st_pass" type="password" class="form" id="pass" /></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top"></td>
      <td width="20" height="25" align="left" valign="top"></td>
      <td width="225" height="25" align="left" valign="top">
	  <input type="hidden" name="slogin" value="1" />
	  <input type="image" src="images/du-btn-login.jpg" name="submit" id="submit" value="Submit"  onclick="document.frm1.submit();"/></td>
      </tr>
      <tr>
      <td height="25" align="left" valign="middle"></td>
      <td height="25" align="left" valign="middle"></td>
      <td height="25" align="left" valign="middle">Student not registered | <a href="#" class="linkz">Sign Up</a></td>
      </tr>
      </table>
	  </form>
      </td>
      <td align="left" valign="top">
	  <form action="" name="clogin" method="post" name="frm2">
	  <table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td width="105" height="25" align="left" valign="top"><img src="images/du-client.jpg" alt="students sign in" /></td>
      <td height="25" align="left" valign="top"></td>
      <td width="225" height="25" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="105" height="10" align="left" valign="top"></td>
      <td height="10" align="left" valign="top"></td>
      <td width="225" height="10" align="left" valign="top"></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top"> User Name</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="225" height="25" align="left" valign="top"><input name="user_name" type="text" class="form" id="user_name2" /></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top">Password</td>
      <td width="20" height="25" align="left" valign="top">:</td>
      <td width="225" height="25" align="left" valign="top"><input name="pass" type="text" class="form" id="pass2" /></td>
      </tr>
      <tr>
      <td width="105" height="25" align="left" valign="top"></td>
      <td width="20" height="25" align="left" valign="top"></td>
      <td width="225" height="25" align="left" valign="top">
	  <input type="hidden" name="clogin" value="1" />
	  <input type="image" src="images/du-btn-login.jpg" name="submit2" id="submit2" value="Submit" onclick="document.frm2.submit();"/></td>
      </tr>
      <tr>
      <td height="25" align="left" valign="middle"></td>
      <td height="25" align="left" valign="middle"></td>
      <td height="25" align="left" valign="middle">Client not registered | <a href="#" class="linkz">Sign Up</a></td>
      </tr>
      </table>
	  </form>
      </td>
      </tr>
      </table>

	</div>
<?php
include('footer.php');
?>  