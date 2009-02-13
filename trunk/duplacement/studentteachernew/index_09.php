<?php 
include("header.php");
$sql = "SELECT * FROM student_category WHERE parent_node=0";
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
  <td><a href="listing.php?catid=<?php echo $mainid; ?>"><?php echo $row['categoryname'];?></a></td>
</tr>
<?php if ($countnumber > 0) { ?>
<tr>
<td><table width="70%" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
  <?php 
  $i = 1;
  while ($subrow = mysql_fetch_array($exequery)) 
  {
  $subid = $subrow['id'];
  ?>
    <td><a href="listing.php?sub_catid=<?php echo $subid; ?>"><?php echo $subrow['categoryname']; ?></a></td>
	<?php if (($i%3) == 0) { ?>  
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
<td></td></tr></table>
<?php include("footer.php");?>