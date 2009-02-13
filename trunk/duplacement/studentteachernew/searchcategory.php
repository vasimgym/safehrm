<?php 
if (!empty($_GET['catid'])) {
	$cat_id	 = $_GET['catid'];
} else {
	header('location:index.php');
}
include("header.php");
$sql = "SELECT * FROM student_category WHERE parent_node=0 AND categoryname like '%$cat_id%'";
$res = mysql_query($sql);zzzz
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
  $categoryid = $row['id'];
 
  $sql = mysql_query("SELECT * FROM teacher_comments WHERE subcategoryid REGEXP($subid) AND categoryid=$categoryid");
  $countrowassignment = mysql_num_rows($sql);
  if ($countrowassignment != '0') {
  	$url = "listing.php?sub_catid=".$subid;
  } else {
  	$url = "#";
  } 
  ?>
    <td width="2%">&bull;</td><td align="left"><a href="<?php echo $url;?>"><?php echo $subrow['categoryname']; ?></a>&nbsp;<span>(<?php echo $countrowassignment;?>)</span></td>
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