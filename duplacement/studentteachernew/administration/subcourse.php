<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");
$sqlquery = "SELECT courseid, coursename, parentid FROM student_course WHERE parentid=0";
$rs = mysql_query($sqlquery);

if (!empty($_GET['editid'])) {
	$courseid	= trim(stripslashes($_GET['editid']));
	$sql = "SELECT courseid, coursename, parentid FROM student_course WHERE courseid='$courseid'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
}

if ($_GET['action']=='edit') {
	$value = "Edit";
	$name = "courseedit";	
} else {
	$value = "Add";
	$name = "courseadd";	
}

if (!empty($_POST['courseadd'])) {
	$coursename	= trim(stripslashes($_POST['coursename']));
	$parentid	= trim(stripslashes($_POST['parentid']));
	$addcourse = mysql_query("INSERT INTO student_course (courseid, coursename, parentid)
							VALUES (
							NULL , '$coursename', '$parentid'
							)");
	header("location:manage_course.php");

}

if (!empty($_POST['courseedit'])) {
	$coursename	= trim(stripslashes($_POST['coursename']));
	$editid		= trim(stripslashes($_POST['editid']));
	$parentid	= trim(stripslashes($_POST['parentid']));
	$addcourse = mysql_query("UPDATE student_course
								SET
								coursename='$coursename',
								parentid='$parentid'
								WHERE courseid='$editid'
							");
							header("location:manage_course.php");
	
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
								<td width="100%" valign="top" height="250"><br />
								  <form id="form1" name="form1" method="post" action="">									    											<table width="60%" align="center" border="0" cellspacing="0" cellpadding="3" style="border:solid 1px #333333;">
										  <tr>
										    <td class="orange">Course</td>
										    <td></td>
								      </tr>
										  <tr>
										    <td >Course Name </td>
										    <td>
												<select name="parentid">
												<?php while($rec = mysql_fetch_array($rs)) {?>
													<option value="<?php echo $rec['courseid'];?>" 
													<?php if($rec['courseid']==$row['parentid']){?>selected="selected"<?php }?>><?php echo $rec['coursename'];?>
													</option>
												<?php }?>
												</select>
											</td>
								      </tr>
										  <tr>
										    <td >Subcourse Name </td>
										    <td><input type="text" name="coursename" value="<?php echo $row['coursename'];?>" /></td>
								      </tr>
										  <tr>
											<td class="orange">
											<input type="hidden" name="editid" value="<?php echo $row['courseid'];?>" />											</td>
											<td><input type="submit" name="<?php echo $name;?>" value="<?php echo $value;?>" /></td>
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
