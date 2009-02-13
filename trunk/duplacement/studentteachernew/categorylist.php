<?php 
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
																											
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
  <td>&nbsp;</td>
  <td>&nbsp;
  <form  action="listing.php"  name="formsearch" method="get" >
				<table  border="0" cellpadding="0" cellspacing="0" style="padding-left:100px;">
					<tr>
					<td>
						<input type="text" size="30" name="searchtitle" />														
						<input type="submit" name="search" value="Search" />						
					</td>
					</tr>					
				</table>
				</form>
  </td>
</tr>
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
  
  $sql = mysql_query("SELECT * FROM teacher_comments 
  				WHERE subcategoryid REGEXP($subid) AND categoryid='$cat_id' AND com_status!='EXPIRED'");
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
<?php include("footer.php");?>