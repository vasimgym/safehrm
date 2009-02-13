<?php 
include("header.php");

/* Expire Assignments*/

	$sql_exp		= mysql_query("SELECT * FROM teacher_information");
	$rs_exp			= mysql_fetch_array($sql_exp);
	$expired_day	= $rs_exp['assignmentperiod'];
	$currentdate = date('Y-m-d');
	
	$select = mysql_query("SELECT com_id, datediff( '$currentdate', com_date ) AS expired_days
				FROM teacher_comments
				WHERE com_status !='EXPIRED'");
	while ($rs = mysql_fetch_array($select)) {
	
		if ($rs['expired_days'] >= $expired_day) {
			
			$sql= mysql_query("UPDATE teacher_comments SET com_status = 'EXPIRED' WHERE com_id='".$rs["com_id"]."' ");
		}
		
	}


	/* End */


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
	<td>
		<table width="70%" border="0" align="center" cellspacing="3" cellpadding="3">
		<tr>
			<td  colspan="2">
				<form  action="listing.php"  name="formsearch" method="get" >
				<table  border="0" cellpadding="0" cellspacing="0">
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
<?php 
$i = 1;
while($row = mysql_fetch_array($res)) 
{
$mainid = $row['id'];

// count for the subcategories
$subsql = "SELECT * FROM student_category WHERE parent_node= '$mainid' AND parent_node!=0";
$exequery = mysql_query($subsql);
$countnumber = mysql_num_rows($exequery);

if ($countnumber != '0') {
  	$url = "categorylist.php?catid=".$mainid;
  } else {
  	$url = "#";
  } 
?>

  <td width="2%">&raquo;</td>
  <td>
  	<a href="<?php echo $url;?>"><?php echo $row['categoryname'];?></a>
	<span>&nbsp;(<?php echo $countnumber;?>)</span>
   </td>
<?php if (($i%2) == 0) { ?>  
	</tr><tr>
	<?php } 
	 $i++ ;
  } ?>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
</table>
		
</td>
</tr></table>
<?php include("footer.php");?>