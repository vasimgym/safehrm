<?php
session_start();
include('include/config.php');
include('include/commonfunctions.php');

if (isset($_POST['slogin'])) {
	$st_username   	=  trim(stripslashes($_POST['st_username'])); 
	$st_pass   		=  trim(stripslashes($_POST['st_pass']));

	$chksql     =  "SELECT * FROM dup_students
								WHERE  st_username='$st_username' AND st_pass='$st_pass' limit 1";
	$chkres  =  mysql_query($chksql);
	$chknuum  =  mysql_num_rows($chkres);		
							  
	if($chknuum > 0) {
		$chkarray  =  mysql_fetch_array($chkres);
		$_SESSION['stUser']  	= $chkarray['st_username'];
		$_SESSION['stUserID'] 	= $chkarray['st_id'];		
		header('location:studenthome.php');
	} else {
		$err = 'Login failed! Please use correct username and password!';
	}
}

include('header.php');
?>

	<div align="left" style="text-align:justify; float:left; height:476px;"><img src="images/du-login.jpg" /><br /><br /><br /><br /><br /><br /><p style="width:700px; text-align:center;"><?php echo $err; ?></p><br />
	<table width="770" border="0" cellspacing="0" cellpadding="0">
      <tr>
	  <td align="right" valign="top">
	  <form action="" method="post" name="frm1">
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
	  <form action="" method="post" name="frm2">
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