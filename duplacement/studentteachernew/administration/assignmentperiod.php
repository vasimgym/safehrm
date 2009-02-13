<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");

if (!empty($_GET['days'])) {

	$currentdate = date('Y-m-d');
	
	$select = mysql_query("SELECT com_id, datediff( '$currentdate', com_date ) AS expired_days
				FROM teacher_comments
				WHERE com_status !='EXPIRED'");
	while ($rs = mysql_fetch_array($select)) {
	
		if ($rs['expired_days'] >= $_GET['days']) {
			
			$sql= mysql_query("UPDATE teacher_comments SET com_status = 'EXPIRED' WHERE com_id='".$rs["com_id"]."' ");
		}
		
	}
}

if($_POST["submitinfo"]=="Submit") {
	$assignmentperiod 			= trim(stripslashes($_POST["assignmentperiod"]));
	
	/*$sql1 = "UPDATE teacher_information SET assignmentperiod='$assignmentperiod' WHERE id='".$_SESSION["sess_teacher_id"]."'";*/
	$sql1 = "UPDATE teacher_information SET assignmentperiod='$assignmentperiod'";
	
	$res1 = mysql_query($sql1); 
	if(mysql_affected_rows()>0) {
		$msg = "Assignment expiry day updated!";
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
											<td colspan="2" class="orange">Expired Period:</td>
										  </tr>
										 
										  <tr>
											<td width="40%" class="gray-login">&nbsp;</td>
											<td width="60%" class="orange"><?php echo $msg;?></td>
										  </tr>
										
										  <tr>
											<td class="gray-login">Title Expiry Days </td>
											<td><input name="assignmentperiod" type="text" id="assignmentperiod"  value="<?php echo $row["assignmentperiod"];?>"  /></td>
										  </tr>
										  
										  <tr>
											<td>&nbsp;</td>
											<td><input type="submit" name="submitinfo" value="Submit" />
											<input type="reset" name="Submit2" value="Reset" /></td>
										  </tr>                                                
										  <tr>
										    <td>&nbsp;</td>
										    <td>&nbsp;</td>
								      </tr>
										  <!-- <tr>
										    <td colspan="2"><a href="assignmentperiod.php?days=<?php //echo $row["assignmentperiod"];?>">Click here to expired titles. </a></td>
								      </tr> -->
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
