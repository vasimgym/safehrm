<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
include("../include/function.php");
$sql = "SELECT * FROM teacher_information WHERE id='".$_SESSION["sess_teacher_id"]."'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$loginemail	= $row['emailid'];
$teacherquery	= "SELECT s_id, s_email FROM student_information";
$teacherquery 	= mysql_query($teacherquery);

$recquery 		= mysql_query("SELECT s_id, s_email FROM student_information");

if (!empty($_POST['sendmail'])) {	
	$headers  = "MIME-Version: 1.0;\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
	$from_mail	= $_POST['from_mail'];
	$headers .= "From: ".$from_mail.";\n";
	$msg		= $_POST['messagebody'];
	$subject	= $_POST['subject'];
	if ($_POST['tomsg']=="one") {				
		$emailto	= $_POST['mailto'];
		@mail($emailto, $subject, $msg, $headers);
		$err	= "Your message has been sent successfully";
	} else {
		while ($rs = mysql_fetch_array($recquery)){
			$emailto	= $rs['s_email'];
			@mail($emailto, $subject, $msg, $headers);
		}
		$err	= "Your message has been sent successfully";
	}
}
include("header.php");
?>
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
			  <td width="20%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
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
			  <td width="78%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
				  
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
								  <form id="form1" name="form1" method="post" action="" onsubmit="return mailtoall();" >									    											<table width="100%" border="0" cellspacing="3" cellpadding="3">
										 <?php if(!empty($err)) {?>
										  <tr>
										    <td colspan="2" class="orange" align="center"><?php echo $err;?></td>
								      </tr>
									  <?php }?>
										  <tr>
										    <td class="gray-login">From</td>
										    <td class="blue"><?php echo $row['emailid'];?>
											<input type="hidden" name="from_mail" value="<?php echo $row['emailid'];?>" /></td>
								      </tr>
										  <tr>
										    <td valign="top" class="gray-login">To</td>
										    <td  class="gray-left">
										      <input name="tomsg" type="radio" value="one" checked="checked" />
										      One Student 
											  <select name="mailto">
											  	<!--<option value="">Choose</option> -->
											<?php	while ($student_rs		= mysql_fetch_array($teacherquery)) {?>
												<option value="<?php echo $student_rs['s_email'];?>"
												><?php echo $student_rs['s_email'];?></option>	
											<?php } ?>
											  </select><br />
										      <input name="tomsg" type="radio" value="all" />
										    All Student</td>
								      </tr>
										  <tr>
										    <td class="gray-login">Subject</td>
										    <td class="blue"><input name="subject" type="text" size="30" /></td>
								      </tr>
										  <tr>
										    <td colspan="2" class="gray-login">Enter Text Message</td>
								      </tr>
										  <tr>
										    <td colspan="2" class="orange"><label>
										      <textarea name="messagebody" cols="50" rows="10"></textarea>
										    </label></td>
								      </tr>
										  <tr>
										    <td class="orange">&nbsp;</td>
										    <td class="orange"><label>
										      <input type="submit" name="sendmail" value="Send" />
										    </label></td>
								      </tr>
										  <tr>
										    <td class="orange">&nbsp;</td>
										    <td class="orange">&nbsp;</td>
								      </tr>
										  <tr>
										    <td class="orange">&nbsp;</td>
								            <td class="orange">&nbsp;</td>
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
			  <td width="20%" valign="top" class="search">&nbsp;
				
			  </td>
			  <td width="2%" valign="top" class="search"></td>
			  <td width="78%" valign="top" class="search"></td>
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
