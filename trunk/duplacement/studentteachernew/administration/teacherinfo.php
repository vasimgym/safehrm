<?php 
include("../include/config.php");
if($_POST["submitinfo"] == "Submit") 
{
	$first_name 	= trim(stripslashes($_POST["first_name"]));
	$last_name 		= trim(stripslashes($_POST["last_name"]));
	$emailid 		= trim(stripslashes($_POST["emailid"]));
	$password 		= trim(stripslashes($_POST["password"]));
	$qualification 	= trim(stripslashes($_POST["qualification"]));
	$phone 			= trim(stripslashes($_POST["phone"]));
	$mobile 		= trim(stripslashes($_POST["mobile"]));
	$sql = "
		INSERT INTO 	teacher_information (
						first_name,last_name,emailid,password,qualification,phone,mobile)
			VALUES		('$first_name', '$last_name', '$emailid', '$password', '$qualification', '$phone',  '$mobile');
		";
	$res = mysql_query($sql);
}
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
						  <td width="98%" valign="middle" background="../images/admin_top2.gif" class="admin-w">Teacher Registration </td>
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
								  <form id="form1" name="form1" method="post" action="" >									    											<table width="100%" border="0" cellspacing="0" cellpadding="3">
										  <tr>
											<td colspan="2" class="orange">Teacher Info: </td>
										  </tr>
										 <?php if (!empty($err)) {?>
										  <tr>
											<td class="gray-login">&nbsp;</td>
											<td class="errormsg">&nbsp;</td>
										  </tr>
										  <?php }?>
										  <tr>
											<td class="gray-login">First Name </td>
											<td><input name="first_name" type="text" id="first_name" size="30" />
												<span class="errormsg">*</span>													
											</td>
										  </tr>
										  <tr>
											<td class="gray-login">Last name </td>
											<td><input name="last_name" type="text" id="last_name" size="30" />
											<span class="errormsg">*</span></td>
										  </tr>
										  <tr>
											<td class="gray-login">E-mail</td>
											<td><input name="emailid" type="text" id="emailid" size="30" />
												<span class="errormsg">*</span>													
											</td>
										  </tr>
										  <tr>
											<td class="gray-login">Password</td>
											<td><input name="password" type="password" id="password" size="30" />
												<span class="errormsg">*</span>													</td>
										  </tr>
										  <tr>
											<td class="gray-login">Phone No </td>
											<td><input name="phone" type="text" id="phone" size="30" />
												<span class="errormsg">*</span>													
											</td>
										  </tr>
										  <tr>
											<td class="gray-login">Mobile no </td>
											<td><input name="mobile" type="text" id="mobile" size="30" />
											<span class="errormsg">*</span></td>
										  </tr>
										  <tr>
											<td class="gray-login">Qualification</td>
											<td><input name="qualification" type="text" id="qualification" size="30" />
											<span class="errormsg">*</span>													
											</td>
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
