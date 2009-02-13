<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}
include("../include/config.php");

//Delete record
/*
if($_GET["action"]=="delete")
{
	$delid = $_GET["delid"];
	
	$sql_file = "
	SELECT 	s_filepath 
		FROM 	student_information 
		WHERE 	s_id='$delid'";
	$res_file = mysql_query($sql_file);
	$row_file = mysql_fetch_array($res_file);
	$file_name = $row_file["s_filepath"];
	if(file_exists("../assignments/".$file_name)) {
		unlink("../assignments/".$file_name);
	}
 	mysql_query("DELETE FROM `student_information` WHERE s_id='$delid'");
}
*/


/********************* PAGING  ***********************/
	$limit = 2;
	require_once("../include/class.pager.php");
	$p = new Pager ;
	$start = $p->findStart($limit);

	/* Find the number of rows returned from a query; Note: Do NOT use a LIMIT clause in this query */
	if($_GET["statistic"] == "todays") {
		$today 		= date('Y-m-d');		
		$extrasql 	= " WHERE s_posted_date='$today'";
		$_SESSION['whereclause'] = $extrasql;
	} elseif ($_GET["statistic"] == "weeks") {
		$today 	= date('Y-m-d');
		$time 	= time();
		$ctime 	= $time-7*24*60*60;		
		$sevenday = date('Y-m-d',$ctime);
		$extrasql 	= " WHERE s_posted_date <='$today' AND s_posted_date >='$sevenday'";
		$_SESSION['whereclause'] = $extrasql;		
	} elseif ($_GET["statistic"] == "months") {
		$today 	= date('Y-m');
		$extrasql 	= " WHERE s_posted_date LIKE '%$today%'";
		$_SESSION['whereclause'] = $extrasql;		
	} elseif ($_GET["statistic"] == "years") {
		$today 	= date('Y');
		$extrasql 	= " WHERE s_posted_date LIKE '%$today%'";	
		$_SESSION['whereclause'] = $extrasql;	
	} 
	$count = mysql_num_rows(mysql_query("SELECT * FROM student_information ".$_SESSION['whereclause'])); 
	
	/* Find the number of pages based on $count and $limit */ 
	$pages = $p->findPages($count, $limit); 
	
	$pagelist = $p->pageList($_GET['page'], $pages);
	 
	##################### end aging ################## */
	
	
//Fetch all records
$sql = "SELECT s_id, s_firstname, s_email, s_category, s_status, s_subject, s_filepath, s_teacher_commets, s_posted_date FROM student_information ".$_SESSION['whereclause'];

//Filter by status
/*if(!empty($_GET["filter"])) {
	$filterval = $_GET["filter"];
	$sql .= " WHERE s_status='$filterval'";
}*/
$sql .= " LIMIT ".$start.", ".$limit;
$res = mysql_query($sql);

$statusquery	= mysql_query ("SELECT id, status_name, status_color FROM student_status");

include("header.php");
?>
<script language="javascript">
function filter(a)
{
location.href="manage_assignments.php?filter="+a;
}
</script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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
								<td width="100%" valign="top">
								  <form id="form1" name="form1" method="post" action="" >
								    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td class="orange" height="16">Assignments </td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="MS11_grey">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td><table width="100%" border="0">
                                              <tr bgcolor="#EBEBEB" class="blue">
                                                <td>Email</td>
                                                <td>Name</td>
                                                <td>Status</td>
												<td>Assignment</td>
                                                <td>Comments</td>
                                                <td align="center">Posted Date </td>
                                               <!-- <td align="center">Action</td> -->
                                              </tr>
                                              <?php
												$i=0;
												while($row=mysql_fetch_array($res))
												{
													$i++;
													$i%2==0 ? $bgcolor="#F4F4F4" : $bgcolor="#FFFFFF";
													
													//Color According to status
													$stquery = mysql_query ("SELECT status_color FROM student_status WHERE status_name='".$row['s_status']."'");
													$status_row = mysql_fetch_array($stquery);
												?>
                                              <tr bgcolor="<?php echo $bgcolor;?>" class="MS12_blk">
                                                <td>
												<a href="mailto:<?php echo $row['s_email'];?>" class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">
												<?php echo $row['s_email'];?></font>												</a>												</td>
                                                <td class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">
												<?php echo $row['s_firstname'];?></font>												</td>
                                                <td class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">
												<?php echo $row['s_status'];?>												</font>												</td>
                                                <td>
												<a href="../download.php?file=<?php echo $row['s_filepath'];?>" class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">Download</font> 
												</a>												
												</td>
                                                <td class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">
												<?php 
												 if(!empty($row['s_teacher_commets'])) {
												 	echo substr($row['s_teacher_commets'],0,15).'...';
												 } else {
												 	echo 'No Comments';
												 }
												 ?>												</td>
                                                <td class="blue1">
												<font color="<?php echo $status_row['status_color'];?>">
												<?php echo $row['s_posted_date'];?></font>												</td>
                                              <!--  <td align="center">
												<table cellspacing="1" cellpadding="2" border="0" width="100%" align="center">
												<tr>
												 <td align="center">
												<a href="view_assignment.php?viewid=<?php //echo $row['s_id']?>" class="blue1">
												<font color="<?php //echo $status_row['status_color'];?>">View/Change Status</font>
												</a>
												</td></tr>
												<tr>
												 <td align="center">
												<a href="manage_assignments.php?delid=<?php //echo $row['s_id']?>&amp;action=delete"
												class="blue1" onclick="return confirm('Are you sure to delete this Category?');">
												<font color="<?php //echo $status_row['status_color'];?>">Delete</font></a><br />
												</td></tr>
												<tr>
												 <td align="center">
												<a href="#" class="blue1" 
												onclick="popitup('sendmail.php?id=<?php //echo $row['s_id']?>')">
												<font color="<?php //echo $status_row['status_color'];?>">Send Mail</font></a>
												</td></tr></table>
												</td> -->
                                              </tr>
                                              <?php
												}
											  ?>
                                          </table></td>
                                        </tr>
                                      </tbody>
							        </table>
								  </form>								  </td>
							  </tr>
							</table>						  </td>
						</tr>
						<tr>
						  <td background="../images/admin_back_gray.gif" height="19">&nbsp;</td>
					    </tr>
						<tr>
						  <td width="100%" height="19" background="../images/admin_back_gray.gif" class="left-heading">Page Listing:&nbsp;<?php echo $pagelist;?></td>
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
			  <td width="80%" valign="top" class="search"></td>
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
