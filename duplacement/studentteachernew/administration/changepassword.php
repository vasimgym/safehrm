<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
if($_POST["submitinfo"]=="Submit") {
	$emailid 			= trim(stripslashes($_POST["emailid"]));
	$new_password 		= trim(stripslashes($_POST["new_password"]));
	$password 		= trim(stripslashes($_POST["password"]));
	$sql1 = "UPDATE teacher_information SET password='$new_password' WHERE emailid='$emailid' AND password='$password'";
	$res1 = mysql_query($sql1); 
	if(mysql_affected_rows()>0) {
		$msg = "Password changed successfully!";
	} else {
		$msg = "Old Password does not match!";
	}
}


$sql = "SELECT * FROM teacher_information WHERE id='".$_SESSION["sess_teacher_id"]."'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
include("header.php");?>
  <tr>
	<td width="100%" height="480" valign="top">
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="1%"><img border="0" src="../images/lo1.gif" width="16" height="14"></td>
		<td width="98%" background="../images/lo3.gif"><img border="0" src="../images/lo3.gif" width="16" height="14"></td>
		<td width="1%"><img border="0" src="../images/lo4.gif" width="16" height="14"></td>
	  </tr>              <tr>
		<td width="1%" background="../images/lo2.gif"><img border="0" src="../images/lo2.gif" width="16" height="14"></td>
		<td width="98%" bgcolor="#FAFAFA" >
		  <table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="34%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="100%" valign="top">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top1.gif" width="26" height="26"></td>
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">&nbsp;</td>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top3.gif" width="26" height="26"></td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top" background="../images/admin_back.gif" class="border-gray">
					  <table border="0" width="100%" cellspacing="5" cellpadding="0" height="250">
						<tr>
						  <td width="100%" valign="top" class="admin-gray">
						<?php include("left.php");?>
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
				</table></td>
			  <td width="2%" valign="top"></td>
			  <td width="64%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  
				  <tr>
					<td width="100%" valign="top">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top1.gif" width="26" height="26"></td>
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">&nbsp;</td>
						  <td width="1%" valign="top"><img border="0" src="../images/admin_top3.gif" width="26" height="26"></td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top" class="border-gray">
					  <table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="100%">
							<table border="0" width="100%" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="100%" valign="top" height="250">
								  <form id="form1" name="form1" method="post" action="" onsubmit="return changepassform();" >									    											<table width="100%" border="0" cellspacing="0" cellpadding="3">
										  <tr>
											<td colspan="2" class="orange">Change Password : </td>
										  </tr>
										 
										  <tr>
											<td class="gray-login">&nbsp;</td>
											<td class="orange"><?php echo $msg;?></td>
										  </tr>
										
										  <tr>
											<td class="gray-login">E-mail</td>
											<td><input name="emailid" type="text" id="emailid" size="30" value="<?php echo $row["emailid"];?>" readonly /></td>
										  </tr>
										  <tr>
											<td class="gray-login">Old Password</td>
											<td><input name="password" type="password" id="password" size="30" /></td>
										  </tr>
										  <tr>
										    <td class="gray-login">New Password </td>
										    <td><input name="new_password" type="password" id="new_password" size="30" /></td>
								      </tr>
										  <tr>
											<td>&nbsp;</td>
											<td><input type="submit" name="submitinfo" value="Submit" />
											<input type="reset" name="Submit2" value="Reset" /></td>
										  </tr>                                                
										  
										</table>												
								  </form>
								  </td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td width="100%" background="../images/admin_back_gray.gif" height="19">&nbsp;</td>
						</tr>
					  </table>
					</td>
				  </tr>
				  <tr>
					<td width="100%" valign="top"></td>
				  </tr>
				</table></td>
			</tr>
			<tr>
			  <td width="34%" valign="top" class="search">&nbsp;
				
			  </td>
			  <td width="2%" valign="top" class="search"></td>
			  <td width="64%" valign="top" class="search"></td>
			</tr>
		  </table>
		</td>
		<td width="1%" valign="top" background="../images/lo5.gif"><img border="0" src="../images/lo5.gif" width="16" height="14"></td>
	  </tr>
	<tr>
		<td width="1%"><img border="0" src="../images/lo8.gif" width="16" height="37"></td>
		<td width="98%" background="../images/lo7.gif"><img border="0" src="../images/lo7.gif" width="16" height="37"></td>
		<td width="1%"><img border="0" src="../images/lo6.gif" width="16" height="37"></td>
	  </tr>
	</table>
	</td>
  </tr>
</table>

</td>
</tr>
</table>
</div>
</body>
</html>
