<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");

if($_GET["action"]=="delete")
{
	$delid = $_GET["delid"];
 	mysql_query("DELETE FROM student_course WHERE courseid='$delid'");
}

$sql = "SELECT courseid, coursename, parentid FROM student_course WHERE parentid=0";
$res = mysql_query($sql);

function countSubCourse($course_id)
{
	$sql = "SELECT courseid, coursename, parentid FROM student_course WHERE parentid= '$course_id' AND parentid!=0";
	$exequery = mysql_query($sql);
	$countnumber = mysql_num_rows($exequery);
	
	return $countnumber;
	
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
								  <form id="form1" name="form1" method="post" action="" >
								    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td class="orange" height="16">Manage Categories </td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey"><a href="course.php" class="left-heading">Add New Course</a></td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><table width="100%" border="0">
                                              <tr bgcolor="#EBEBEB" class="blue">
                                                <td>Category Name </td>
                                                <td>Subcategory</td>
                                                <td align="center">Action</td>
                                              </tr>
                                              <?php
												$i=0;
												while($row=mysql_fetch_array($res))
												{
													$i++;
													$i%2==0 ? $bgcolor="#F4F4F4" : $bgcolor="#FFFFFF";
												?>
                                              <tr bgcolor="<?php echo $bgcolor;?>" class="MS12_blk">
                                                <td class="left-none"><?php echo $row['coursename'];?></td>
                                                <td class="left-none"><a href="manage_subcourse.php?parentid=<?php echo $row['courseid'];?>">
												<?php echo countSubCourse($row['courseid']);?></a></td>
                                                <td align="center"><a href="course.php?action=edit&amp;editid=<?php echo $row['courseid']?>" class="blue1" >EDIT </a><span class="blue">|</span> <a href="manage_course.php?delid=<?php echo $row['courseid'];?>&amp;action=delete"  class="blue1" onclick="return confirm('Are you sure to delete this Category?')">DELETE</a></td>
                                              </tr>
                                              <?php
												}
											  ?>
                                          </table></td>
                                        </tr>
                                      </tbody>
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
