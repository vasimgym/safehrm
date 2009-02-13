<?php 
if (!empty($_GET['catid'])) {
	$cat_id	 = $_GET['catid'];
} else {
	header('location:index.php');
}
include("header.php");
$sql_search = "SELECT *
FROM teacher_comments AS t, student_category AS s
WHERE t.categoryid = s.id AND t.com_title LIKE '%$cat_id%' OR t.com_description LIKE '%$cat_id%' AND s.parent_node!=0 GROUP BY id
LIMIT 0 , 30";

$res = mysql_query($sql_search);
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
<tr>
<td colspan="2"><table width="70%" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
  <?php 
  $i = 1;
  while ($subrow = mysql_fetch_array($res)) 
  {
	$categoryid = $subrow['categoryid'];
	$subid = $subrow['subcategoryid'];
	$sql = mysql_query("SELECT * FROM teacher_comments WHERE  categoryid = $categoryid");
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

<td></td><td></td></tr></table>
<?php include("footer.php");?>