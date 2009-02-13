<?php 
session_start();
if(empty($_SESSION["sess_teacher_id"])) {
	header("location:index.php");
	exit;
}

include("../include/config.php");
include("../include/function.php");

if (!empty($_GET['catid'])) {
	$cat_id	 = $_GET['catid'];
} else {
	header('location:index.php');
}
include("header.php");

$sql = "SELECT * FROM student_category WHERE parent_node=0 AND id = $cat_id";
$res = mysql_query($sql);

?>
<style type="text/css">
<!--
.style1 {font-family: Geneva, Arial, Helvetica, sans-serif;
font-size:10px;
text-decoration:none;
}
.style1:hover {font-family: Geneva, Arial, Helvetica, sans-serif;
font-size:10px;
text-decoration:underline;
color:#2F75CA;
}

td{
font-family:Arial;
font-size:11px;
font-weight:bold;
}
span{
font-family:Arial;
font-size:12px;
color:#FF0000;
}

-->
</style>
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
								<td width="100%" valign="top" >								
<table width="100%" border="0" cellspacing="3" cellpadding="3" bgcolor="#FFFFFF">
<?php 
while($row = mysql_fetch_array($res)) 
{
$mainid = $row['id'];

// count for the subcategories
$subsql = "SELECT * FROM student_category WHERE parent_node= '$mainid' AND parent_node!=0";
$exequery = mysql_query($subsql);
$countnumber = mysql_num_rows($exequery);
?>
<tr>
  <td width="2%">&raquo;</td><td><!--<a href="listing.php?catid=<?php //echo $mainid; ?>"><?php //echo $row['categoryname'];?> --><a href="#"><?php echo $row['categoryname'];?></a></td>
</tr>
<?php if ($countnumber > 0) { ?>
<tr>
<td colspan="2"><table width="70%" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
  <?php 
  $i = 1;
  while ($subrow = mysql_fetch_array($exequery)) 
  {
  $subid = $subrow['id'];  
  
  $sql = mysql_query("SELECT * FROM teacher_comments WHERE subcategoryid REGEXP($subid) AND categoryid=$cat_id");
  $countrowassignment = mysql_num_rows($sql);
  if ($countrowassignment != '0') {
  	$url = "listing.php?sub_catid=".$subid;
  } else {
  	$url = "#";
  } 
  ?>
    <td width="2%">&bull;</td><td><a href="<?php echo $url;?>"><?php echo $subrow['categoryname']; ?></a>&nbsp;<span>(<?php echo $countrowassignment;?>)</span></td>
	<?php if (($i%2) == 0) { ?>  
	</tr><tr>
	<?php } ?>
  <?php $i++ ;
  } ?>
  </tr>
</table></td>
</tr>

<?php }
} ?>
<tr>
<td></td><td></td></tr></table>
								  </td>
							  </tr>
							</table>
						  </td>
						</tr>
		<!--				<tr>
						  <td width="100%" height="19" background="../images/admin_back_gray.gif" class="blue">Page Listing:&nbsp;<?php //echo $pagelist;?></td>
						</tr> -->
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
